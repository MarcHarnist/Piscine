<?php

// On demande toutes les pages qui ont une categorie "new"
$category = "pages"; // default value: fonction default value doesn't work

// $_GET comes from inc/header/<nav>links</nav>
if(isset($_GET['categorie'])) $category = htmlspecialchars($_GET['categorie']);

$read = new Database;	// POO! $lire = array() qui contient toute la table des pages
	$pages = $read->getPagesByCategories($category, '', 300);
	// Méthode qui liste les catégories existantes dans les pages
	//Parametres: catégorie, page (exemple: accueil), nombres de caractères pour l'extrait
