
<article>
	<header class="bg-light p-3">
		<h2 class="row text-muted">Fichiers du site</h2>
	</header>	
	<h3>Dossier des images</h3>
	<form class="row was-validated" method="post" action="">
		<?php
			foreach($images as $image_name){
				?>
				<div class="form-group col-lg-2">
					<img class="rounded w-100" src="<?=$repertory.$image_name;?>.jpg" alt="<?=$image_name;?>">
					<select class="custom-select w-100 mt-1" name="<?=$image_name;?>" required>
						<option value="renommer">Renommer</option>
						<option value="Supprimer">Supprimer</option>
						<option value="Deplacer">Déplacer</option>
					</select>
				</div>
				<?php
			}
		?>
	</form>
</article>
