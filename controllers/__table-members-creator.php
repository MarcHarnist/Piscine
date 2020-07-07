<?php
$config_path = "model/config/config.php";
$sql_path = "model/sql.php";
if(is_file($config_path))
	include_once($config_path);
else
	include_once("../".$config_path);
if(is_file($sql_path))
	include_once($sql_path);
else
	include_once("../".$sql_path);
$sql= "CREATE TABLE `". TABLE_MEMBERS . "` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` smallint(6) NOT NULL
)";
// CREATIONS
	$req = $db->prepare($sql);
	$req->execute();



$sql_2 = "INSERT INTO `". TABLE_MEMBERS . "` (`id`, `name`, `password`, `level`) VALUES
(1, 'Marc', '7eeca9fec73bc2d914667d5829149773ad2670ef', 1)";

// Insertions
	$request = $db->prepare($sql_2);
	$request->execute();
	
header('Location:./index.php');