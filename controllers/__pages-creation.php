<?php

/**  SYSTEME DE NEWS	 13/08/2017 Marc L. Harnist devient POO   le 18/07/2018
*
*  This page reserved for level 1 & 2 users
*/ $website->membersPermissions(2, $member);

$date_default = date("d/m/Y"); 
	
$read = new Database;	// POO! $lire = array() qui contient toute la table des pages
	$categories = $read->list_categories(); // Méthode qui liste les catégories existantes dans les pages
	$last_id = $read->last_id(); // Last id create - dernier id créé toutes catégories confondues pour redirection finale
