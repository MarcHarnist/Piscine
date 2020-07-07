<?php

$sql= "CREATE TABLE `light_pages` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_bin NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `category` varchar(255) COLLATE utf8_bin NOT NULL
)";

// CREATIONS
	$req = $db->prepare($sql);
	$req->execute();



$sql_2 = "INSERT INTO `light_pages` (`id`, `date`, `author`, `title`, `text`, `category`) VALUES
(1, '1520895600', 'Marc L. Harnist', 'Mentions légales', 'Photographies du site libres de droit <a href=\"https://pixabay.com/\">Pixabay.com</a>\r\nCode open source.\r\nMarc Laurent Harnist\r\n\r\nCréation à but non commerciale: projet dans le cadre d\'une formation de reconversion professionnelle du 5 janvier au 27 avril 2018.', 'pages'), (2, '1520895600', 'Marc L. Harnist', 'Création', 'La table \"page\" de la base de données a été créée automatiquement depuis le site, en ligne, grâce à PHP!', 'news')";

// Insertions
	$request = $db->prepare($sql_2);
	$request->execute();
	
header('Location:' . PAGE_URL);