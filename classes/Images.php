<?php
/**                  Classe Images
*                   Marc L. Harnist
*                       01/09/2018
* UPDATED: 01/09/2018
* FILE USING THIS CLASS: controllers/__images.php
* Methodes
* explorer()
*/
class Images {

  public $dir; // Directory name that will be explored


  /* explorer().............15
  *    Description : lit les noms des fichiers d'un dossier et
  *    les renvoie dans un array
  *    Paramètres : [string] nom du repertoir à lire
  *    Valeurs retournées : [array] avec les noms des fichiers
  *    Auteur : Marc L. Harnist
  *    Version : 1.0
  *    Créée le : 25/03/2018
  *    Modifiée le : 25/03/2018
  **/

  public static function explorer($dir){

    $count = $count_sql = $count_dir = $count_php = $count_img = 1;
    $autres_fichiers = $repertoires = $fichiers_sql = $fichiers_php = $fichiers_img = "";
    $list = [];
    $directory = $dir;

    //  si le dossier (directory) choisi existe
    if (is_dir($dir)) {
      // si il contient quelque chose
      if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
          // tant que quelque chose est trouvé dans ce répertoire
          // affiche le nom et le type si ce n'est pas un element du systeme
          $type = filetype($dir.$file);
          $symbole_des_programmes = "__";// Programmes de Marc L. Harnist
          if (stripos($file, $symbole_des_programmes) == TRUE)//si le fichier est un programme
            $file = 'programme'; // si on veut afficher les programmes "commenter" cette ligne
          if($file != '.' && $file != '..' && $file !== 'programme' && $file !== 'index.php' && $file !== 'menu.php'){
			//"." = repertoire où nous sommes, ".." = dossier parent
            //Est-ce un repertoire ou un fichier? Si oui l'affichage sera différent */
            if($type == 'dir'){
              $url = $file;
              $name_without_ = str_replace("_"," ",$file);//erase _
              $file = ucfirst($file);//On met une majuscule. Plus joli.
              $repertoires .= "$count_dir. <a href=\"./$url\">$name_without_</a> <br />";
              $count_dir++;}
            else {
              // Ce n'est pas un repertoire mais un fichier, récupération de l'extension
              $extension = pathinfo($file, PATHINFO_EXTENSION);
              if($extension == 'sql'){
                $url = $file;
                $file = ucfirst($file);//On met une majuscule. Plus joli.
                $name_without_ = str_replace("_"," ",$file);//erase _
                $fichiers_sql .= "$count_sql. <a href=\"./$url\">$name_without_</a> <br />";
                $count_sql++;}
              elseif($extension == 'php'){
			    /* si le fichier ne contient pas __ on l'afiche dans le menu.*/
                $url = $file;
  			    $file = ucfirst($file);//On met une majuscule. Plus joli.
				$name_without_ = str_replace("_"," ",$file);//erase _
				$fichiers_php .= "$count_php. <a href=\"$dir.$url\">$name_without_</a> <br />";
				$count_php++;}
              elseif($extension == 'jpg'){
                /* si le fichier ne contient pas __ on l'afiche dans le menu.*/
                $url = $file;
                $name = $file; // for array $list
                $extension = "." . $extension;
                $name_without_extension = str_replace($extension, "", $name); // for array $list
                $file = ucfirst($file);//On met une majuscule. Plus joli.
                $name_without_ = str_replace("_"," ",$file);//erase _
                $fichiers_img .= "$count_php. <a href=\"$directory$url\">$name_without_</a> <br />";
                $count_img++;
                $list[] = $name_without_extension;}
              else {
				// tous les autres fichiers
                /* si le fichier ne contient pas __ on l'afiche dans le menu.*/
                $url = $file;
                $file = ucfirst($file);//On met une majuscule. Plus joli.
                $autres_fichiers .= "$count. <a href=\"./$url\">$file</a> <br />";
                $count++;}
            }//Ferme else de if($type == 'dir')
          }//Ferme  if($file != '.' && $file != '..' && $file !== 'programme' && $file !== 'index.php' && $file !== 'menu.php')
        }//Ferme while (($file = readdir($dh)) !== false)
         
	    // on ferme la connection
        closedir($dh);
        return $list;
      }//Ferme if ($dh = opendir($dir))
    }//Ferme if (is_dir($dir))
  } //Ferme la fonction
}//Ferme la classe