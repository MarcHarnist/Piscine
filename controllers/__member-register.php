<?php
/**   Contrôleur __member_register
*         Marc L. Harnist
*             2018
*
*  This page reserved for level 1 & 2 users
*/ $website->membersPermissions(2, $member);
if (isset($_POST['creer']) && isset($_POST['name']) && isset($_POST['pw']) && isset($_POST['level'])) {
	$message           = new Message;//My first class self made ! 08/2017 MarcL.Harnist
	$members_list      = new Database;//Connect to database and to class Methods
    $members_list->html_inside($_POST);//Bloque tout si html code inside
	$liste_des_membres = $members_list->read_table('light_members');
	$manager           = new MembersManager(); // New object with data base informations
    
    // Create OOP objects
    $new_member = new Member(['name' => $_POST['name']]); // On crée un nouveau membre.
    $new_member->setPassword($_POST['pw']);
    if (!$new_member->nameValide()) {
        // cannot be empty
        $message->setRed("La case pseudo est vide: choisissez un pseudo.");
        unset($new_member);
    }
    elseif ($manager->exists($new_member->name())) {
        // go read in the dbtable if name is free
        $message->setRed("Le nom du membre est déjà pris. Merci de choisir un autre nom.");
        unset($new_member);
    }
    elseif(!$new_member->passwordValide()) {
    // cannot be empty
        $message->setRed("Vous avez oublié de choisir un mot de passe.");
        unset($new_member);
    }
    else { 
        // Everythings are ok.The member can be registered
        $hash = hash('ripemd160',$_POST['pw']);// the password is crypted for security!
        $new_member->setPassword($hash);// hashed password registered in data base member
        $new_member->setLevel($_POST['level']);
        $manager->add($new_member); // The name is free: create a new member in data base
    }
}