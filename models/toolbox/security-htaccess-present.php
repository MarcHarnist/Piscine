<?php
// This file will be erased after member space created
if($wamp === False){
	$file = "admin/.htaccess";
	if (file_exists($file) == FALSE){
	  $destinataire = $webmaster_mail; // $webmaster_mail -> config.php
	  $objet = "Alerte ! Mail automatique du site web"  . WEBSITE_NAME;
	  $message = "Alerte ! Admin est en danger: .htaccess est absent ! Il devrait se trouver ici: $file";
	  $header = "From: " . $destinataire;
	  /* Envoi du mail */
	  mail( $destinataire , $objet , $message , $header ); 
	}
}
