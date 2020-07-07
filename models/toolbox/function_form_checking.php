<?php
	/****************************/
	/*** Function example *******/
	/** Formation chez Sylvan ***/
	/****************************/
	
		function checkIdentity   ($nom      = "Doe  (valeur par defaut)",
						          $prenom   = "John (valeur par defaut)",
								  $password = "xxxx (valeur par defaut"){

			/** Vars used in this function **/
			$bonNom        = "Harnist";
			$bonPrenom     = "Marc";
			$bonPassword   = "Hello";
			
			
			
			// faire un array $correct[ harnist, marc, hello]
			// puis une boucle for avec $key = 0, $key<=3, $key++ et on controle tout....
			
			
			
			
			
			
			/** Initialisation des variables **/
			$nom = htmlspecialchars($nom);
			$prenom = htmlspecialchars($prenom);
			$password = htmlspecialchars($password);
			
			if(strtolower($nom) !== strtolower($bonNom)){
				return $controle = [false, 'message' => 'nom']; 
				// Ici return stop le code et renvoie $controle[0] false s'il y a une erreur dans le nom;
			}
			
			elseif(strtolower($prenom) !== strtolower($bonPrenom)){
				return $controle = [false, 'message' => 'prénom'];
				// Ici return stop le code et renvoie $controle[0] false s'il y a une erreur dans le prénom;
			}

			elseif($password !== $bonPassword){
				return $controle = [false, 'message' => 'mot de passe'];
				// Ici return stop le code et renvoie $controle[0] false s'il y a une erreur dans le mot de passe;
			}
			else {
				// Tout est juste, on renvoie $controle['message'] avec le prénom et le nom pour souhaiter la bienvenue au membre connecté.
				return $controle = [true, 'message' => "$prenom $nom"];
			}
		}
		
		
		function lowerCase ($var="") {
			$var = strtolower($var);
			return $var;
		}
		
		function br () {
			echo "<br>";
		}
		
		function hr () {
			echo "<hr>";
		}
		
		function AfficherNomAge($nom = "Nom par défaut", $age = 20){ // ()obligatory but can be empty
			// $nom = ... is the default value if no argument afficherNomAge
			echo '<h3>Début "for"</h3>';
			for ($valeur = 0; $valeur <= 20; $valeur++) { 
				echo "$nom a " . ($age + $valeur) . " ans.<br>";
			}
			echo '<h3>Fin du "for"</h3>';
		}

		function calculAge($anneNaissance = 1920){
			$age = 0;
			$anneeEnCours = 2018;
			
			$age = $anneeEnCours - $anneNaissance;
			
			return $age;
			
			// or:  return 2018 - $anneeNaissance; ...
		}
		
		
		
		

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
		
