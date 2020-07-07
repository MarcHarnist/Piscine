<?php

// Renseignement et connexion à la db selon l'hôte
if($_SERVER['HTTP_HOST'] == 'localhost'){    // we are not on line (WAMP)
  $www_real_path = "C:\wamp64\www\www";      //for includes
  echo '<h3>Off line !</h3>
  ';

  try { // Try: je test si la connexion réussie
    // $db = new PDO
    $db = new PDO('mysql:host=localhost;dbname=openclassroomcurse', 'root', '');
  }
  catch (Exception $e){ // La connexion échoue: je récupère le message d'erreur
    die('Erreur: ' . $e->getMessage());
  }
}
else{ // We are online
  $www_real_path = "/home/marcharnss/www";   //for includes  
  echo '<h3>On line !</h3>
      ';
  try{ // Try: je test si la connexion réussie
    $db = new PDO ('mysql:host=marcharnssmarc.mysql.db;dbname=marcharnssmarc;charset=utf8','marcharnssmarc','Bumiere753');
  }
  catch (Exception $e){ // La connexion échoue: je récupère le message d'erreur
    die('Erreur: ' . $e->getMessage());
  }
}
?>