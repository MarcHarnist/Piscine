<section>
	<header class="row bg-light p-3	">
		<h2 class="row ml-0 text-muted">
			N° <?=$page_en_cours_de_lecture['id']?> - <?=$page_en_cours_de_lecture['title']?><br />
			 <em><small><small>&nbsp;- Le <?=$page_en_cours_de_lecture['date'];?> Catégorie: <?=$page_en_cours_de_lecture['category'];?></small></small></em>	
		</h2> 
	</header>
	<!-- Display only one page, choosen in pages-index -->
	<!-- M.Harnist 07/03/2018 (created 02 octobre 2017 for the pages -->
	<p><?=$page_en_cours_de_lecture['text'];?></p>
	<p class="icon">
		<?php
		if (isset($editor) && $editor == True){
			// $editor == True? (see controller) 
			// The visitor has enough permissions, display the edition-link
			include_once("view/".'__menu-edition.php');
		}
		?>
	</p>
</section>

