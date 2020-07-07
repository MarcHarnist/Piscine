<?php
/**  	CLASS: Panorama
*
*     Panorama extends Database (connexion) extends Methods extends Website (config)
*
*	  AUTHOR: Marc L. Harnist
*	  CREATION: 15/08/2018
*	  UPDATED: 15/08/2018
*	  FILE USING THIS CLASS: controllers/__budget-rapport
*	  FUNCTION INSIDE:
*/    class PanoramaCde extends Database {
	
		// ATTRIBUTS
		public $id; // (id)
		public $date;
		public $liquidite;
		public $avenir;
		public $epargne;
		public $previsionnel;
		public $solde;


		
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
				$this->panorama_last_entry();
				$this->calcule();
				}
		
		/**	 Methode calcule()
		*	 Description : calcul les totaux, modifie l'objet
		*	 Paramètres: aucun
		*	 Valeurs retournées : aucune
		*	 Auteur : Marc L. Harnist
		*	 Version : 1.0
		*	 Créée le : 15/08/2018
		*	 Modifiée le : 15/08/2018
		*/
			public function calcule(){
				$this->previsionnel = $this->avenir + $this->liquidite;
				$this->solde = $this->previsionnel + $this->epargne;
				}
		
		/**	 Methode panorama_last_entry()
		*	 Description : lit la dernière entrée dans le tableau "budget_panorama" de la db
		*    Utilise la methode last_entry de la classe DatabaseRead
		*	 Paramètres: aucun
		*	 Valeurs retournées : aucune
		*	 Auteur : Marc L. Harnist
		*	 Version : 1.0
		*	 Créée le : 15/08/2018
		*	 Modifiée le : 15/08/2018
		*/
			public function panorama_last_entry(){

				//Récupération des données du tableau "budget_panorama"
				$budget_panorama = new Database;
				$derniere_ligne = $budget_panorama->last_entry("budget_cde_panorama");

				// On hydrate l'objet avec ces données
				$this->hydrate($derniere_ligne);
				}
		
				/** Methode hydrate()
				*   Transformer les données de la db en attributs d'obget
				*/
				public function hydrate(array $array){
					foreach($array as $key => $value){
						
						/** pour chaque clé de l'array,
						on crée un nom de mutateur (en: setter)    */
						$method = "set" . ucfirst($key);
						
						// Si cette méthode existe dans cette classe
						if(method_exists($this, $method))
							/* On déclenche le mutateur 
							qui modifier l'attribut de l'objet. */
							$this->$method($value);
					}
				return $this;
				}

				public function setId($value){
						$this->id = $value;
						
				} 
				
				public function setDate($value){
						$this->date = $value;
				} 
				public function setLiquidite($value){
					$this->liquidite = $value;
				}
				 
				public function setEpargne($value){
					$this->epargne = $value;
				}
				 
				public function setAvenir($value){
					$this->avenir = $value;
				}

} // Close des class
