<?php
/****                 - Controller __uploader-file.php -*                        	Marc L. Harnist*                              2018-10-09*	MAJ:*   Particularité: charge n'importe quel fichier.*  *   Permissions: page réservée aux niveaux 1 et 2*/  $website->membersPermissions(1, $member);/** Répertoire qui réceptionnera les fichiers***/ $repertoire = "backups/secret/";    // $path = "uploads/";
	$path = $repertoire;
	$message = "";
	/** Message**   Par défaut, il n'y a pas de chargement**/ $chargement = false;  //Controle  if(!empty($_FILES['uploaded_file']))
  {
    $path = $path . basename( $_FILES['uploaded_file']['name']);
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      $message = "The file ".  basename( $_FILES['uploaded_file']['name']). 
      " has been uploaded";
    } else{
        $message = "There was an error uploading the file, please try again!";
    }
  }