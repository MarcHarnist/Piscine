<?php
/**                              INDEX.PHP
*
*                               Marc Harnist
*                                27/08/2018
*
*  27/08/18 écriture complète de l'uploader des classes au lieu d'utiliser
*  un "include_once". Chemin réel: "root/index.php." Plan: Models / View /
*  Controllers en PHP et POO. Particularité: 1er fichier lu par le naviga-
*  teur. Tous les fichiers du site (les modèles, les classes, les contrôl-
*  eurs, l'en-tête du site, la vue, le pied de page) sont inclus ici....*/

session_start(); // Pour l'espace membre
ini_set('display_errors',1); // Affichage des erreurs chez OVH

/********************************** MODELES ********************************
*
*   Uploader des classes
*/  function upload($classname){
	  require 'classes/' . $classname.'.php';
    }
spl_autoload_register('upload');
$website = new Website;        //Fichier config du site web...................
$page    = new Page;           //Nouvel objet "$page" ($_Get['page']).........
$member  = $website::session();//$_Session['member']->object $member..........
/****************************************************************************/

/***************************** CONTROLEUR && VUE ****************************/
include_once $page->controller;//inclut le contrôleur de la page s'il existe.
include_once $page->header;    //inclut inc/header, en-tête du site..........
include_once $page->view;      //inclut la vue de la page si elle existe.....
include_once $page->footer;    //inclut inc/footer, pied de page du site.....
/****************************************************************************/