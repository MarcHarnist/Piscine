
<h3>Petite erreur dans la date?</h3>

<?php

	if($new_post->error_date == 'empty'){
		?>
		<p>Une date doit être renseignée.</p>
		<?php
	}

	if($new_post->error_date == 'format'){
		?>
		<p>Votre date n'est pas au bon format. Merci de renseigner la date au format jj/mm/aaaa.</p>
		<?php
	}
?>

<p><a href="#" onclick="history.go(-1);">J'y retourne en un clic !</a></p>
