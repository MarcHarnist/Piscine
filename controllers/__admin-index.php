<?php
/**       Contrôleur __admin-index.php
*              Marc L. Harnist
*
*  Date: 10/08/2018
*  Sommaire de l'administration
*
*  Réservé aux membres
*/ $website->membersPermissions(4, $member);// 4 = level of permission, $member = object

	$level  = $member->level();// member level if member exists, else: default value from Website class.
	$name   = $member->name();