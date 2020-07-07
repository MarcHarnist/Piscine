<?php

	/*********************************************************************************************/
	/** PHP OBJECT ORIENTED PROGRAMMING LANGAGE                                                 **/
	/*********************************************************************************************/
	/** CLASS FormManager child of Database which connect to database                           **/
	/** CLASS child: DatabaseCreate (and later Contact form                                     **/
	/*********************************************************************************************/
	/** NAME: FormManager                                                                       **/
	/*********************************************************************************************/
	/** AUTHOR: Marc L. Harnist                                                                 **/
	/*********************************************************************************************/
	/** CREATION: 23/03/2018                                                                    **/
	/*********************************************************************************************/
	/** UPDATED: 23/03/2018                                                                     **/
	/*********************************************************************************************/
	/** FILE USING THIS CLASS:  marcharnist.fr/zoo/controllers/depart.php                       **/
	/**                        	marcharnist.fr/notebook/__page-creation.php &                   **/
	/**                         marcharnist.fr/notebook/__page-edition.php                      **/
	/**                                                                                         **/
	/*********************************************************************************************/
	/** FUNCTION INSIDE: __construct, constructor of the object                                 **/
	/**                                                                                         **/
	/*********************************************************************************************/
	
	class FormManager extends Database {

		public $form = array();
		
		// Constructer
		public function __construct($post){
			parent::__construct(); // connect to database
			$this->form = $this->manager($post); // On envoie les données postées vers la méthode "manager" ci-dessous dès que la classe est instantiée: dès qu'un objet FormManager est créé avec ses attributs et ses méthodes.
		}
		
		// Transfère de la globale dans un array "$form" simple
		public function manager($post){
			
			//Traitement du formulaire dans une boucle!
			foreach($post as $key => $value)
				$form[$key] = $value;
			$this->form = $form;
			return $this->form;
		}
		
		/* Getter function - (Accesseur en français) */
		public function getForm(){
			return $this;
		}
	}