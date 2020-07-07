<!--
                                       PISCINE
                                     HARNIST & co
                                         2019
-->
<header class="row text-primary bg-light p-3 text-center">
	<h2 class="col-lg-12">Combien d'enfants de <?=$age;?> ans vas-tu encadrer tout seul au maximum?</h2>
</header>
<section class="row">
    <div class="col-lg-12 p-3 m-2">
		<article class="mb-5 text-center">
			<form class="form-inline" action="index.php?page=correction" method="post">
			  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Sélectionne un nombre dans la liste: </label>
			  <select class="custom-select my-1 mr-sm-2 w-50" id="inlineFormCustomSelectPref" name="nombreDenfants">
				<option value="1">Un</option>
				<option value="2">Deux</option>
				<option value="3">Trois</option>
				<option value="4">Quatre</option>
				<option value="5">Cinq</option>
				<option value="6">Six</option>
				<option value="7">Sept</option>
				<option value="8">Huit</option>
				<option selected value="9">Neuf</option>
				<option value="10">Dix</option>
				<option value="11">Onze</option>
				<option value="12">Douze</option>
			  </select>
			  <button type="submit" class="btn btn-primary my-1">Envoyer</button>
			  <input type="hidden" name="age" value="<?=$age;?>">
			</form>
		</article>
	</div>
</section>