<?php
/**                      Contrôleur __member-delete
*                            Marc L. Harnist
*                              28/08/2018
*
*   MAJ:
*
*   Autorisation limitée au webmaster
*/  $website->membersPermissions(1, $member);

/** Connexion à la base de donnée
*/  $database = new Database;

/** Déclaration des variables
*/  $ancre = $confirm = $id = "";
    $table = "light_members";

// Je récupère les données du formulaire
if(isset($_POST['confirm'])) $confirm = $_POST['confirm'];

// Have we confirm delete ?
if($confirm == "oui") {
	$database = $database->light_members("delete", $_POST);
	$url= $website->page_url . '__member-index#' . $database['ancre']; //$id est l'ancre de retour...
	header("Location:$url");
}
else {
	$database = $database->light_members("select", $_POST);
	$id = $database['id'];
	$name = $database['name'];
	$ancre = $database['ancre'];
	$url_de_retour_en_arriere = $website->page_url . '__member-index#' . $ancre;
}