<?php
include('../config.php');
$liens = [  // [ = array !
  "<a href=\"$url_admin/new\">News</a>",
  "<a href=\"$url_admin/game_in_POO/\">Jeu en POO !</a>",
  "<a href=\"$url_admin/budget/\">Compta</a>",
  "<a href=\"$url_admin/\">Private</a>",
  "<a href=\"$url_admin/toolbox\">Toolbox</a>",
  "<a href=\"$url_admin/formulaire_universel\">Formulaire Universel</a>",
];
  var_dump($liens);//shows all variables + code line number ! here 11
  // var_dump($liens);//shows all variables
  
  
  //so we can see:
  echo "17. $liens[5]";
  // echo $liens[3];
  
  
  // depuis PHP 5.4
$liens_test = [
    "bar",
    "foo",
];
var_dump($liens_test);
  echo "26. $liens_test[0]";



  //Exemple #2 Exemple sur la modification de type et l'écrasement

$array = array(
    1    => "a",
    "1"  => "b",//b remplace 1
    1.5  => "c",//1.5 tronqué en 1 remplace b
    true => "d",// true remplace tous les précédants
);
var_dump($array);

$array = array("foo", "bar", "hello", "world");
var_dump($array);
echo "<p>$array[3]</p>";


foreach ($liens as $liens) :  // afficher les valeurs avec option
echo " - $liens";             // ici option=ajouter " - " entre valeurs
endforeach;
?>
