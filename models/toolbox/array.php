<?php
$age = 18;
$array =  ["Hello", 
           "nom" => ["masc" => "Marc", "fem" => "Isabelle"],
           "question" => [
		                   "simple" => ["how are you?", "Do you love me?"],
		                   "compliquée" => ["Quel âge as-tu?", "As-tu $age ans?"],
						 ]
		   
		   ];
var_dump ($array);
echo "1 ",($array["nom"]["fem"]),"<br />";
echo "2 ",$array["question"]["compliquée"][1],"<br />";
echo "3 ",print_r($array),"<br />";
echo "4 ",print_r($array["nom"]),"<br />";
//print_r($array[0]);

foreach($array as $array){
	echo $array," ";
}
