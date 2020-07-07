
<!-- Delete one page, choosen in pages-index or in page-from-pages-index
									M.Harnist 02 octobre 2017 -->

<h3 class="text-danger">Etes-vous sur de vouloir supprimer l'article ci-dessous:</h3>
<h4 class="text-danger">Attention ! Cette suppression sera définitive.</h4>

<div class="m-2 p-2 border border-primary rounded">
	<h3>
		N° <?=$page_en_cours_de_lecture['id']?> - <?=$page_en_cours_de_lecture['title']?><br />
		<em>Le <?=$page_en_cours_de_lecture['date'];?></em><br>
	</h3>
	<h4 class="text-primary">
		Catégorie:  <?=$page_en_cours_de_lecture['category'];?>
	</h4>
		
	<p><?=$page_en_cours_de_lecture['text'];?></p>
</div>

 <form class="float-left mr-2" method="post" action="">
	<p>
		<input type="hidden" name="id" value="<?= $page_en_cours_de_lecture['id'];?>" />
		<input class="btn btn-danger text-white" type="submit" value="Confirmer la suppression" />
	</p>
</form>

 <form method="post" action="<?= $website->page_url . 'pages-index&categorie=' . $page_en_cours_de_lecture['category'];?>">
	<p>
		<input type="hidden" name="id" value="<?= $id;?>" />
		<input class="btn btn-success rounded text-white" type="submit" value="Annuler" />
	</p>
</form>
