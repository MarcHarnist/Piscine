<?php
include ('../model/config/config.php');
	function chargerclass($classname){
		require '../class/' . $classname . '.php';
	}	
	spl_autoload_register('chargerclass');//transform objet by including class/files
?>
<p>Code: avec l'aide de la classe html</p>
<p>Class Html:<br />
< ? php<br />
<br />
//Apprentissage OOP Marc Harnist 18 sept 2017<br />
	//classe sans objet<br />
	class Html {<br />
		// public static $publicVar;<br />
		public static function lien($name,$link){<br />
		echo '< a href="' . $link . '">' . $name  . '</ a>';// Sans objet pas de $this-><br />
		}<br />
		public static function lienli($name,$link){<br />
		echo '<li>< a href="' . $link . '">' . $name  . '</a></li>';// Sans objet pas de $this-><br />
		}<br />
	}<br />
	<br />
  html::lienli('Démo: petite calculatrice', PAGE_URL . 'calculatrice');<br />
  html::lienli('Album photo en php avec boucle pour affichage automatique', PAGE_URL . 'album_photo');<br />
  html::lienli("Blog premier MVC, TP de Open Class Room", PAGE_URL . 'blog');<br />
  html::lienli("Premiers essais en POO", PAGE_URL . 'oop');<br />
  ?><br />
  </p>	
<ul>
  <li>Ce site web a été créé en HTML, CSS et PHP sur une architecture MVC.</li>
  <?php
  html::lienli('Démo: petite calculatrice', PAGE_URL . 'calculatrice');
  html::lienli('Album photo en php avec boucle pour affichage automatique', PAGE_URL . 'album_photo');
  html::lienli("Blog premier MVC, TP de Open Class Room", PAGE_URL . 'blog');
  html::lienli("Premiers essais en POO", PAGE_URL . 'oop');
  ?>
</ul>
