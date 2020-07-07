<!--
                                       PISCINE
                                     HARNIST & co
                                         2019
-->
<header class="row text-primary bg-light p-3 text-center">
	<!-- <h2 class="col-lg-12">Correction</h2> -->
</header>
<section class="row">
    <div class="col-lg-12 p-3 m-2">
		<article class="mb-5 text-center">
			<?php 
				if(isset($correction)){
					if($correction['erreur'] == true){
						?>
						<section class="row">
							<p class="col-lg-6"><img class="w-50" src="img/<?=$correction['image'];?>"></p>
							<p class="text-danger col-lg-5"><?=$correction['message'];?></p>
							<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=choix-du-groupe-selon-l-age">REJOUER</a></p>
						</section>
						<?php
					}
					elseif($correction['correction'] == "nombreDenfants") {
						?>
						<p class="text-primary"><?=$correction['message'];?></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-voir-la-directrice=depart-piscine">Vous partez à la piscine</a></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-voir-la-directrice=voir-directrice">Tu vas voir la directrice<br> de l'accueil</a></p>
						<?php
					}
					elseif($correction['correction'] == "voir-la-directrice"){
						?>
						<p class="text-primary"><?=$correction['message'];?></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-aller-dans-la-regie=depart-piscine">Tu pars à la piscine</a></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-aller-dans-la-regie=reunion-des-enfants">Tu vas dans la régie</a></p>
						
						<?php
					}
					elseif($correction['correction'] == "aller-dans-la-regie"){
						?>
						<p class="text-primary"><?=$correction['message'];?></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-reunir-les-enfants=depart-piscine">Vous partez à la piscine</a></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-reunir-les-enfants=reunion-des-enfants">Tu réunis les enfants</a></p>
						
						<?php
					}
					
					elseif($correction['correction'] == "reunir-les-enfants"){
						?>
						<p class="text-primary"><?=$correction['message'];?></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-courrir-a-la-regie=laisser-julien">Tu confies Justin à<br> un autre animateur<br> pour la journée</a></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-courrir-a-la-regie=courrir-en-regie">Tu cours en régie en confiant<br> les enfants à ta collègue</a></p>
						
						<?php
			
					}
					
					elseif($correction['correction'] == "courrir-a-la-regie"){
						?>
						<p class="text-primary"><?=$correction['message'];?></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-vous-partez-a-la-piscine=depart-piscine">Vous partez à la piscine</a></p>
						
						<p class="col-lg-3 mt-5 mx-auto"><a class="btn btn-primary" href="index.php?page=correction&reponse-vous-partez-a-la-piscine=retour-regie">Tu retournes en régie</a></p>
						
						
						<?php
			
					}
					
					elseif($correction['correction'] == "vous-partez-a-la-piscine"){
						?>
						<section class="row">
							<p class="col-lg-6"><img class="w-50" src="img/<?=$correction['image'];?>"></p>
							<div class="col-lg-5">
								<p class="text-primary"><?=$correction['message'];?></p>
								<p class="mt-5 mx-auto"><a class="btn btn-primary" href="index.php">Revenir à l'accueil</a></p>
							</div>
						</section>
						
						<?php
			
					}
					
				} else {
					?>
					<p class="text-danger">Erreur, pas de données à partager...</p>
					<?php
				}
				?>
		</article>
	</div>
</section>