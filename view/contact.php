	<article>
		<header class="row bg-light p-3	">
			<h2 class="row ml-0 text-muted">Contactez-moi</h2>
		</header>	
		<div class="col-sm-12">
			<form action="<?= $website->page_url . 'contact_verif';?>" method="post">
			  <div class="form-group">
				<label for="email">Email *</label>
				<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
				<small id="emailHelp" class="form-text text-muted">Nous ne communiquerons jamais votre mail à quelqu'un d'autre.</small>
			  </div>
			  <div class="form-group">
				<label for="message">Votre message *</label>
					<textarea name="message" class="form-control" id="message" rows="5" cols="30" placeholder="Votre message"></textarea>
			  </div>
			  <!-- RGPD -->
			  <div class="form-group">
				<div class="form-check">
					<label class="form-check-label" for="rgpd">
					  <input class="form-check-input" type="checkbox" id="rgpd" required>
						* En soumettant ce formulaire, j’accepte que les informations personnelles fournies soient exploitées dans le cadre de ma demande et de la relation qui peut en découler.
					</label>
				</div>
			  </div>
			  <!-- Fin RGPD -->
			  <div class="form-group">
				<label for="capcha">Je ne suis pas un robot : </label>
					<?php $capcha = rand(1,5); 
					echo ' ' . $capcha;?> + 1 = <input class="rounded" id="capcha" name="capcha_reponse" size="3" />
					<input type="hidden" name="capcha" value="<?php $capcha++;
					echo $capcha;?>" />
			  </div>
			  <button type="submit" class="btn btn-dark">Envoyer</button>
			</form>
		</div>
	</article>