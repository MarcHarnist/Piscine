<section>
	<header class="row bg-light p-3	">
		<h2 class="row ml-0 text-muted">Sauvegarde de la base de donnée</h2> 
	</header>

	<?php
	if ($saving == True) {
			?>	
		
			<p class="text-success">La base de donnée a été sauvegardée</p>

			<p>Cliquez sur le lien ci-dessous pour télécharger le fichier de sauvegarde sur votre ordinateur et conservez-le précieusement afin de pouvoir restaurer votre base de donnée plus tard en cas de soucis...</p>
			
			<p><a href="backups/sql/<?=$sql->savedFile;?>"><?= $sql->savedFile;?></a></p>
			
			<p>Ouvrir le répertoire <a href="<?= $website->page_url;?>__sql-repertoire" alt="Cliquez ici pour ouvrir dir sql">backups/Sql</a></p>
			
			<p><a href="<?= $website->page_url;?>__sql-index" alt="Index de Sql">Retourner à Sql-Index</a>

			
			<?php
	}
	else {
			?>
				
			<p>Le fichier n'a pas pu être créé à cause d'un problème inconnu.<br>
			   Veuillez en informer le webmaster. Merci</p>	
			   
		<?php	
	}
	?>
</section>
