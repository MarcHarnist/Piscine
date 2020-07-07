<?php

/**       Controller __sql-save.php
*
*   Auteur: Marc L. Harnist
*   Date: début 2018
*
*   Création d'un fichier de sauvegarde de la base de donnée
*   Mode: POO, PHP, MVC
*/

$website->membersPermissions(1, $member);

// Instanciation de la classe root/models/classes/Sql.php
$sql = new Sql;
	// La création d'un objet permet la protection des identifiants à la base de donnée grâce à l'encapsulation.
	
// Création d'une sauvegarde
$sql->download();

// Vérifions si le fichier de sauvegarde a bien été créé	
if (file_exists($sql->path.$sql->savedFile)) $saving=true;