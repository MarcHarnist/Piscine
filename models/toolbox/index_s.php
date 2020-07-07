<?php


//////////////////////////////////////////////////////////////
//                              //
//  Tests pour le budget...........................       //
//  26/07/2017                        //
//                              //
//////////////////////////////////////////////////////////////

// Je renseigne le titre de la page dans une variable qui servira plusieurs fois.
$title ="Calculs";
  
  
  
  

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
if (preg_match("/admin/",$header)) {
  echo "Vous n'avez pas accès à ce répertoire";
 }
else {
  // On vérifie que la page est bien sur le serveur
  if (file_exists($header) && $header != 'index.php') 
  {
  // Tout est ok: J'inclus le fichier config qui contient des données redondantes
  include($header);
  }
  else 
  {
  echo $header . " = page inexistante !";
  }
}   /////////////// fin du header ///////////////////////
?>











<!-- VOICI MA PAGE -->


<?php
  
  echo "
  <ul>
    <li><a href=\"http://$_SERVER[SERVER_NAME]\">Accueil</a></li>
  </ul>
  ";  

  // Affichage des superglobales en cas de besoin
  // echo "<pre>",
  // print_r($GLOBALS);
  // "</pre>";
?>

<!-- Améliorer ce code en mettant des liens... -->
<h3>Index des fichiers du repertoire qui ne sont pas des programmes (qui ne finissent pas par __)</h3>
<p>
    <?php 
    $dir = "./";
    //  si le dossier pointe existe
    if (is_dir($dir)) {
    
       // si il contient quelque chose
       if ($dh = opendir($dir))
	   {
            // boucler tant que quelque chose est trouve
            while (($file = readdir($dh)) !== false) 
			{
                // affiche le nom et le type si ce n'est pas un element du systeme
                $type = filetype($dir.$file);
				
				$signe_caracteristique_d_un_programme = "__";
				
				// Voyons si le fichier ou le repertoire est un programme:
				if (stripos($file, $signe_caracteristique_d_un_programme) == TRUE)
				{
				


				
					//on veut tout afficher ici pour le moment 
					//sinon oter les // devant $file = 'programme';
				
					// C'est un programme
					// $file = 'programme'; 
					


				
				}
                if( $file != '.' && $file != '..' && $file !== 'programme') 
				{
					// Est-ce un repertoire ou un fichier? Si oui l'affichage sera différent
					if($type == 'dir')
					{
						{
						$url = $file;
						$file = ucfirst($file);//On met une majuscule. Plus joli.
						$texte = "Repertoire : <a href=\"./$url\">$file</a> ";
						}
					}
					else
					// Ce n'est pas un repertoire mais un fichier
					{
					  // Récupération de l'extension
                      $extension = pathinfo($file, PATHINFO_EXTENSION);
					  if($extension == 'sql')
					  {
						  $rajout = "Fichier SQL : ";
					  }
					  else
					  {
						  $rajout = "";
					  }
						/* si le fichier ne contient pas __ on l'afiche dans le menu.*/
						$url = $file;
						$file = ucfirst($file);//On met une majuscule. Plus joli.
						$texte = "$rajout<a href=\"./$url\">$file</a> ";
					}
					echo "$texte <br />";
               }
            }
           // on ferme la connection
           closedir($dh);
       }
    }
    ?>
</p>


















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
