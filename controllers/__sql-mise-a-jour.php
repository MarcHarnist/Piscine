<?php

/**     __sql-mise-a-jour.php
*
*   Auteur: Marc L. Harnist
*   Date: 30/07/2018
*   Mise à jour:
*   Résumé: permet la mise à jour de la base de donnée:
*     Supprimer la base
*     Importer nouvelle base
*     Fichier d'origine: view/__sql-mise-a-jour.php
*/
$website->membersPermissions(1, $member);

$sql = new Sql; 
// var_dump($sql); die();
$base_name = "marcharnssmarc";

if(isset($_GET['action']))
{
	$action = $_GET['action'];
	if($action == 'supprimer_db')
	{
		// $action = $sql->supprimer_la_base($base_name);
	}

	// Avant de pouvoir charger un fichier compresser, il faut créer la base
	if($action == 'creer_db')
	{
		// die("creer");
		$action = $sql->creer_db($base_name);
	}

	if($action == 'charger_db')
	{
		die("charger");
		$action = $sql->charger_db($base_name);
	}
}