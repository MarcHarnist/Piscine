<section>
	<header class="row bg-light p-3	">
		<h2 class="row ml-0 text-muted">Index des mises à jours</h2> 
	</header>

	<?php
			if(isset($action)){
				if ($action == True) { ?>	
				
	<p class="text-success">La base de donnée a été supprimée</>
					
	<?php
		} else { ?>

	<p class="text-danger">Echec de suppression de la base de donnée:<br>
	<?=$action;?></p>	

	<?php	
			}
		}
	?>

	<p><a href="<?= $website->page_url;?>__sql-mise-a-jour&action=supprimer_db">Supprimer la base de donnée.</a></p>

	<p><a href="<?= $website->page_url;?>__sql-mise-a-jour&action=creer_db">Créer la base de donnée.</a></p>

	<p><a href="<?= $website->page_url;?>__sql-mise-a-jour&action=charger_db">Charger le contenu de la base de donnée.</a></p>

	<p><a href="<?= $website->page_url;?>__sql-index" alt="Index de Sql">Retourner à Sql-Index</a>

</section>
