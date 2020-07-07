<?php // Since php5: "[" = array !
  include('../config.php');
  $valeurs = [
    "Tom",
    "Pouce",
    "est",
    "un",
    "enfant.",
  ];
  $valeurs_saved = $valeurs; // save the array
  foreach ($valeurs as $valeurs) :
  echo " - $valeurs";
  endforeach;
?>
<hr />
<h3>Second time:</h3>
<?php
  
  //second foreach
  foreach ($valeurs_saved as $valeurs_saved) :
  echo " - $valeurs_saved";
  endforeach;
  
  
?>

<?php  //var_dump shows the line 17 !
       // var_dump($valeurs[3]); // -> affiche 4ème valeurs (1er = [0]
	   
	   
?>