<?php
  
/******************************************************************************************************** 
*   Page-save = enregistrement des pages dans la base de donnée                                        **
*   13/08/2017 Marc Laurent Harnist                                                                    **
*   Ce fichier modifié en POO le 18/07/18                                                              **
*   Nous arrivons ici depuis __pages-edition.php et __pages-creation via méthode form / POST           **
*   Les valeurs de la super globale $_POST sont traités dans                                           **
*   la class root/classes/DatabaseCreate.php                                                           **
*                                                                                                      **
*   We arrive here from the file: view/__pages-edition.php & view/__pages-creation                     **
*   The values of the global $_POST are in the class root/models/classes/DatabaseCreate treated        **
*		                                                                                               **
********************************************************************************************************/

$website->membersPermissions(1, $member);

// POO: Création d'un nouvel objet "$new_post" via instanciation de la classe DatabaseCreate
$new_post = new Database;
$new_post->update_article($_POST);

// Si $new_post = True: no error, we continue.... / pas d'erreur on continue
if($new_post == True) header ('location: ' . $website->page_url . '__pages-edition&id=' . $new_post->N°);

// else: form == False: there's an error: the view is load here by root/index.php...