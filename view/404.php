	<article>
		<header class="row bg-light p-3 text-muted">
			<h2 class="col-lg-12">404</h2>
			<h3 class="col-lg-12">Oops! Page non trouvée :euh:...</h3>
		</header>	
		<figure>
			<img class="w-100" src="img/desert-page-404.jpg">
		</figure>
		<div class="col-lg-12">
			<h4 class="col-lg-12">Contacte-moi pour me le signaler! Merci :)</h4>
			<form action="<?=$website->page_url . 'contact_verif';?>" method="post">
			  <div class="form-group">
				<label for="email">Email address *</label>
				<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
				<small id="emailHelp" class="form-text text-muted">Nous ne communiquerons jamais votre mail à quelqu'un d'autre.</small>
			  </div>
			  <div class="form-group">
				<label for="message">Votre message *</label>					<textarea name="message" class="form-control" id="message" rows="5" cols="30" placeholder="Votre message"></textarea>			  </div>			  <div class="form-group">				<label for="capcha">Je ne suis pas un robot : </label>					<?php $capcha = rand(1,5); 					echo ' ' . $capcha;?> + 1 = <input class="rounded" id="capcha" name="capcha_reponse" size="3" />					<input type="hidden" name="capcha" value="<?php $capcha++;					echo $capcha;?>" />			  </div>			  <button type="submit" class="btn btn-dark">Envoyer</button>			</form>		</div>	</article>