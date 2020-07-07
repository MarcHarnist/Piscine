<?php
/**  PAGE DE CORRECTIONS
*    Tous les tests des vues sont renvoyés ici avec les $_POSTS
*    02/02/2019 by Isabelle and Marc Harnist.
*
*
*
*
*   TEST UN: nombre d'enfants
*   On vient ici depuis la vue combien-d-enfants.php (premier passage)
*   2 choix pour valider:
*   si choix des – 6 ans: le nombre doit etre égal ou inférieur à 5 enfants, 
*   si choix des + 6 ans: le nombre doit etre égal ou inférieur à 8 enfants
*   si mauvais choix: recommencer l'aventure    */
	$test = 1;
	$age = 0;
	$nombreDenfants = " nombre d'enfants inconnu.";
	$reponse = true;
	if(isset($_POST['nombreDenfants']) && $_POST['nombreDenfants'] !== "" && isset($_POST['age']) && $_POST['age'] !== ""){
		$age = $_POST['age'];
		$nombreDenfants = intval($_POST['nombreDenfants']);

		//Cas 1 : on a choisi plus de cinq enfants de moins de six ans: c'est trop (faux = false)
		//Cas 2 : on a choisi plus de huit enfants de plus de six ans: c'est trop (faux = false)
		$reponse = ($age < 6 && $nombreDenfants > 5 || $age == 6 && $nombreDenfants > 8)?false:true;

		if($reponse === false){
			$correction = [
						'erreur'  => true,
						'correction' => 'nombreDenfants',
						'test suivant' => 'voir-la-directrice',
						'age'     => $age,
						'nombreDenfants' => $nombreDenfants,
						'message' => "Tu as choisi ". $nombreDenfants . " enfants de " . $age . " ans. Tu as choisi trop d'enfants de cet âge pour une sortie piscine. Revois la réglementation afin de proposer une activité en toute sécurité.",
						'image'   => "loupe.jpg"
			];
		} else {
			$correction = [
						'erreur'  => false,
						'correction' => 'nombreDenfants',
						'test suivant' => 'voir-la-directrice',
						'age'     => $age,
						'nombreDenfants' => $nombreDenfants,
						'message' => "Tu as choisi ". $nombreDenfants . " enfants de " . $age . " ans. Voilà, ton groupe est formé.<br>
						La piscine est prévenue de votre arrivée..",
						'image'   => ""
						];
		}
	}
	/** TEST DEUX: Voir la directrice
	*   partir à la piscine (faux) ou voir la directrice (juste)
	*   On vient ici depuis la page correction après la page combien-d-enfants
	*   Methode get
	**/ 
	if(isset($_GET['reponse-voir-la-directrice'])){
		$reponse = (isset($_GET['reponse-voir-la-directrice']) && $_GET['reponse-voir-la-directrice'] === "depart-piscine")?false:true;
		if($reponse === false){
			$correction = [
						'erreur'  => true,
						'correction' => 'voir-la-directrice',
						'test suivant' => 'aller-dans-la-regie',
						'message' => "Tu es parti(e) sans aucun matériel...<br>Ce n'est pas très prudent!<br>La directrice est obligée de venir pour éviter la cata...",
						'image'   => "surprise.jpg"
			];
		} else {
			$correction = [
						'erreur'  => false,
						'correction' => 'voir-la-directrice',
						'test suivant' => 'aller-dans-la-regie',
						'message' => "La directrice te donne la liste des enfants, précisant nageurs ou non nageurs, et leur fiche sanitaire.",
						'image'   => ""
						];
		}
	}
	/** TEST TROIS: aller-dans-la-regie
	*   partir à la piscine (faux) ou réunir les enfants (juste)
	*   On vient ici depuis la page correction
	*   index.php?page=correction&reponse-directrice-vue=reunion-des-enfants&test=trois
	*   Methode get
	*   Si l'utilisateur arrive ici avec reponse-directrice-vue = depart-piscine c'est une erreur
	*   Il aurait du réunir les enfants
	**/ 
	if(isset($_GET['reponse-aller-dans-la-regie'])){
		$reponse = (isset($_GET['reponse-aller-dans-la-regie']) && $_GET['reponse-aller-dans-la-regie'] === "depart-piscine")?false:true; 
		if($reponse === false){
			$correction = [
						'erreur'  => true,
						'correction' => 'aller-dans-la-regie',
						'test suivant' => 'reunir-les-enfants',
						'message' => "Héla, n'aurais-tu pas oublié le goûter?<br>
						La baignade ça creuse... Et côté pharma, c'est l'impro?",
						'image'   => "distrait.jpg"
			];
		} else {
			$correction = [
						'erreur'  => false,
						'correction' => 'aller-dans-la-regie',
						'test suivant' => 'reunir-les-enfants',
						'message' => "Ton matériel est prêt. Les enfants arrivent...",
						'image'   => ""
						];
		}
	}
	/** TEST QUATRE:  reunir-les-enfants
    *	partir à la piscine (faux) ou  (juste)
	*   On vient ici depuis la page correction
	*   index.php?page=correction&reponse-directrice-vue=reunion-des-enfants&test=trois
	*   Methode get
	*   Si l'utilisateur arrive ici avec reponse-directrice-vue = depart-piscine c'est une erreur
	*   Il aurait du réunir les enfants
	**/ 
	if(isset($_GET['reponse-reunir-les-enfants'])){
		$reponse = (isset($_GET['reponse-reunir-les-enfants']) && $_GET['reponse-reunir-les-enfants'] === "depart-piscine")?false:true; 
		if($reponse === false){
			$correction = [
						'erreur'  => true,
						'correction' => 'reunir-les-enfants',
						'test suivant' => 'courrir-a-la-regie',
						'message' => "Es-tu sûr(e) de n'avoir rien oublié?<br>Tu es parti(e) si vite... Tout le monde a ses affaire?",
						'image'   => "dommage.jpg"
			];
		} else {
			$correction = [
						'erreur'  => false,
						'correction' => 'reunir-les-enfants',
						'test suivant' => 'courrir-a-la-regie',
						'message' => "Tu présentes l'activité et vérifie les sacs des enfants.<br>Justin n'a pas de maillot de bain.",
						'image'   => ""
						];
		}
	}



