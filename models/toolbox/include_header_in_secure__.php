<?php	
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
?>