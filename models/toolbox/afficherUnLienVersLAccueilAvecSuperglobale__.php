
	<?php
    $code='
	echo "
    <ul>
      <li><a href=\"http://$_SERVER[SERVER_NAME]\">Accueil</a></li>
    </ul>
	";
	';
?>
    <h4>Pour afficher un lien automatique vers l'accueil, on utilise la superglobale: $_SERVER[SERVER_NAME]. Voici le code php: </h4>
	<pre>
	<?php echo '<pre>' . htmlspecialchars($code) . '</pre>';?>
	</pre>
	<h4>Ce qui affichera dans la page du web:</h4>
	
	<?php
    echo "
	<ul>
      <li><a href=\"http://$_SERVER[SERVER_NAME]\">Accueil</a></li>
    </ul>
	";
?>