
<h3 class="warning">Attention ! Cette suppression sera définitive.</h3>


<h4 class="text-danger">Etes-vous sur de vouloir supprimer l'entrée n°<?=$id?> de <?=$name;?></h4>
<p><a href="<?= $website->page_url;?>__sql-index">Cliquez ici pour Sauvegarder la db</a></p>


<form method="post" action="#">
	<p><input type="hidden" name="confirm" value="oui" />
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	<input type="hidden" name="ancre" value="<?php echo $ancre;?>" />
	<input class="btn btn-danger text-white" type="submit" value="Oui, je confirme la suppression." /></p>
</form>

<form method="post" action="<?php echo $url_de_retour_en_arriere;?>">
	<p><input class="btn btn-success rounded text-white"  class="nombre"	type="submit" value="ANNULER" /></p>
</form>