<article>
  <header class="row bg-light p-3 ">
    <h2 class="row ml-0 text-muted">SE CONNECTER</h2>
  </header>
  <section class="col-lg-12">
	<?php
	  if(($message->Red()) != ""){
		echo $website::message("Petite erreur", $message->Red(), "pink");
	  }
	?>
  </section>
  <section class="mt-1">
    <form class="col-lg-3" method="post" action="#">
	  <div class="form-group">
		<label for="nom">
		  <input id="nom" class="form-control" type="text" name="name" <?php if(!isset($erreur_nom)) { ?> value = "<?=$save_pseudo?>" <?php }?> maxlength="50" placeholder = "Votre pseudo" required <?php if(empty($save_pseudo) or isset($erreur_nom)) echo "autofocus";?>>
		</label>
		<label for="pw">
		  <input id="pw" class = "form-control" type="password" name="password" maxlength="250" placeholder = "Mot de passe" required<?php if(isset($erreur_pw)) echo " autofocus";?>>
		</label>
	  </div>
	  <input class = "btn btn-primary" type="submit"  name="utiliser" value="Se connecter">
	</form>
  </section>
</article>