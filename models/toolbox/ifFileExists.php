<?php


// On vérifie que la page est bien sur le serveur
$page ='/home/marcharnss/www/admin/.htaccess';
if (file_exists($page) == FALSE){
  echo "<h1>Alerte ! Private n'est pas protégé .htaccess est absent !</h1>";
  
  /* Un mail d'alerte peut être envoyé au webmaster */
  // $destinataire = "harnist.marc@gmail.com"; // $mail_du_site renseigné dans config.php
  // $objet = "Alerte ! Mail automatique du site web $nom_du_site";
  // $message = "Alerte ! Private n'est pas protégé .htaccess est absent !";
  // $header = "From: " . $destinataire;
  // /* Envoi du mail */
  // mail( $destinataire , $objet , $message , $header );
}
?>