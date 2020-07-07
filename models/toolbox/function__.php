<?php


//////////////////////////////////////////////////////////////
//															//
//	Site démo pour une formation ou une embauche avec CV	//
//															//
//////////////////////////////////////////////////////////////



	// Je renseigne le titre de la page dans une variable qui servira plusieurs fois.
	$title ="Marc Harnist Home Page";

///////////////////////// INCLUSION AVEC SECURITE DU HEADER /////////////////////	
		// J'inclus l'entête qui contient des données redondantes	
		// 1.- Sécurité !
		if (empty($header)) {
		 $header = "/home/marcharnss/www/inc/header";
		 
		 // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
		 // On supprime également d'éventuels espaces
		 $header = trim($header.".php");

		}

		// On évite les caractères qui permettent de naviguer dans les répertoires
		$header = str_replace("../","protect",$header);
		$header = str_replace(";","protect",$header);
		$header = str_replace("%","protect",$header);
		// On interdit l'inclusion de dossiers protégés par htaccess
		if (preg_match("admin",$header)) {
		 echo "Vous n'avez pas accès à ce répertoire";
		 }

		else {
			
				// On vérifie que la page est bien sur le serveur
				if (file_exists($header) && $header != 'index.php') 
				{
					// Tout est ok: J'inclus le fichier config qui contient des données redondantes
				   include($header);
					/*	
					*/
				}

				else 
				{
				echo $header . " = page inexistante !";
				}
			}
/////////////// fin du header ///////////////////////
		

		
		
		
///////////// The Page //////////////////////////////

// Afficher code php //








$code = '
86	function test() {
87	$toto = "Titi";
88	
89	echo \'$toto dans le contexte global: $GLOBALS["toto"]= \' . $GLOBALS["toto"] . "<br />"; // affichera:  Exemple de contenu
90	
91	echo \'$toto dans le contexte courant (inside function): $toto= \' . $toto . "<br />"; // affichera: variable globale
92 } 
93
94 $toto = "Toto";
95 echo \'$toto =\' . $toto . \' à la ligne 12<br />\';
96 echo \'$GLOBALS["toto"] =\' . $GLOBALS["toto"] . \'<br />\';
97 test();';
echo '<pre>' . htmlspecialchars($code) . '</pre>';



function test() {
	$toto = "Titi";
	
	echo '$toto dans le contexte global: $GLOBALS["toto"]= ' . $GLOBALS["toto"] . "<br />"; // affichera:  Exemple de contenu
	
	echo '$toto dans le contexte courant (inside function): $toto= ' . $toto . "<br />"; // affichera: variable globale
}

$toto = "Toto";
echo '$toto =' . $toto . ' à la ligne 12<br />';
echo '$GLOBALS["toto"] line 12 =' . $GLOBALS["toto"] . '<br />';
test();
	
	





	
/////////////////////////////////// INCLUSION DU FOOTER AVEC SECURITE  ////////////////////////

	if (empty($footer)) {
	 $footer = "/home/marcharnss/www/inc/footer";
	 
	 // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
	 // On supprime également d'éventuels espaces
	 $footer = trim($footer.".php");

	}

	// On évite les caractères qui permettent de naviguer dans les répertoires
	$footer = str_replace("../","protect",$footer);
	$footer = str_replace(";","protect",$footer);
	$footer = str_replace("%","protect",$footer);
	// On interdit l'inclusion de dossiers protégés par htaccess
	if (preg_match("/admin/",$footer)) {
	 echo "Vous n'avez pas accès à ce répertoire";
	 }

	else {
		
			// On vérifie que la page est bien sur le serveur
			if (file_exists($footer) && $footer != 'index.php') 
			{
				// Tout est ok: J'inclus le fichier config qui contient des données redondantes
			   include($footer);
				/*	
				*/
			}

			else 
			{
			echo $footer . " = page inexistante !";
			}
		}
///////////////////////// FIN DU FOOTER //////////////////////////////////
?>
