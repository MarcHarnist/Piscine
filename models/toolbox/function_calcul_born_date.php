<?php
	/****************************/
	/*** Function example *******/
	/** Formation chez Sylvan ***/
	/****************************/
		
		function AfficherNomAgeQuatre($nom = "Nom par défaut", $anneNaissance = 20){ // ()obligatory but can be empty
			// $nom = ... is the default value if no argument afficherNomAge
			
			if (($nom == "") || ($anneNaissance == 0)){
				return "ERREUR DE PARAMETRES";
			}
			
			$age =  calculAgeQuatre($anneNaissance);
			$retour = $nom . " a " . $age . " ans ";
			
			if($age < 18) {
				$retour .= " (mineur).";
			}
			else {
				$retour .= " (majeur).";
			}
			
			return $retour;
		}

		function calculAgeQuatre($anneNaissance){
			
			return (date("Y", time()) - $anneNaissance);
			// or:  return 2018 - $anneeNaissance; ...
		}
		