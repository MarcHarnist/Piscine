<?php

/*******************************************************************************************************/
/** OBJECT ORIENTED PROGRAMMING LANGAGE                                                               **/
/*******************************************************************************************************/
/** CLASS ImageExplorer                                                                                    **/
/*******************************************************************************************************/
/** NAME: ImageExplorer                                                                                    **/
/*******************************************************************************************************/
/** AUTHOR: Marc L. Harnist                                                                           **/
/*******************************************************************************************************/
/** CREATION: 25/03/2018                                                                              **/
/*******************************************************************************************************/
/** UPDATED: 25/03/2018                                                                               **/
/*******************************************************************************************************/
/** FILE USING THIS CLASS: http://marcharnist.fr/zoo/controllers/achats.php                            **/
/**                                                                                                   **/
/*******************************************************************************************************/
/** FUNCTION INSIDE: ImageExplorer                                                                            **/
/**                                                                                                   **/
/*******************************************************************************************************/
class ImageExplorer {
	
	public $dir; // Directory name that will be read
	
		// Constructer
	public function __construct(){
		$dir = $this->dir;
	}

	/**********************************************************************************************/
	/**    FUNCTION                                                                              **/
	/**********************************************************************************************/
	/**    Nom : image_explorer                                                                           **/
	/**********************************************************************************************/
	/**    Description : lit les noms des fichiers d'un dossier et les renvoie dans un array     **/
	/**                                                   		                                 **/
	/**********************************************************************************************/
	/**    Paramètres : [string] nom du repertoir à lire                                         **/
	/**********************************************************************************************/
	/**    Valeurs retournées : [array] avec les noms des fichiers                               **/
	/**********************************************************************************************/
	/**    Auteur : Marc L. Harnist                                                             **/
	/**********************************************************************************************/
	/**    Version : 1.0                                                                        **/
	/**********************************************************************************************/
	/**    Créée le : 25/03/2018                                                                **/
	/**********************************************************************************************/
	/**    Modifiée le : 25/03/2018                                                             **/	/**********************************************************************************************/
	public static function image_explorer($dir){
		
		$count = $count_img = 1;
		$fichiers_img = "";
		$list = [];
		$dir = "./img/catalogue/";
		$directory = $dir;
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
					
					if( $file != '.' && $file != '..') 
					{
						$extension = pathinfo($file, PATHINFO_EXTENSION);
						if($extension == 'jpg')
						{
						$url = $file;

						$name = $file; // for array $list
						$extension = "." . $extension; // erase dot (point)
						$name_without_extension = str_replace($extension, "", $name); // for array $list

						$list[] = $name_without_extension;
						}
				    }
				}
			   // on ferme la connection
			   closedir($dh);
			   return $list;
		   }
		}
	} // close function 
}// close the class