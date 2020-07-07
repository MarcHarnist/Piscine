<?php
/**  	CLASS: Cheques
*
*   AUTHOR: Marc L. Harnist
*   CREATION: 15/08/2018 (copie de DatabaseReadZoo, tp chez Sylvan)
*   UPDATED: 15/08/2018
*   FILE USING THIS CLASS: controllers/__budget-rapport
*   FUNCTION INSIDE:
*   Cheques extends Database (connexion) extends Methods extends Website (config)
*/  class Cheques extends Database {
	
		// ATTRIBUTS
		public $id; // (id)
		public $date;
		public $total = 0;
		
		/**	 Methode __construct (constructeur)
		*    Nom : construct
		*	 Description : permet d'utiliser les méthodes des classes mères
		*	 Paramètres: aucun
		*	 Valeurs retournées : aucune
		*	 Auteur : Marc L. Harnist
		*	 Version : 1.0
		*	 Créée le : 15/08/2018
		*	 Modifiée le : 15/08/2018
		*/
			public function __construct(){
				parent::__construct(); // Construit l'objet ici avec les attributs de la classe mère
				}
 
		/**	 Methode "cheques"
		*	 Description : retourne le total des cheques à venir
		*	 Paramètres: aucun
		*	 Valeurs retournées : $int avec total des cheques à venir
		*	 Auteur : Marc L. Harnist
		*	 Version : 1.0
		*	 Créée le : 15/08/2018
		*	 Modifiée le : 15/08/2018
		*/
			// Récupération des chèques à encaisser
			public function cheques($table = 'budget_cheques'){
		
			$lire_cheques = new Database;
			$cheques = $lire_cheques->read_table($table);

			foreach($cheques as $donnee){
				// Chaque entrée sera récupérée et placée dans un array.
				$id = $donnee['id'];
				$numero = $donnee['numero'];
				$date = $donnee['date'];
				$acteur = $donnee['acteur'];
				$ordre = $donnee['ordre'];
				$montant = $donnee['montant'];
				$encaissement = $donnee['encaissement'];
					
				//Calculs
				if($encaissement == "non")
					$this->total +=$montant;
			}			
			return $this->total;
	}

} // Close des class
