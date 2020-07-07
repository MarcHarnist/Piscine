<section>
	<header class="row bg-light p-3	">
		<h2 class="row ml-0 text-muted">Index des pages de la catégorie "<?=$category;?>"</h2> 
	</header>

	<?php
		// Display the N° (id), the title, the author and the date of the new choosen in a link to this new.
		if($pages !== Null){
			foreach($pages as $page_en_cours_de_lecture) {
			?>
			<section>
				<h3 id="<?=$page_en_cours_de_lecture['id'];?>">
					<?php echo '<a href="' . $website->page_url . 'page-from-pages-index&amp;id='. $page_en_cours_de_lecture['id'] . '&amp;titre=' . $page_en_cours_de_lecture['url']. '" target="_blank">'.$page_en_cours_de_lecture['title'].'</a>';
					?>
					<em><small><small>
					<?php
					if (isset($member) && $member->level <= 2){
					
						// The user has enough permissions, display the edition-link
						// Le menu d'édition, de création de pages ou de suppression
						include("view/".'__menu-edition.php');
					}
					?>
					<br />
					Le <?=$page_en_cours_de_lecture['date'];?></em> <?php if($page_en_cours_de_lecture['author'] != "") echo "Auteur: " . $page_en_cours_de_lecture['author'];?></small></small>
				</h3>
				<?php
						if($page_en_cours_de_lecture['link'] == True){
							?>
				<h4 class="h5 text-primary">Extrait:</h4>
							<?php
						}
						?>
				<p class="ml-2 mb-5">
					<?=$page_en_cours_de_lecture['extrait'];?><span class="text-white">"</span><!-- ferme les liens coupés --></strong><!-- referme les balises strong coupées -->
					<small><i>(Pour ouvrir l'article dans une nouvelle fenêtre, cliquez sur le titre)</i></small><br>
					
					<?php
						if($page_en_cours_de_lecture['link'] == True){
							?>
							<a class="btn btn-primary mb-5" data-toggle="collapse" href="#details-article-<?=$page_en_cours_de_lecture['id'];?>" role="button" aria-expanded="false" aria-controls="details-article-<?=$page_en_cours_de_lecture['id'];?>">Lire tout</a>
							
							<div class="collapse" id="details-article-<?=$page_en_cours_de_lecture['id'];?>">
								<div class="card card-body">
								<?= '<h4 class="text-primary">Texte entier</h4>' .$page_en_cours_de_lecture['texte_entier'];?>
								</div><!-- <div class="card card-body"> -->
							</div><!-- close <div class="collapse" id="details"> -->
							<?php
						}
					?>

				</p>
			</section>
			<?php
			}
		}
		else 
			echo "<p>Pas de pages en mémoire dans la base de donnée.</p>";
	?>
</section>