<?php
// $rest = substr("abcdef", -1);    // retourne "f"
$file = 'programme_a_ne_pas_afficher_dans_le_menu__.php';
$rest = substr($file, -6);

echo '<p>$rest = ' . $rest.'</p>';

if($rest == "__.php")
{
	echo "Le fichier: \"<strong>$file</strong>\" ne sera pas affiché dans le menu";
}
else
{
	echo "Le fichier: \"<strong>$file</strong>\" sera affiché dans le menu";
}
?>