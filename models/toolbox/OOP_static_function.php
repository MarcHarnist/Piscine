<?php

class Voiture {

	// Public $marque;
	
	function showMarque(){
		echo "marque :" . $this->marque;
	}
	
	static function merci(){
		echo "Merci pour votre passage chez nous!";
	}
}
?>
<p>Suite</p>
<?php
$v = new Voiture();
$v->marque = "Hyundai";
$v->showMarque();
?>
<p>Suite</p>
<?php
$v = new Voiture();
$v->marque = "BMW";
$v->showMarque();
?>
<p>Suite</p>
<?php

Voiture::merci();// access to a static function: name of the objet + :: + function_name

?>
<p>Suite</p>