		</div><!-- Close </div class="container"> -->
		<div class="container p-0">
			<footer class="h6 bg-dark p-1"> <!-- Footer (pied de page) -->
				<ul class="nav col-lg-12 justify-content-center"><!-- usefull to W3C-validator -->
					<li class="nav-item">
						<a class="nav-link pr-0" 
						title = "Mensions légales du site web"
						href="<?= $website->page_url?>page-from-pages-index&id=318&titre=mentions-legales">
						<i class="fas fa-gavel"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link pr-0"  title = "Accueil" href="<?=$website->website_url;?>">
						<i class="fa fa-home fa-fw" aria-hidden="true"></i> 
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link pr-0"  title = "Page contact" href="<?=$website->page_url;?>contact">
						<i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> 
						</a>
						</li>
					<li class="nav-item">
						<a class="nav-link pr-0"
						title = "Autre création de Isabelle Harnist: Ludacm, un serious game"
						target="_blank"
						href="http://ludacm.fr">
						<i class="fas fa-dice"></i>
						</a>
					</li>
					<li class="nav-item">
						 <a class="nav-link pr-0"  title = "Se connecter" href="<?= $website->page_url;?>connexion">
						 <i class="fa fa-user" aria-hidden="true"></i>
						 </a>
					</li>
					<!-- ESPACE MEMBRE - BOUTONS DE CONNEXION -->
					<?php
						if(isset($_SESSION['member'])){
							// var_dump($_SESSION['member']);die();
							?>
							<li class="nav-item">
								<a class="nav-link text-danger"  title = "Se déconnecter" href="<?= $website->page_url;?>__member-deconnection"><i class="fa fa-power-off text-danger" aria-hidden="true"></i>
								 </a>
							</li>
							<?php
						}
					?>
					<li class="nav-item mt-2">
						<span class = "text-secondary pl-3">Créateurs: <a title="Idée originale et écriture du projet et de la maquette" href="http://harnistisabelle.fr" target="_blank">Isabelle Harnist</a> - <a href="http://marcharnist.fr" title="Développeur web" target="_blank"><?=$website::WEBMASTER;?></a></span>
					</li>
				</ul>

					<!-- retour à la ligne pour belle présentation online -->
			</footer> <!-- close Footer -->
		</div> <!-- close container II -->
	
		<!-- Bootstrap inside the website! -->
		<script src="./js/jquery-3.2.1.slim.min.js"></script>
		<script src="./js/popper.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		
		<!-- Hello dear visitor! - bb-code créé par M.L. Harnist le 8/04/2018 Source: OpenClassRoom -->
		<script src="js/bb-code.js"></script>

	</body>
</html>

<?php
	// store member in session var to economyse a SQL request.
	if(isset($member)){
		$_SESSION['member'] = $member;
		if(is_object($member)) {
			$member = $member->name();
			$_SESSION['member'] = $member;
		}
	}//close if(isset($member))
?>
