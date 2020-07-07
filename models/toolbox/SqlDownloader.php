<?php


              //////////////////////////////////
             //                              //
            //  SQL uploader                //
           //   09/08/2017  Marc Harnist   //
          //                              //
         //////////////////////////////////

// Je renseigne le titre de la page dans une variable qui servira plusieurs fois.
$title ="Save your data base !";

// Inclusion de l'entête  
if($_SERVER['HTTP_HOST'] == 'localhost')
{ // With WAMP
  $www_real_path = "C:\wamp64\www\www";      //for includes
  //Connexion to the data base
  try 
  { // Try if connexion works
    $db = new PDO('mysql:host=localhost;dbname=marcharnist;charset=utf8', 'root', '');
	
	//ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
    $DbName             = "marcharnist";
    $backup_name        = "mybackup.sql";
    $tables             = "Your tables";
  }
  catch (Exception $e)
  { // connexion fails: get error message
    die('Erreur: ' . $e->getMessage());
  }
}
else
{ // We are online
  $www_real_path = "/home/marcharnss/www";   //for includes  
  try
  { // Try if connexion works
    $db = new PDO ('mysql:host=marcharnssmarc.mysql.db;dbname=marcharnssmarc;charset=utf8','marcharnssmarc','Bumiere753');
	
	//ENTER THE RELEVANT INFO BELOW
    $mysqlUserName      = "marcharnssmarc";
    $mysqlPassword      = "Bumiere753";
    $mysqlHostName      = "marcharnssmarc.mysql.db";
    $DbName             = "marcharnssmarc";
    $backup_name        = "mybackup.sql";
    $tables             = "Your tables";
  }
  catch (Exception $e)
  { // connexion fails: get error message
    die('Erreur: ' . $e->getMessage());
  }
}
include(ROOT.'/admin/inc/header.php');
?>
<?php 


   //or add 5th parameter(array) of specific tables:    array("mytable1","mytable2","mytable3") for multiple tables

    Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName,  $tables=false, $backup_name=false );

    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES'); 
        while($row = $queryTables->fetch_row()) 
        { 
            $target_tables[] = $row[0]; 
        }   
        if($tables !== false) 
        { 
            $target_tables = array_intersect( $target_tables, $tables); 
        }
        foreach($target_tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');   
        header("Content-Transfer-Encoding: Binary"); 
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");  
        echo $content; exit;
    }
?>

<!-- Pied de page ------------------------------>
<?php include(ROOT.'/admin/inc/footer.php');?>