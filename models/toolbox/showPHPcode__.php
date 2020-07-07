<?php
$code ='<?php

$code = \'
86	function test() {
87	$toto = "Titi";
88	
89	echo \'$toto dans le contexte global: $GLOBALS["toto"]= \' . $GLOBALS["toto"] . "<br />"; // affichera:  Exemple de contenu
90	
91	echo \'$toto dans le contexte courant (inside function): $toto= \' . $toto . "<br />"; // affichera: variable globale
92 } 
93
94 $toto = "Toto";
95 echo \'$toto =\' . $toto . \' à la ligne 12<br />\';
96 echo \'$GLOBALS["toto"] =\' . $GLOBALS["toto"] . \'<br />\';
97 test();\';
echo \'<pre>\' . htmlspecialchars($code) . \'</pre>\';
?>
';

echo '<pre>' . htmlspecialchars($code) . '</pre>';
?>
<p>Affichera: </p>


<?php 


$code = '
86	function test() {
87	$toto = "Titi";
88	
89	echo \'$toto dans le contexte global: $GLOBALS["toto"]= \' . $GLOBALS["toto"] . "<br />"; // affichera:  Exemple de contenu
90	
91	echo \'$toto dans le contexte courant (inside function): $toto= \' . $toto . "<br />"; // affichera: variable globale
92 } 
93
94 $toto = "Toto";
95 echo \'$toto =\' . $toto . \' à la ligne 12<br />\';
96 echo \'$GLOBALS["toto"] =\' . $GLOBALS["toto"] . \'<br />\';
97 test();';
echo '<pre>' . htmlspecialchars($code) . '</pre>';
?>
