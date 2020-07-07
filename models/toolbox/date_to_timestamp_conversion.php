<?php
/*
      FROM DATE TO TIMESTAMP
	  
	  
	  
	  // Informe here you date:
*/
	  $mydate = "13/08/2017";
?>



<h3>I. Date => timestamp, (22-09-2008 => 1222041600)</h3>

<h4>I. Function String to time: strtotime</h4>

<?php
  // ( timestamp Mauzé = time() + 3600)
 
  // Date -> timestamp
  echo "I.1. strtotime('22-09-2008') = " , strtotime('22-09-2008'); //-> strtotime('22-09-2008') = 1222041600
  echo "<hr />";
  echo "I.2. strtotime('13-08-2017') = ". strtotime('13-08-2017'); // -> 2. strtotime('13-08-2017') = 1502582400
  echo "<hr />";
?>
  
<p><strong>I.3. Informe the date: The slash "/" must be changed to "-" with the help of "str_replace" !</strong><br />

<?php
  $mydate = $mydate; // Informe on the top of this page !
  echo "\$mydate = \"14/08/2017\";";

  $mydate = str_replace('/','-',$mydate);// replace / to -
  echo "\$mydate = <strong>str_replace</strong>('/','-',\$mydate); // the / must -> -";
  
  // MY DATE -> TIMESTAMP
  $timestamp = strtotime($mydate);
?>

<p>
  <strong>
    I.4. "Date" &#8594 "timestamp" with the help of "strtotime" !
  </strong>
  <br />

<?php
  echo "\$timestamp = <strong>strtotime</strong>(\$mydate);";
  echo "<br />";
  echo "=> \$timestamp = $timestamp";// -> 6. timestamp = 1502668800
  echo "<br />";
  echo  "<strong>Result: $mydate &#8594 $timestamp</strong>";
  echo "<br />";
  if($timestamp == "") // la variable est vide, le formulaire mal rempli
  {  //$date = error message pasted in the page new in the case date of the form
	$date = "jj/mm/aaaa Merci de renseigner la date au format jj/mm/aaaa"; // error message
    exit("Merci de renseigner la date au format jj/mm/aaaa");// exit+message
	echo "à cause d'exit() ce code ne sera jamais affiché !";// lol
  }
  if( !preg_match( '`(\d{1,2})-(\d{1,2})-(\d{4})`' , $mydate ) )
  {  
	$date = "jj/mm/aaaa Merci de renseigner la date au format jj/mm/aaaa";
    exit("Merci de renseigner la date au format jj/mm/aaaa");
	echo "à cause d'exit() cette ligne ne sera jamais affiché !";
  }
  else
  {
	$date = "La date $mydate est correcte.";
   ?>
   <hr />
	<h4>II. Reconverstion timestamp en date:</h4>
  <?php
  echo "\$timestamp = $timestamp;<br />";
  $date = date('d/m/Y', $timestamp);
  echo "\$date = <strong>date</strong>('d/m/Y', \$timestamp);";
  echo "<br />";
  echo "=> \$date =  $date";
  }
    echo "<hr />";
?>