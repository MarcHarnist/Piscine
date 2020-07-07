<section>
	<header class="row bg-light p-3	">
		<h2 class="row ml-0 text-muted">Fichiers Sql disponibles au téléchargement</h2> 
	</header>

	<?php
	if(isset($_GET['operation'])){ ?>
	  <p><?php if($destruction == true){?> <span class="text-success"><i>Destruction du fichier réussie.</i></span><?php }
	  else { ?><span class="text-danger"><i>La destruction du fichier n'a pas réussi.</i></span><?php }?></p>
	  <?php 
	}
	?>
	
	<p><a href="<?= $website->page_url;?>__sql-index" alt="Index de Sql">Retourner à Sql-Index</a></p>

	<p><?=$autres_fichiers;?></p>
	
</section>