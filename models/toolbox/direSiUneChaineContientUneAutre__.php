<?php
//Chercher si une chaine de caractères se trouve dans une autre
$texte = "Bonjour __";
$chercher = "__";
if (stripos($texte, $chercher) == TRUE)
{
  //$chercher ne se trouve pas dans $texte est présente
  echo "Après vérification, \"$texte\" contient bien \"$chercher\".";
}
else
{
  echo "\"$texte\" ne contient pas \"$chercher\"<br /><br />.";
}
?>

<h2>Autre test</h2>
<?php
//Chercher si une chaine de caractères se trouve dans une autre
$texte = "_q1_";
$chercher = "q1_";
if (stripos($texte, $chercher) == TRUE)
{
  //$chercher ne se trouve pas dans $texte est présente
  echo "Après vérification, \"$texte\" contient bien \"$chercher\".";
}
else
{
  echo "\"$texte\" ne contient pas \"$chercher\".";
}

?>