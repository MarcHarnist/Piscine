<!-- Affichage des pages à éditer dans la vue le 13/08/2017 ML-Harnist -->
<article class="bg-light w-100">
	<header class="row bg-light">
		<h2 class="row m-3 text-muted">Modifiez vous-mêmes les pages de votre site!</h2>
	</header>	

	<h3 class="h4">
		<!--<a href="<?//== $website->page_url;?>__sql">Sauvegarder les données avant d'éditer.</a> - -->
		<a href="<?= $website->page_url . 'page-from-pages-index&id=' . $pages['id'] . '&categorie=' . $pages['category'] . '&titre=' . $pages['title'];?>">Voir la publication</a> - <a href="<?= $website->page_url;?>__pages-creation">Nouvelle page</a> 
		
	</h3>
		<form class = "row p-3 bg-secondary m-3 rounded" method="post" action="<?= $website->page_url;?>__pages-save">
		
			<div class="col-lg-2">
				<label for="id" class="text-white" id="<?=$pages['id'];?>">Page n° </label>
					<input class="form-control" type="text" name="page_id" value="<?=$pages['id'];?>" id="id">
					<!-- on sauve la valeur de l'ancien N°-->
					<input type="hidden" name="N°" value="<?=$pages['id'];?>">
			</div>
			<div class="col-lg-3 ">
				<label for="date" class="text-white"> du (jj/mm/aaaa)</label>
					<input class="form-control" type="text" size="8" name="date" value="<?=$pages['date'];?>"  id="date"> 
			</div>
				
			<div class="col-lg-3 ">
				<label for="author" class="text-white"> Auteur</label>
					<input class="form-control" class = "w-80" type="text" name="author" value="<?=$pages['author'];?>" id="author">
			</div> 
			<div class="col-lg-12 pt-3">
				<label for="titre" class="text-white">Titre:
					<input class="form-control title" type="text" size="76" name="title" value="<?=$pages['title'];?>" id="titre">
			</div>
			
			<!-- Bloc des catégories: margin top 3 (mt-3) -->
			<div class="col-lg-12 pt-3">
				<div class="row">
					<p class="text-white col-lg-12">Catégorie: <i>"<?=$pages['category'];?>"</i></p>
					<div class="text-white col-lg-12">
					<div class="row">
						<p class="col-lg-5">Déplacer le fichier dans une autre catégorie:</p>		
						<select class="form-control col-lg-6" name="category">
						  <option selected><?=$pages['category'];?></option>
							<?php
								foreach($categories as $categorie){
								?>
								<option value="<?=$categorie;?>"><?=$categorie;?></option>
								<?php	
								}
								?>
						</select>
					</div>
					</div>
					<div class="col pt-3">
						<input class="form-control w-100" type="text" name="category_new" value="" placeholder="Créer une nouvelle catégorie">	
					</div>
				</div>
			</div>
			
			<p class="col-lg-12 pt-3"> 
				<input class="form-control w-25"  type="submit" value="Enregistrer" />
			</p>
			
			<div class="col-lg-12 pt-3">
				<textarea class="form-control" rows="20" name="text" id="textarea"><?=$pages['text'];?></textarea>
								
				<!-- on affiche la barre d'outil fckeditor nov 2010 creaweb -->
				<script type="text/javascript"> CKEDITOR.replace( 'text' ); </script>
				
				<input type="hidden" name="operation" value="update">
				<input class="form-control w-25 mt-3"  type="submit" value="Enregistrer">
			</div>
		</form>
</article>