<?php
  // Définition du fichier dont il faut récupérer l'extension
  $monArchive = '/usr/var/www/mondomaine/path/to/monArchiveDePhotos.sql';
  // Affichage de l'extension du fichier
  echo pathinfo($monArchive, PATHINFO_EXTENSION);
?>
