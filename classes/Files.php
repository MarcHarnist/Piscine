<?php
/**					            Classe Files.php
*                                Marc L. Harnist
*	                               06/04/2018
*
*     Class Files child of Methods child of Websiste
*	  Updated: 06/04/2018, 29/08/2018
*	  Controlers using this: __files-edition, __files-save
*	  Functions inside:
*       construct().............line 22
*       file_reader()...........line 28
*       file_update()...........line 40
*	    copy()..................line 56
*	    supprimer_le_fichier()..line 70
*       destruction()...........line 86
*/

class Files extends Methods {

	public $title;
	public $text;

/** construct().................line 22
*	Description : construit l'objet ici avec les attributs
*   et les méthodes de la classe mère "Methods" (Tools)
*/	public function __construct(){
		parent::__construct();
	}
/** file_reader()...............line 28
*   2. Read file (R from CRUD)
*	Description : lit un fichier et retourne son contenu
*	Paramètres: chemin du fichier $file_path
*	Valeurs retournées : contenu du fichier ou bool false
*	Version : 1.0 Créée le: 29/07/18 MAJ: 29/08/18
*/  function file_reader($file_path = ""){
		if(file_exists($file_path)) // Verify if file or path is correct
			return file($file_path); // Put file content in an array()
		else
			return False; // return an error message: the file is lost
	}
/** file_update()...............line 40
*   3. Update files (U. from CRUD)
*	Description : update a file with sent content (text)
*	Paramètres: file path and new content
*	Valeurs retournées : rien
*	Version : 1.0 Créée le: 29/07/2018 MAJ: 29/07/2018
*/  function file_update($post){
		$this->title = $post['title'];
		$this->text  = $post['text'];

		// First save a copy!
		$this->copy($this->title);

		// Paste the content in the file
		file_put_contents($this->title, $this->text);
	}
/**	copy()......................line 56
*	Description : creates a backup copy
*	Paramètres: $title: file name
*	Valeurs retournées : message d'erreur si bug
*	Version : 1.0 créée le: 29/07/2018 MAJ: 29/07/2018
*/	function copy($title){
		// Create a name for the copy
		$extension = "." . pathinfo($title, PATHINFO_EXTENSION); // Récupération de l'extension
		$title_without_extension = str_replace($extension, '', $title);
		$newfile = $title_without_extension . '-copie-du-' . date('d-m-Y') . $extension;
		// or date('d-m-Y-h-m-s') ...;
		if (!copy($title, $newfile))
			echo "La copie $file du fichier a échoué...\n";
	}
/**	supprimer_le_fichier()......line 70
*   4. Delete file: D from CRUD
*	Description : creates a backup copy
*	Paramètres: $title: $file_path
*	Valeurs retournées : booléen
*	Version : 1.0 créée le: 29/07/2018 MAJ: 29/07/2018
*/  function supprimer_le_fichier($file_path = ""){
		if(file_exists($file_path)){
			if(stristr($file_path, 'copie')){
				unlink($file_path);
				return True;
			}
		} else
			return False;
	}
/**	destruction()..............line 86
*   4. Delete file: D from CRUD
*	Description : détruit un fichier sans faire de copie
*	Paramètres: $get = $_GET avec operation, file realpath
*	Valeurs retournées : booléen
*	Version : 1.0 créée le: 29/07/2018 MAJ: 29/07/18, 30/08/18
*/ 	public function destruction($get){
		if(isset($get['operation']) && $get['operation'] == "delete" && isset($get['fichier']) && is_file($get['fichier'])){
			unlink($get['fichier']);// unlink détruit le fichier - unlink erase the file
			return True;
		}
	}

} // Close des class