<?php
// On retourne sur la première page pour voir le résultat !
$url = $_SERVER['HTTP_REFERER'];
header ("location:$url");
?>