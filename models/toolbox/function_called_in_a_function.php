<?php
	/****************************/
	/*** Function example *******/
	/** Formation chez Sylvan ***/
	/****************************/

	
		// Function AfficherNomAgeDeux use the calculAgeDeux function from line 15
		function AfficherNomAgeDeux($nom = "Nom par défaut", $anneNaissance = 20){ // ()obligatory but can be empty
			// $nom = ... is the default value if no argument afficherNomAge
			$retour = $nom . " a " . calculAgeDeux($anneNaissance) . " ans.";
			return $retour;
		}

		function calculAgeDeux($anneNaissance){
			
			return (date("Y", time()) - $anneNaissance);
			// or:  return 2018 - $anneeNaissance; ...
		}
		
		
				

		function AfficherNomAgeTrois($nom = "Nom par défaut", $anneNaissance = 20){ // ()obligatory but can be empty
			// $nom = ... is the default value if no argument afficherNomAge
			
			$age =  calculAgeTrois($anneNaissance);
			$retour = $nom . " a " . $age . " ans ";
			
			if($age < 18) {
				$retour .= " (mineur).";
			}
			else {
				$retour .= " (majeur).";
			}
			
			return $retour;
		}

		function calculAgeTrois($anneNaissance){
			
			return (date("Y", time()) - $anneNaissance);
			// or:  return 2018 - $anneeNaissance; ...
		}
		
		

