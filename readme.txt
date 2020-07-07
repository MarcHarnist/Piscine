 
 
				README
				
				Marc L. Harnist
				23/07/2018
 
 Notebook based on CMS/MVC "LIGHT" By Marc L. Harnist 21/01/2018
 ***************************************************************

 Thanks to the teachers on Youtube: GrafitArt and SupraPhoenix (MVC)
 
 - Less than 100 files the 03/13/2018 (with 20 bootstrap files!). Ok for Github demo
 - "Light" its the name choosen the 12 january 2018 by Isabelle Harnist my wife for my self made CMS.
 - It's a MVC architectural CMS with with HTML5, CSS3, PHP5, OOP, GET and POST method for pages displaying and Mysql database. 
 - The CMS works in all repertory you want to install. Just configure the config.php file.
 - Files are saved in C:\Users\ADB\Documents\backup-notapad-do-not-deleted
   Config savings: notepad++/Paramétrage/préférences/sauvegarde choose a directory where you want to store the saved files.
 - Feb 2018, all include_once ROOTER; (ROOTER = root/controllers/rooter.php) written in each controller files, are removed in root/index.php.
 - Juil 2018: more OOP: more classes used in root/classes
 - 24 juil 2018 config.php -> models/class/Website and models/class/Database

 TO DO NOW
	- REPLACE PHP CODE BY CLASS, PAAMAYIM NEKUDOTAYIM, SWITCH (+ case, break)
		I'm sure we can replace contact_verif by OOP classes !
    - Do not worry if mails do not arrive. Sometimes, they take hours to come in your mail box. Why? Perhaps OVH stop emailings.

All glory to Jesus and God!

Site web sur une architecture Model View Controller (MVC)
*********************************************************

Cette architecture permet de:
	- avoir moins de fichiers à la racine www du site web.
	- séparer le code source PHP (dans les controlleurs) du code HTML (dans la vue) et les programmes dans un troisième repertoire: modèles. On a pu supprimer du code PHP dans la page html du repertoire Vue (view): la fameuse variable $title = accueil qui servait à renseigner la balise "title" de "<head> dans l'entête"; ainsi qu'à donner le titre h2 de la page en question.
	- avoir des fichiers plus courts
    - Tout le répertoire admin (private) supprimés grâce à un espace membre via la fonction session().
	
L'objet "File" est créé dans l'index. Sa classe sait lire le nom de la page dans l'url grâce à la methode "GET". 
Par exemple: www/index.php?page=accueil. 

Toute la gloire à Dieu et au Seigneur Jésus
