<article>
	<header class="row bg-light p-3">
		<h2 class="row ml-0 text-muted">Uploader d'images</h2>
	</header>	
		
	<div class="col-sm-12">

	<?php

	if( !empty($message) && $upload == False) {
		?>
        <p>
			<?=$message;?> <a href="<?= $website->page_url;?>__uploader&page_d_origine=__pages-edition&id=<?=$id;?>">Recommencer</a>
		</p>
		<?php
	}
	elseif ($upload) {
		?>
		<p>Voici mon image:</p>
				
		<p><a href="<?=$website->img_url . $nomImage;?>" title="Aggrandir" target="_blank">
				<img style="height:150px;" 
                     src="<?=$website->img_url . $nomImage;?>" alt="Mon image">
		   </a>
		 </p>
		<p>Nom du fichier: <a href="<?=$website->img_url . $nomImage;?>" title="Aggrandir" target="blank"><?=$nomImage;?></a></p>
		<p><a href="<?= $website->page_url . $page_d_origine;?>&image=<?=$nomImage;?>&amp;id=<?=$id;?>" title="Retour à la page d'origine">Insérer cette image dans ma page <?=$page_d_origine;?>.</a>
		</p>
		<?php
	}
	else {
		?>
		<p>
		Choisissez une image de taille maxi <?=$website::MAX_SIZE;?> pixels.</p>
		<form enctype="multipart/form-data" action="" method="post">
			  <p>
				<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $website::MAX_SIZE; ?>">
				<input name="fichier" type="file" id="fichier_a_uploader"></p>
			  
			  <p><input type="submit" name="submit" value="Enregistrer" />
			  </p>
		</form>
		<?php
	}
	?>
</article>