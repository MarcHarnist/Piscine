<?php

/** MOTOR INDEX included in several files
	Do not delete me !
  
  This file read the contain of the directorys
  and display the names of the files in a menu.

**/

$count = $count_sql = $count_dir = $count_php= 1;
$autres_fichiers = $repertoires = $fichiers_sql = $fichiers_php = "";
$dir = "./";
//  si le dossier pointe existe
if (is_dir($dir)) {

   // si il contient quelque chose
   if ($dh = opendir($dir))
   {
        // boucler tant que quelque chose est trouvé
        while (($file = readdir($dh)) !== false) 
		{
			
			// affiche le nom et le type si ce n'est pas un element du systeme
            $type = filetype($dir.$file);
			
			$signe_caracteristique_d_un_programme = "__";
			
			// Voyons si le fichier ou le repertoire est un programme:
			if (stripos($file, $signe_caracteristique_d_un_programme) == TRUE)
			{
				$file = 'programme'; // si on veut afficher les programmes supprimer cette ligne 
			}
            if( $file != '.' && $file != '..' && $file !== 'programme' && $file !== 'index.php' && $file !== 'menu.php') 
			{
				// Est-ce un repertoire ou un fichier? Si oui l'affichage sera différent
				if($type == 'dir')
				{
					{
					$url = $file;
					$name_without_ = str_replace("_"," ",$file);//erase _
					$file = ucfirst($file);//On met une majuscule. Plus joli.
					$repertoires .= "$count_dir. <a href=\"./$url\">$name_without_</a> <br />";
					$count_dir++;
					}
				}
				else
				// Ce n'est pas un repertoire mais un fichier
				{					  // Récupération de l'extension
                  $extension = pathinfo($file, PATHINFO_EXTENSION);
				  if($extension == 'sql')
				  {
					  $url = $file;
					  $file = ucfirst($file);//On met une majuscule. Plus joli.
					  $name_without_ = str_replace("_"," ",$file);//erase _
					  $fichiers_sql .= "$count_sql. <a href=\"./$url\">$name_without_</a> <br />";
                      $count_sql++;						  
				  }
				  elseif($extension == 'php')
				  {
					/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
					$url = $file;
					$file = ucfirst($file);//On met une majuscule. Plus joli.
                    $name_without_ = str_replace("_"," ",$file);//erase _
					$fichiers_php .= "$count_php. <a href=\"./$url\">$name_without_</a> <br />";
                    $count_php++;
				  }
				  else // tous les autres fichiers
					{
					/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
					$url = $file;
					$file = ucfirst($file);//On met une majuscule. Plus joli.
					$autres_fichiers .= "$count. <a href=\"./$url\">$file</a> <br />";
                    $count++;
				  }
				    
				}
           }
        }
       // on ferme la connection
       closedir($dh);
   }
}
if($repertoires !== ""){
	?>
	<hr>
 	<h5>Repertoires:</h5>
    <p><?=$repertoires;?></p>
	<?php
}
if($fichiers_php !== ""){
    ?>
	<hr>
    <h5>Fichiers php:</h5>
    <p><?=$fichiers_php;?></p>
	<?php
}
	if($fichiers_sql !== ""){
    ?>
	<hr>
    <h5>Fichiers Sql à télécharger</h5>
    <p><?=$fichiers_sql;?></p>
	<?php
}
if($autres_fichiers !== ""){
    ?>
	<hr>
    <h5>Autres fichiers:</h5>
    <p><?=$autres_fichiers;?></p>
	<?php
}
