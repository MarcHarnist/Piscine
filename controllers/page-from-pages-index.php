<?php

if(isset($_GET['id']) && !empty($_GET['id'])){
    //Get['id'] vient de la page page-index, ou page-from-page-index ou accueil
	$id = htmlspecialchars($_GET['id']);
    $read = new Database;	// POO! $read = objet qui contient toute la table des pages
	$page_en_cours_de_lecture = $read->getOnePageById($id); // On veut une seule page par son id
}

/** Permissions to display editions links in the view
*   Edition link: include_once("view/".'__menu-edition.php');
*/
	if(isset($_SESSION['member']) && isset($member->level)) {
	if($member->level > 2) {
		$editor = False;
	} else $editor = True;
}
