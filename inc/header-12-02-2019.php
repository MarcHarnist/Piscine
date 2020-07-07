<!doctype html>      <!-- www/inc/header  1.0 Hi!  -->
<html lang="fr">
	<head>
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
		<meta name="viewport" content="width=device-width"/>
		<meta http-equiv="Content-Type" Content="text/html; charset=UTF-8">
		
		<!-- Le titre de la page qui apparaîtra dans l'onglet - Title of the page -->
		<title><?=$website::NAME . ' ' . $page->title;?></title>

		<!-- If a css file exists for this page -->
		<?=$page->css; // Displays the css link here ?>

		<!-- Awesome font -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/v4-shims.js"></script>
								<!-- CkEditor -->		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>		<script type="text/javascript">			window.onload = function(){				var oFCKcontenu = new FCKeditor( 'text' ) ;				var oFCKeditor2 = new FCKeditor( 'breves' ) ;				oFCKcontenu.ToolbarSet = 'Basic' ;				oFCKcontenu.BasePath = "ckeditor/" ;				oFCKcontenu.ReplaceTextarea() ;				oFCKeditor2.ToolbarSet = 'Basic' ;				oFCKeditor2.BasePath = "ckeditor/" ;				oFCKeditor2.ReplaceTextarea() ;			} 		</script>				
		<!-- Bootstrap (look at the bootom too) -->
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		
		<style>
			body {background: url('img/background.jpg') top no-repeat fixed; background-size: cover;}
			img {border-radius: 3px;}
		</style>
	<body>
		<div class="container pb-4 bg-light">
			<header class="row p-2 bg-dark">
				<figure>
					<a href="<?=$website->website_url;?>">
						<!--
						<img
							class="rounded-circle" 
							src="img/notebook_logo.png" 
							alt="Logo: Marc Harnist"
							height="75">
						-->
					</a>
				</figure>
				<aside class="col-lg-6 float-left">
					<h1><a href="<?=$website->website_url;?>">Sortie piscine</a></h1>
				</aside>
			</header>