// CODE A COPIER

	/** TEST CINQ : courrir-a-la-regie
	*   partir à la piscine (faux) ou  (juste)
	*   On vient ici depuis la page correction
	*   Methode get
	*   Si l'utilisateur arrive ici avec "depart-piscine" dans $_GET c'est une erreur
	*   Il aurait du réunir les enfants
	**/ 
	if(isset($_GET['reponse-courrir-a-la-regie'])){
		$reponse = (isset($_GET['reponse-courrir-a-la-regie']) && $_GET['reponse-courrir-a-la-regie'] === "laisser-julien")?false:true; 
		if($reponse === false){
			$correction = [
						'erreur'  => true,
						'correction' => 'courrir-a-la-regie',
						'test suivant' => 'vous-partez-a-la-piscine',
						'test' => '',
						'message' => "Tu es partie(e) tellement vite... Il y avait des maillots en régie. Prends le temps de l'explorer la prochaine fois.",
						'image'   => "decue.jpg"
			];
		} else {
			$correction = [
						'erreur'  => false,
						'correction' => 'courrir-a-la-regie',
						'test suivant' => 'vous-partez-a-la-piscine',
						'message' => "Heureusement, ta directrice est prévoyante. Il y a quelques maillots en réserve pour les oublis (les parents sont parfois débordés!). Tout est prêt...",
						'image'   => ""
						];
		}
	}


	/** TEST SIX : vous-partez-a-la-piscine
	*   partir à la piscine = juste! Aller à la régie: faux
	*   On vient ici depuis la page correction
	*   Methode get
	*   Si l'utilisateur arrive ici avec "depart-piscine" dans $_GET c'est une erreur
	*   Il aurait du réunir les enfants
	**/ 
	if(isset($_GET['reponse-vous-partez-a-la-piscine'])){
		$reponse = (isset($_GET['reponse-vous-partez-a-la-piscine']) && $_GET['reponse-vous-partez-a-la-piscine'] === "depart-piscine")?true:false; 
		if($reponse === false){
			$correction = [
						'erreur'  => true,
						'correction' => 'vous-partez-a-la-piscine',
						'test suivant' => 'vous-partez-a-la-piscine',
						'test' => '',
						'message' => "Ben dis-donc, il y a du bruit par ici! Vous êtes tous seuls les enfants? Tu as oublié l'essentiel: le groupe est sous ta responsabilité! Es-tu vraiment prêt(e) à aller à la piscine?",
						'image'   => "pas-pret.jpg"
			];
		} else {
			$correction = [
						'erreur'  => false,
						'correction' => 'vous-partez-a-la-piscine',
						'test suivant' => 'vous-partez-a-la-piscine',
						'message' => "Génial! On part à la piscine!<br><br>Bravo, tu as préparé ton activité en veillant à la réglementation, à la sécurité et avec ton groupe au complet!",
						'image'   => "genial.jpg"
						];
		}
	}

