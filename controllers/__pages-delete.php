<?php
/*           _________________
            |   Contrôleur    |         
            |  __page-delete  |   
            |   Marc Harnist  | 
            |    09/08/2017   |    
            |                 |   
            |  Delete 1 page  |   
            |_________________|        

*  This page reserved for level 1 & 2 users
*/ $website->membersPermissions(2, $member);

if(isset($_GET['id']) && !empty($_GET['id'])){
    //Get['id'] vient de la page page-index, ou page-from-page-index ou accueil
	$id = htmlspecialchars($_GET['id']);
	$database = new Database;//Connection à la base de données et à la classe Methods
	$page_en_cours_de_lecture = $database->getOnePageById($id); // On veut une seule page par son id
}

if(isset($_POST['id'])){
  $suppression = $database->delete($_POST['id']);
  if($suppression == True)
    header('Location: ' . $website->page_url . 'pages-index&categorie='.$page_en_cours_de_lecture['category']);
  else
	  exit("Il y a eu un problème.");
}
if(isset($_POST['confirmation'])){
	
}