<?php
/****                 - Controller __explorer.php -
*
*	Marc L. Harnist
*	25/03/2018
*	Updated: 31/07/2018
*	Controller & view: __explorer.php
*	Classes: Explorer, Files
*/

/** PERMISSIONS ****************************
*   Page réservée aux niveaux 1 et 2
*/  $website->membersPermissions(2, $member);

/** DECLARATION DE TOUTES LES VARIABLES DU FICHIER **********************
*/	$autres_fichiers = $repertoires = $fichiers_sql = $fichiers_php = "";
	$explorer = $key = "";
	$signe_caracteristique_d_un_programme = "__";

/**  LES IMAGES  *****************************************************
*    On récupère les noms de tous les fichiers de root/img/ grâce à la
*    method explorer() de la class root/models/class/Explorer.php pour
*    les afficher dans la vue.
*/   $repertory = "./img/";
     $dir = new Images;
	 $images = $dir->explorer($repertory);

/** LES AUTRES FICHIERS **********************************************
*
*	This file read the contain of the directorys
*  	and display the names of the files in a menu.
*/  $repertoire_a_explorer = "inc";
	if(isset($_POST['other_dir'])) $repertoire_a_explorer = $_POST['other_dir'];
	$first_dir_name = $repertoire_a_explorer;
	$dir = $repertoire_a_explorer . "/"; // Directory explored
	$clean = ["."];
	$dir_beautifull = ucfirst(str_replace($clean, "", $first_dir_name));

/** RECHERCHE DU FICHIER SI LE CHEMIN EST FAUX ******************************
*
*   Si le chemin est faux
*/  if(is_dir($dir) == False){
		$new_dir = $dir;// Chemin faux: variable créée avec le nouveau chemin
		for($i = 100; is_dir($new_dir) == False; $i--){
			$new_dir = "../" . $new_dir;
			if($i == 0) exit("Le nom ou le chemin du dossier est faux.");
			}
		$dir = $new_dir;
	}
$domaine = $website::DOMAIN;
$url = $website->website_url;
$array = explode("/", $website->website_url);
	// $website->website_url = /light/ 
	// for http://marcharnist.fr/light/index.php
	
for($i = count($array)-1; $i > 0; $i--){
	if($i == count($array)-1){
		$explorer =  "<br>" . $i . ". Nous sommes dans le dossier: <span style=\"color:blue;\">" . ucfirst($array[$i]) . "</span> Lien: <a href=\"$url\">" . $array[$i] . "</a><br>" . $explorer;

		// Préparation d'un menu de navigation: root/dir1/dir2/dir3.../file.php
		$link_one = "<a href=\"$url\">" . $array[$i] . "</a>";
		}
	elseif($i == count($array)-3){ $explorer =  $i . "Voici le nom du dossier parent: <span style=\"color:blue;\">" . ucfirst($array[$i]) . "</span> Lien: <a href=\"../../$array[$i]\">" . $array[$i] . "</a> <br>" . $explorer;}
	elseif($i == count($array)-4)
		$explorer =  $i . "Voici le nom du dossier \"grand-parent\": <span style=\"color:blue;\">" . ucfirst($array[$i]) . "</span> Lien: <a href=\"../../../$array[$i]\">" . $array[$i] . "</a><br>" . $explorer;
	elseif($i == count($array)-5)
	$explorer =  $i . "Voici le nom d'un dossier \"arrière-grand-parent\": <span style=\"color:blue;\">" . ucfirst($array[$i]) . "</span> Lien: <a href=\"../../../../$array[$i]\">" . $array[$i] . "</a><br>" . $explorer;
	elseif($i == 1) $explorer =  "Voici la racine (root en anglais) du site web: <span style=\"color:blue;\">" . ucfirst($array[$i]) . "</span><i>  </i></p>" . $explorer;
	else
		$explorer =  $i . "Voici le nom d'un dossier \"arrière-grand-parent\" d'un niveau encore plus élevé: <span style=\"color:blue;\">" . ucfirst($array[$i]) . "</span> Lien: <a href=\"../../../../../$array[$i]\">" . $array[$i] . "</a><br>" . $explorer;


} // Close 	for($i = count($array); $i == 1; $i--){



//  si le dossier pointe existe
if (is_dir($dir)) {

  // si il contient quelque chose
  if ($dh = opendir($dir)){
	// boucler tant que quelque chose est trouvé
	while (($file = readdir($dh)) !== false){	
		$explorateur[$key]["dir"] = $dir;
		$explorateur[$key]["type"] = filetype($dir.$file); // $dir.$file = inc/footer.php
		$explorateur[$key]["url"] = $file;
		$explorateur[$key]["file_name"] = $file ;
		$explorateur[$key]['domaine'] = $website::DOMAIN;
		$extension = pathinfo($file, PATHINFO_EXTENSION); // Récupération de l'extension
		$explorateur[$key]["extension"] = $extension; 
		$test = $explorateur[$key]["extension"];
		$key++;
	}
	  closedir($dh); // on ferme la connection
  }
}