<?php


//////////////////////////////////
//                              //
//  My Toolbox                  //
//  26/07/2017                  //
//                              //
//////////////////////////////////

$title ="My toolbox ;)"; // Title of the page. Will serve several times.
$www_real_path = "/home/marcharnss/www"; //Path on line
if($_SERVER['HTTP_HOST'] == 'localhost'){       //Datas for WAMP
   $www_real_path = "C:\wamp64\www\www"; //Realpath For WAMP
}  include(ROOT.'/admin/inc/header.php');   //Header inclusing
?>
<!-- Fin de l'entête ---------->

<h3>Index ;)</h3>
<p>
    <?php 
	$count = $count_sql = $count_dir = $count_php= 1;
	$autres_fichiers = $repertoires = $fichiers_sql = $fichiers_php = "";
    $dir = "./";
    //  si le dossier pointe existe
    if (is_dir($dir)) {
    
       // si il contient quelque chose
       if ($dh = opendir($dir))
	   {
            // boucler tant que quelque chose est trouve
            while (($file = readdir($dh)) !== false) 
			{
				
				// affiche le nom et le type si ce n'est pas un element du systeme
                $type = filetype($dir.$file);
				
				$signe_caracteristique_d_un_programme = "__";
				
				// Voyons si le fichier ou le repertoire est un programme:
				if (stripos($file, $signe_caracteristique_d_un_programme) == TRUE)
				{
				


				
					//on veut tout afficher ici pour le moment 
					//sinon oter les // devant $file = 'programme';
				
					// C'est un programme
					// $file = 'programme'; 
					


				
				}
                if( $file != '.' && $file != '..' && $file !== 'programme') 
				{
					// Est-ce un repertoire ou un fichier? Si oui l'affichage sera différent
					if($type == 'dir')
					{
						{
						$url = $file;
						$file = ucfirst($file);//On met une majuscule. Plus joli.
						$repertoires .= "<br />$count_dir. <a href=\"./$url\">$file</a> ";
						$count_dir++;
						}
					}
					else
					// Ce n'est pas un repertoire mais un fichier
					{					  // Récupération de l'extension
                      $extension = pathinfo($file, PATHINFO_EXTENSION);
					  if($extension == 'sql')
					  {
						  $url = $file;
						  $file = ucfirst($file);//On met une majuscule. Plus joli.
						  $fichiers_sql .= "<br />$count_sql. <a href=\"./$url\">$file</a> ";
                          $count_sql++;						  
					  }
					  elseif($extension == 'php')
					  {
						/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
						$url = $file;
						$file = ucfirst($file);//On met une majuscule. Plus joli.
						$fichiers_php .= "<br />$count_php. <a href=\"./$url\">$file</a> ";
                        $count_php++;
					  }
					  else // tous les autres fichiers
						{
						/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
						$url = $file;
						$file = ucfirst($file);//On met une majuscule. Plus joli.
						$autres_fichiers .= "<br />$count. <a href=\"./$url\">$file</a> ";
                        $count++;
					  }
					    
					}
               }
            }
           // on ferme la connection
           closedir($dh);
       }
    }
?>

</p>

<?php
	echo "
		  <hr>
		  <h4>Repertoires:</h4>
	      <p>$repertoires</p>
		  
		  <hr>
	      <h4>Fichiers php:</h4>
	      <p>$fichiers_php </p>

		  <hr>
	      <h4>Fichiers SQL à télécharger:</h4>
          <p>$fichiers_sql</p>

		  <hr>
	      <h4>Autres fichiers:</h4>
	      <p>$autres_fichiers </p>
		  <hr>

		  <p></p>
		  <p></p>
		  <p></p>
		  ";
    ?>
