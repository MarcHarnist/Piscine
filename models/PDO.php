<h3>Afficher le contenu de la table "Utilisateur"</h3>


<?php

	// Par défaut PDO renvoie un tableau
	// FETCH_ASSOC renvoie un tableau associatif
	foreach($db->query("SELECT * FROM utilisateur", PDO::FETCH_ASSOC) as $row){
		var_dump($row);
	}

	$reqInsert ="INSERT INTO utilisateur (nom, prenom, age) VALUES (
	:nom, :prenom, :age)";
	
	$stmt = $db->prepare($reqInsert);
	
	$stmt->bindParam(":nom", $nom);
	$stmt->bindParam(":prenom", $prenom);
	$stmt->bindParam(":age", $age);
	
	$nom = "Toto";
	$prenom  = "Tata";
	$age = 58;
	
	$stmt->execute();
	
	$nom = "Titi";
	$prenom  = "Nouille";
	$age = 5;
	
	$stmt->execute();
	
	
?>
<h3>Deuxième lecture après modification</h3>	

<?php
	// Par défaut PDO renvoie un tableau
	// FETCH_ASSOC renvoie un tableau associatif
	foreach($db->query("SELECT * FROM utilisateur", PDO::FETCH_ASSOC) as $row){
		var_dump($row);
	}
?>

<h3>Afficher les données de deux tables avec SELECT</h3>	

<?php
	// Par défaut PDO renvoie un tableau
	$reqSelect = "SELECT * FROM utilisateur, annonce WHERE utilisateur.id = id_utilisateur";
		
		$stmt = $db->prepare($reqSelect);
		$stmt->execute();
		$resultat = $stmt->fetchAll();

		var_dump($resultat);
		?>
		
		
<h3>Afficher les données de deux tables avec SELECT</h3>	

<?php
	// Par défaut PDO renvoie un tableau
	$reqSelect = "SELECT * FROM utilisateur, annonce WHERE utilisateur.id = id_utilisateur";
		
		$stmt = $db->prepare($reqSelect);
		$stmt->execute();
		$resultat = $stmt->fetchAll();

		var_dump($resultat);
		?>
		
<h3>Mettre à jour les données de la table utilisateur</h3>	

<?php
	// Par défaut PDO renvoie un tableau
	$reqUpdate = "UPDATE utilisateur SET age = :age WHERE Id = :id";
		
		$stmt = $db->prepare($reqUpdate);
		$stmt->execute(array(":age" => 20, ":id" => 1));

		?>
		<pre>
			// Par défaut PDO renvoie un tableau
		$reqUpdate = "UPDATE utilisateur SET age = :age WHERE Id = :id";
		
		$stmt = $db->prepare($reqUpdate);
		$stmt->execute(array(":age" => 20, ":id" => 1));
		</pre>

<h3>Afficher les données de la table utilisateur avec SELECT</h3>	

<?php
	// Par défaut PDO renvoie un tableau
	$reqSelect = "SELECT * FROM utilisateur";
		
		$stmt = $db->prepare($reqSelect);
		$stmt->execute();
		$resultat = $stmt->fetchAll();

		print_r($resultat);
		?>
		
		
