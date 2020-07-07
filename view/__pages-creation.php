<article class="bg-light w-100">
	<header class="row bg-light">
		<h2 class="row m-3 text-muted">Créez vos propres pages!</h2>
	</header>	
	<!-- CREATION NEW New in data base. All script by Marc Harnist -->

	<form class = "row p-3 bg-secondary m-3 rounded" method="post" action="<?= $website->page_url;?>__pages-save">
		<!--Form id deleted because 2 ids not valid html5 --> 
		
		<div class="col-lg-3">
		  <label for="date" class="text-white">Date</label><input type="text" class="form-control" name="date" value="<?=$date_default;?>" id="date">
		</div>
		<div class="col-lg-9">
		  <label for="author" class="text-white">Auteur</label><input type="text" class="form-control" name="author" value="<?=$website::OWNER;?>" id="author">
		</div>
	    <div class="col-lg-12 pt-3">
			<label for="titre" class="text-white">Titre</label>
			<input  type="text" class="form-control" name="title" placeholder = "Choisissez le titre de votre nouvelle page" id="titre">
		</div>	
		
		<!-- Un foreach va lister les catégories de la base de donnée (table "light_pages") afin de pouvoir choisir l'une d'elle dans un menu déroulant 	-->
		
		<div class="col-lg-12 pt-3">
			<div class="row">
				<div class="col-lg-6">
					<select class="form-control" name="category">
					  <option selected>Choisir une catégorie</option>
						<?php
							foreach($categories as $categorie){
						?>
							<option value="<?=$categorie;?>"><?=$categorie;?></option>
						<?php	
							}
						?>
					</select>
				</div>
				<div class="col">
					<input class="form-control w-100" type="text" name="category_new" value="" placeholder="Créer une nouvelle catégorie">	
				</div>
			</div>
		</div>
					
		
		<div class="col-lg-12 pt-3">
			<label for="texte" class="text-white">Votre texte</label><br>
			<i><small></small></i>	
			<textarea class="form-control" rows="10" name="text" id="texte" placeholder="Pour insérer une image, un lien, changer le texte en gras, en petit, en plus grand: il vous faut d'abord enregistrer votre travail et charger l'image depuis la page d'édition des pages ou modifier votre texte grâce au bb-code de la page édition."></textarea>
			
											
			<!-- on affiche la barre d'outil fckeditor nov 2010 creaweb -->
			<script type="text/javascript"> CKEDITOR.replace( 'text' ); </script>
			
			<input type="hidden" name="operation" value="creation"><br>
			<input type="hidden" name="last_id" value="<?=$last_id;?>"><br>
			<input class="form-control w-25" type="submit" value="Enregistrer">
		</div>
	</form>
</article>