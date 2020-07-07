<?php
if (!$erreur) {
	?>
	<section>
		<h1>Merci !</h1>
		<p class = "messageGreen p_pinkButton">
			Votre message a bien été envoyé, je vous répondrai dans les meilleurs délais.
		</p>
		<p class ="p_pinkButton">
			<a class = "BigPinkButton" href = "<?= $website->page_url . 'accueil';?>">
			Retourner à l'accueil
			</a>	
		</p>
	</section>	
	<?php
}
else {
	?>
	<section>
		<h1>Message</h1>
		<h2>Petite erreur :</h2>
		<?php
		if(($messager->Red()) != ""){
			?>	
			<p class = "messageRed p_pinkButton">
			<?php echo $messager->Red();?>
			<br />
			Mes données ne sont pas perdues:<br />
			<a href="#" onclick="history.go(-1);">J'y retourne en un clic !</a>
			</p>
			<?php
		}
		if(($messager->Green()) != ""){
			?>
			<p class = "messageGreen">
				<?php echo $messager->Green();?>
			</p>
			<?php
		}
		?>
	</section>
	<?php
}