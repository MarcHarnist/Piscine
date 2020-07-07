<?php

/**          HOMEPAGE - ACCUEIL
*    
*    15/09/2017 by Marc Harnist.
*    19/07/2018 PHP to OOP: object "$read" = array() 
*    which content all pages from "pages" mysql/table
*/


/** New object "read" created now which content all pages
*   from mysql/table "pages"
*/
$read = new Database;

/** Method which list all existant categories of "pages"
*   Only categorie "news" is wanted
*/
$categories = $read->list_categories(); 
$page_en_cours_de_lecture = $read->getPagesByCategories("news", "accueil", 10000000);
    //Paratmètres: catégorie (ici "news", page (ici "accueil"), nombres de caractères pour l'extrait (ici 10 000 000 = tout)