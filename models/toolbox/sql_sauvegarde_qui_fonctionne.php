<?php
$level = '';
function chargerclass($classname) {
	// Upload OOP class
	require ROOT . 'class/' . $classname.'.php'; // names of each class
}
spl_autoload_register('chargerclass'); //maintenant les class sont chargées
session_start();

$manager = new MembersManager($db);
if(isset($_SESSION['member'])) {
	// var_dump($_SESSION['member']);
	//In a member is connected
	$member = $_SESSION['member'];
	$member = $manager->get($member);//not forget "get"! else: db do not update
	// $member = new Member($member);
	$level = $member->level();
	$name = $member->name();
	$_SESSION['member'] = $name;
}
if(isset($_SESSION['member']) && $level == 1) { 		// Connect
	$save_pseudo = $name = $level = '';
		
	// Constants from model/config
	$host = DB_HOST;
	$user = DB_USERNAME;
	$pass = DB_PASSWORD;
	$name = DB_NAME;

	$date_string   = date("Y-m-d-");
	$time = time();
	$date_string .= $time;

	// Données de connexion à la base de données
	$MYSQLhost = DB_HOST;
	$MYSQLdb = DB_NAME;
	$MYSQLuid = DB_USERNAME;
	$MYSQLpwd = DB_PASSWORD;
	
	// Données de connexion au serveur FTP
	$ftpServer = 'ftp.votre-serveur.com';
	$ftpUser = 'utilisateur@votre-serveur.com';
	$ftpPwd = 'motdepasse';
	$ftpTarget = 'view/';
	
	// Ensemble des tables éventuelles à exclure complètement
	$excludedTables = array(
	  'tlb_topsecret',
	);
	// Ensemble des tables éventuelles dont on ne veut sauvegarder que la structure
	$onlyStructureTables = array(
	  'tlb_historique',
	);
	// On spécifie le chemin absolu où le script stockera les sorties .gz et .html
	$path = 'view/';
	// On ouvre en création ou en modification le fichier log de la journée
	$file = $path . 'logs/log-' . date('d-m-Y') . '.html';
	if (file_exists($file)) {
	  $newDay = false;
	  $f = fopen($file, 'a+');
	  $log = '';
	} else {
	  $newDay = true;
	  $f = fopen($file, 'w');
	  $log = '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"></head><body>';
	}
	// On démarre la connexion
	try {
	  $log .= '<hr><h3>Tentative de connexion MySQL...</h3>';
	  $conn = new PDO("mysql:host=$MYSQLhost;dbname=$MYSQLdb", $MYSQLuid, $MYSQLpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	  $log .= "Connexion à la BDD MySQL $MYSQLhost \ $MYSQLdb effectuée !<br>";
	  // On liste d’abord l’ensemble des tables
	  $result = $conn->query("SHOW TABLES");
	  $tables = array();
	  // On exclut éventuellement les tables indiquées
	  while ($row = $result->fetch()) {
		if (!in_array($row[0], $excludedTables)) {
		  $tables[] = $row[0];
		}
	  }
	  // La variable $return contiendra le script de sauvegarde.
	  // On englobe le script de backup dans une transaction
	  // et on désactive les contraintes de clés étrangères
	  $return = '--
	-- Hôte : ' . $MYSQLhost . '
	-- Date et heure : ' . date('d/m/Y à H:i:s') . '
	-- Base de données : `' . $MYSQLdb . '`
	--
	SET FOREIGN_KEY_CHECKS=0;
	SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
	SET AUTOCOMMIT=0;
	START TRANSACTION;
	';
	  // On boucle sur l’ensemble des tables à sauvegarder
	  foreach ($tables as $table) {
		// On ajoute une instruction pour supprimer la table si elle existe déjà
		$return .= "DROP TABLE IF EXISTS `$table`;\n";
		// On génère ensuite la structure de la table
		$result = $conn->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
		$return .= $result['Create Table'] . ";\n\n";
		// Si la table n’est pas marquée à sauver en tant que "structure seule"
		if (!in_array($table, $onlyStructureTables)) {
		  $result = $conn->query("SELECT * FROM `$table`");
		  // On boucle sur l’ensemble des enregistrements de la table
		  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$return .= "INSERT INTO `$table` VALUES(";
			// On boucle sur l’ensemble des champs de l’enregistrement
			foreach ($row as $fieldValue) {
			  // On purifie la valeur du champ
			  $fieldValue = addslashes($fieldValue);
			  $fieldValue = preg_replace("/\r\n/", "\\r\\n", $fieldValue);
			  $return .= '"' . $fieldValue . '", ' ;
			}
			// On supprime la virgule à la fin de la requête INSERT
			$return = mb_substr($return, 0, -2) . ");\n";
		  }
		  $return .= "\n";
		}
	  }
	  // On valide la transaction
	  // et on résactive les contraintes de clés étrangères
	  $return .= 'SET FOREIGN_KEY_CHECKS=1;
	COMMIT;';
	  $conn = null;
	  // On enregistre maintenant le script SQL dans un fichier au format gzip
	  $savedFile = 'BKP-' . date('d-m-Y_H-i-s') . '-' . md5(implode(',', $tables)) . '.sql.gz';
	  $gz = gzopen($path . $savedFile, 'w9');
	  gzwrite($gz, $return);
	  gzclose($gz);
	  $log .= "Le fichier $savedFile a été correctement généré<br>";
	  // On envoie maintenant le fichier gzip au serveur FTP indiqué
	  $log .= '<h3>Tentative de connexion FTP...</h3>';
	  // $connection = ftp_connect($ftpServer);
	  // $login = ftp_login($connection, $ftpUser, $ftpPwd);
	  // if ($connection && $login) {
		// $log .= 'La tentative de connexion FTP a réussi !<br>';
		// $upload = ftp_put($connection, $ftpTarget . $savedFile, $path . $savedFile, FTP_BINARY);
		// if ($upload) {
		  // $log .= '<span style="color:#090">Le téléversement par FTP a réussi !</span><br>';
		// } else {
		  // $log .= '<span style="color:#900">Le téléversement par FTP a échoué !</span><br>';
		// }
	  // } else {
		// $log .= 'La tentative de connexion FTP a échoué !<br>';
	  // }
	  // ftp_close($connection);
	} catch(PDOException $e) {
	  $log .= '<h1>Erreur de connexion MySQL : </h1><pre>';
	  $log .= $e->getMEssage();
	  $log .= '</pre>';
	  exit();
	}
	// On écrit le log dans le fichier de logs de la journée
	fwrite($f, $log);
	fclose($f);

	// <h3>Data base saved in www/sql/</h3>

	// echo $server_name;
		// echo "<br />";
		// echo $username;
		// echo "<br />";
		// echo $password;
		// echo "<br />";
		// echo $database_name;
		// echo "<br />";
		// echo 'DB_PASSWORD = ' . DB_PASSWORD;
}else echo '<p>You must be connected</p>';