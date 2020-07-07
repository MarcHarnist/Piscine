<?php

/**          Combien d'enfants 
*    
*    02/02/2019 by Isabelle and Marc Harnist.
*    Si l'utilisateur s'est trompé, il est redirigé vers la page erreur
*    Qui récupère un message et une image
*/
$age = (isset($_POST['age']) && $_POST['age'] !== "")?intval($_POST['age']):"";
/** Ce code concis correspond à : 
* if(isset($_POST['age']) && $_POST['age'] !== ""){
*   $age = intval($_POST['age'])
* else
*   $age = "";
*/