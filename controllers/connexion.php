<?php
/*************************************************** 
*	This file is installed in "controller"	directory
*	Marc Harnist 2017/10/08
*
*****************************************************/
$save_pseudo = "";
$message = new Message;// My first class self made ! 08/2017 MarcL.Harnist

if (isset($_POST['utiliser']) && isset($_POST['name']) && isset($_POST['password'])){
	// Si on a voulu se connecter.
	$read_members = new Database;
	$read_members->html_inside($_POST);//bloque tout s'il y a du code html
	$members = $read_members->read_table('light_members');
	$save_pseudo = $_POST['name'];// To conserve the value in form
	$manager = new MembersManager(); // New object with data base informations
	if(empty($_POST['name'])){
		$message->setRed("Choisissez un pseudo");
var_dump($message);	die();
		unset($member);
	}
	if(empty($_POST['password'])){
		$message->setRed("Vous avez oublié de renseigner le mot de passe.");
		unset($member);
	}
	elseif ($manager->exists($_POST['name'])){	
		// Si le membre existe
		$member = new Member(['name' => $_POST['name']]); // On crée un nouveau membre.
		$hash = hash('ripemd160',$_POST['password']);
		$member = $manager->get($save_pseudo);
		$hash_db = $member->password();
		if($hash_db === $hash) {
			//the password is the right, we continue - If the member had informe
			// THE MEMBER IS WELL CONNECTED	//	
			$member = $manager->get($_POST['name']);
			$name = $member->name();
			$member = $name;
			$_SESSION['member'] = $member;		
		}
		else {
			$erreur_pw = True;
			$message->setRed("Mot de passe érroné...</h3>");
			unset($member);
		}
	}
	else {
		$erreur_nom = True;
		// S'il n'existe pas, on affichera ce message.
		$message->setRed("Erreur dans le nom. <a href=\" " . $website->page_url . "contact\">Contactez-nous.</a>");
	}
}
if(isset($member) && $member != NULL){
	header('Location: ' . $website->page_url . '__admin-index');
}
else{
// Si le membre n'existe pas dans la base de donnée on déconnecte tout
   unset($member); // The member do not exists in database but still in the navigator memory. We empty it.
   unset($_SESSION['member']); // same action to session memory
   session_destroy(); // close de session
}