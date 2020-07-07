<?php


//////////////////////////////////
//                              //
//  Nouvelle page privée        //
//  05/08/2017                  //
//                              //
//////////////////////////////////

// Je renseigne le titre de la page dans une variable qui servira plusieurs fois.
$title ="Nouvelle page privée";

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



<p>Page vierge</p>
<h3 class="warning">N'oubliez pas de renseigner le titre de la page !</h3>



<!-- Pied de page ------------------------------>
<?php include(ROOT.'/admin/inc/footer.php');?>