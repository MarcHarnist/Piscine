<?php
$website->membersPermissions(1, $member);

if(isset($_GET['operation'])){
	$file = new Files;
	$destruction = $file->destruction($_GET);
}

$count = $count_sql = $count_dir = $count_php= 1;
$autres_fichiers = $repertoires = $fichiers_sql = $fichiers_php = "";
$dir = "backups/sql/";
//	si le dossier pointe existe
if (is_dir($dir)) {
	 // si il contient quelque chose
	 if ($dh = opendir($dir))
	 {
		// boucler tant que quelque chose est trouve
		while (($fichier = readdir($dh)) !== false) {
			// affiche le nom et le type si ce n'est pas un element du systeme
			$type = filetype($dir.$fichier);
			if( $fichier != '.' && $fichier != '..' && $fichier !== 'programme') {
				// Est-ce un repertoire ou un fichier? Si oui l'affichage sera différent
				if($type == 'dir') {
					$url = $fichier;
					$fichier = ucfirst($fichier);//On met une majuscule. Plus joli.
					$repertoires .= "<br />$count_dir. <a href=\"./$url\">$fichier</a> ";
					$count_dir++;
				}
				else {
					// Ce n'est pas un repertoire mais un fichier
					// Récupération de l'extension
					$extension = pathinfo($fichier, PATHINFO_EXTENSION);
					$realpath = $dir.$fichier;
					if($extension == 'sql') {
						$url = $fichier;
						$fichier = ucfirst($fichier);//On met une majuscule. Plus joli.
						$fichiers_sql .= "<br />$count_sql. <a href=\"./$url\">$fichier</a> ";
						$count_sql++;							
					}
					elseif($extension == 'php') {
					/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
					$url = $fichier;
					$fichier = ucfirst($fichier);//On met une majuscule. Plus joli.
					$fichiers_php .= "<br />$count_php. <a href=\"./$url\">$fichier</a> ";
					$count_php++;
					}
					else {
						// tous les autres fichiers
						/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
						$url = $fichier;
						$fichier = ucfirst($fichier);//On met une majuscule. Plus joli.
						$autres_fichiers .= "<br />$count. <a href=\"$dir$url\">$fichier</a> - <a href=\"".	$website->page_url ."__sql-repertoire&operation=delete&fichier=".$realpath."\">Supprimer</a><br> ";
						$count++;
					}
				}
			}
		}
		// on ferme la connection
		closedir($dh);
	}
}
