<?php
/*****************************************************
*  Hy! Trying to show the MVC of my project. 
*  This fill is installed in "controller"  directory
*  Thanks for all reviews.  Marc Harnist 2017/08/31
*****************************************************/

$message = new Message();// My first class self made ! 08/2017 MarcL.Harnist

// include_once('models/clean-accents.php'); // Get all pages
// include_once('models/clean-url.php'); // Get all pages


// On récupère l'adresse de la page d'origine
if(isset($_GET['page_d_origine']))
	$page_d_origine = $_GET['page_d_origine'];
else
	$page_d_origine = "Attention, page d'origine inconnue...";

// On récupère l'adresse de la page d'origine
if(isset($_GET['id']))
	$id = $_GET['id'];
else
	$id = "Attention, id inconnu ...";

//Script PHP de l'upload d'image
 
/************************************************************
 *https://www.apprendre-php.com/tutoriels/tutoriel-17-uploader-des-images-sur-un-serveur-web.html
 * Script realise par Emacs
 * Crée le 19/12/2004
 * Maj : 23/06/2008
 * Licence GNU / GPL
 * webmaster@apprendre-php.com
 * http://www.apprendre-php.com
 *
 * Changelog:
 *
 * 2008-06-24 : suppression d'une boucle foreach() inutile
 * qui posait problème. Merci à Clément Robert pour ce bug.
 *
 *************************************************************/
 
/************************************************************
 * Definition des tableaux et variables
 *************************************************************/
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = $message = $nomImage = $upload	 = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 ***********************************************************/
if( !is_dir('img')) {
  if( !mkdir('img', 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))// si le post n'est pas vide on continue
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt)){
      // On recupere les dimensions du fichier
	  if(!empty($_FILES['fichier']['tmp_name'])){
		$infosImg = getimagesize($_FILES['fichier']['tmp_name']);
		  // On verifie le type de l'image
		  if($infosImg[2] >= 1 && $infosImg[2] <= 14){
			// On verifie les dimensions et taille de l'image
			// Constantes are defined in config file
			if(($infosImg[0] <= $website::WIDTH_MAX) && ($infosImg[1] <= $website::HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= $website::MAX_SIZE)){
			  // Parcours du tableau d'erreurs
			  if(isset($_FILES['fichier']['error']) 
				&& UPLOAD_ERR_OK === $_FILES['fichier']['error']){
					
					// On renomme le fichier
					$nomImage = $_FILES['fichier']['name'];

					// File name cleaning
					$nomImage = $page->cleanAccents($nomImage);// functions cleanAccents included above
					$nomImage = $page->cleanUrl($nomImage);
					
				// Si c'est OK, on teste l'upload
				if(move_uploaded_file($_FILES['fichier']['tmp_name'], "img/".$nomImage))
				{
					$message = 'Upload réussi !';
					$upload = True;
				}
				else
				{
				  // Sinon on affiche une erreur systeme
				  $message = 'Problème lors de l\'upload !';
				}
			  }
			  else
			  {
				$message = 'Une erreur interne a empêché l\'uplaod de l\'image';
			  }
			}
			else
			{
			  // Sinon erreur sur les dimensions et taille de l'image
			  if($infosImg[0] <= $website::WIDTH_MAX)
				  $message .= 'L\'image est trop large: '.$infosImg[0]. ' pour une largeur maximale de '. $website::WIDTH_MAX . ' définie dans le fichier config.';
			  if($infosImg[1] <= $website::HEIGHT_MAX)
				  $message .= 'L\'image est trop haute: ' . $infosImg[1] . ' pour une hauteur maximale autorisée de: '. $website::HEIGHT_MAX.' définie par la fichier config.';
			  if(filesize($_FILES['fichier']['tmp_name']) <= $website::MAX_SIZE)
				  $message .= 'L\'image a une taille trop grande: ' . $_FILES['fichier']['tmp_name'];
				  
			}
		  }
		  else
		  {
			// Sinon erreur sur le type de l'image
			$message = 'Le fichier à uploader n\'est pas une image !';
		  }
		 }else{
			  $message = 'Erreur dans les dimensions de l\'image !';
		 }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Choisissez d\'abord un fichier image !';
  }
}
$message = htmlspecialchars($message);