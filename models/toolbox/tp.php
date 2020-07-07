<!--
	Php code by Marc L. Harnist updated 02/19/2018 to ...
	Written in english because shorter, faster, without accents, and for my GitHub community
	https://github.com/MarcHarnist/ludacm/releases/  	
	
             HELLO! WELCOME TO MY CODE
    |||||||  HAVE FUN
	|||||||      __
    | 0 0 |     |  |
    |  _  |     \  /
     \___/      / /
     _| |______/ /
   /        ____/
  /  IN GOD | 
 /     WE   | 
/ /| TRUST  | 
									<i>Fail Fast and Cheap!</i>
/  |________| -->
<section>
	<h2 class="text-info">Sommaire des exercices en PHP</h2>
	<ol>
		<?php 
		$index = "";
		$repertoires = "";
		$fichiers = "";
		$dir = "./view/exercices-php/";
		//  si le dossier pointe existe
		if (is_dir($dir)) {
		
		   // si il contient quelque chose
		   if ($dh = opendir($dir)) {
		
			   // boucler tant que quelque chose est trouve
			   while (($file = readdir($dh)) !== false) {
		
				   // affiche le nom et le type si ce n'est pas un element du systeme
				   $type = filetype($dir.$file);
				   if( $file != '.' && $file != '..') {
					   if($type == 'dir'){
						   $texte = "<li><a href=\"./$dir$file\">$file</a></li>";
						   $repertoires .= $texte;
					   }elseif($file == "index.php" or $file == "index.html"){
						 $texte = "<li><a href=\"./$dir$file\">$file</a></li>";
						 $index .= $texte;
					   }else{
						 $texte = "<li><a href=\"./$dir$file\">$file</a></li>";
						 $fichiers .= $texte;
					   }
				   }
			   }
			   // on ferme la connection
			   closedir($dh);
		   }
		}
		?>
		
	</ol>
	<h3 class="text-info">Index</h3>
		<ol><?=$index;?></ol>
	
	<h3 class="text-info">Repertoires</h3>
		<ol><?=$repertoires;?></ol>
	<h3 class="text-info">Fichiers</h3>
		<ol><?=$fichiers;?></ol>
	
	
</section>
