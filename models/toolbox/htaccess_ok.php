<?php

if($_SERVER['HTTP_HOST'] !== 'localhost'){
  // $page = "ROOT.'/admin/.htaccess";
  $page = "admin/z__/.htaccess";
  if (file_exists($page) == FALSE){
    /* Email du destinataire (mettez ici votre email) */
    $destinataire = "harnist.marc@gmail.com"; // $mail_du_site renseigné dans config.php
    $objet = "Alerte ! Mail automatique du site web WEBSITE_NAME   = ;
";
    $message = "Alerte ! Private est en danger: .htaccess est absent ! Il devrait se trouver ici: $page";
    $header = "From: " . $destinataire;
    /* Envoi du mail */
    mail( $destinataire , $objet , $message , $header );  
    }
}
