	<section>
	  <header class="row bg-light p-3 ">
		<h2 class="row ml-0 text-muted">Bonjour <?=$name;?>, bienvenue sur votre profil</h2>
	  </header>
		<fieldset class = "fieldset_profil">
		  <legend><?= $name;?></legend>
		  <?php 
		  /**                              NEWS SUR LES TRAVAUX EN COURS
		  * Trois données à envoyer à la classe Website: "titre", "contenu du message", "couleur de fond - css"
		  */
		  // echo $website->message("Travaux en cours", "Rangement du code de la classe Database", "lightgreen");
		  ?>
		  <p>Vous êtes connecté. Votre niveau: <?=$level;?></p>
		  <?php
		  if(isset($member) && $member->level <= 2){
			?>
			<ul>
				<li>Articles
					<ul>
					  <li><a href="<?= $website->page_url;?>__pages-creation">Créer une page</a></li>
					  <li><a href="<?= $website->page_url;?>pages-index">Editer les pages</a></li>
					  <li><a href="<?= $website->page_url;?>budget-index">Créer une page</a></li>
					</ul>
				</li>
				<li>Fichiers
				  <ul>
						<li><a href="<?= $website->page_url;?>__uploader-file">Uploader de fichier</a></li>
						<?php if(isset($member) && $member->level < 2) {?>
						<li><a title = "Editer les fichiers" href="<?= $website->page_url;?>__explorer">Explorateur</a></li>
						<?php } ?>
				   </ul>
				</li>
			  <?php
		  }
		  if(isset($member) && $member->level <= 2){
			?>
			  <li>Membres
				<ul>
				  <li><a href="<?= $website->page_url;?>__member-register">Ajouter un membre</a></li>
				  <li><a href="<?= $website->page_url;?>__member-index">Modifier les membres</a></li>
				</ul>
			  </li>
		
			  <li>Base de données
				  <ul>
					<li><a href="<?= $website->page_url;?>__sql-index">Sql index</a></li>
					<li><a href="https://phpmyadmin.cluster021.hosting.ovh.net/index.php?db=marcharnssmarc">OVH myAdmin</a></li>
				   </ul>
			  </li>
			</ul>
			<?php
		  }
		  ?>
		</fieldset>
	  </section>