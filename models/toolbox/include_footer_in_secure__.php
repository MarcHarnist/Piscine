<?php
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
	if (preg_match("admin",$footer)) {
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