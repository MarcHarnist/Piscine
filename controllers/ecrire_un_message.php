<?php
/**                    Contrôleur ecrire_un_message.php

  Auteur: Marc L. Harnist
  Date:   24/07/2018
  Path:   root/index.php 
  Plan:   Models / View / Controllers
  Particularité: écrire un message dans un contrôleur en 
	utilisant la classe Website et des méthodes statiques.
*/

echo $website::message("Vous pouvez écrire un message dans les contrôleurs!", "	<h5>Principe:</h5>	<p><i>Note: le titre \"Principe\" avec balises \"h\" possible car le message est dans un < div> (réglage depuis la classe Website)</i></p>	<p>Code à coller dans un contrôleur: <code>echo \$website::message(\"Titre\", \"Votre message\", \"couleur de fond\");	</code></p>	<h4>Exemple: </h4>	<p><code>echo \$website::message(\"Travaux actuels sur user.php\", \"Déplacer 	\"models/user.php\" dans \$website::session_checker ?<br>	Démarrer la fonction static \"session_checker\" dans le constructeur	de la classe \"Website\"?<br>	<i><small>Modifier ce message dans le fichier \" . __FILE__ .  \", ligne \" . __LINE__ . \".</small></i>\", \"lightgreen\");</code></p>	<p>Ceci a été créé le 6 VIII 2018.</p>
	<p><i><small>Modifier ce message dans le fichier " . __FILE__ .  ", ligne " . __LINE__ . ".</small></i></p>", "pink");
