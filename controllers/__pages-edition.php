<?php

/**
*
*		SYSTEME D'EDITION DE PAGES   13/08/2017 ML-Harnist
*
******************************************************************/

$website->membersPermissions(2, $member);

// include_once('models/get-one-page.php'); // Get the page with id in url: id= (method GET)

$read = new Database;	// POO! $read = objet qui contient toute la table des pages
	$pages      = $read->getOnePageByIdToUpdate(); // On veut une seule page par son id
	$categories = $read->list_categories(); // Méthode qui liste les catégories existantes dans les pages
					
// Si une image a été uploadé / if an image has been uploaded
if(isset($_GET['image'])){
	$image = $_GET['image'];
	$image = '<img class="w-100" src="' . $website->img_url . $image . '" alt="' . $image . '">';
}