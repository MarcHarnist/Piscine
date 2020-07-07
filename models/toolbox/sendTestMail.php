<?php


//////////////////////////////////
//                              //
//  Tableau de bord admin       //
//  26/07/2017                  //
//                              //
//////////////////////////////////

// Je renseigne le titre de la page dans une variable qui servira plusieurs fois.
$title ="Send a test mail";

// Inclusion de l'entête	
if($_SERVER['HTTP_HOST'] == 'localhost'){    // we are on WAMP
  $www_real_path = "C:\wamp64\www\www";      //for includes
}
else{                                        // We are online
  $www_real_path = "/home/marcharnss/www";   //for includes  
}
include(ROOT.'/admin/inc/header.php');
?>
<!-- Fin de l'entête ---------->



<?php //Send a test mail
/* Email du destinataire (mettez ici votre email) */
$destinataire = "harnist.marc@gmail.com"; // $mail_du_site renseigné dans config.php
$objet = "Alerte ! Mail automatique du site web $nom_du_site";
$message = "Alerte ! Private est en danger: .htaccess est absent !";
$header = "From: " . $destinataire;
/* Envoi du mail */
mail( $destinataire , $objet , $message , $header );
?>




<!-- Pied de page ------------------------------>
<?php include(ROOT.'/inc/footer.php');?>