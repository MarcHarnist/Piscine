<?php
/**                      Clase Methods extends Website extends Alpha
*                                      Marc L. Harnist
*                                         19/07/2018
*
* MAJ 30/08/2018
* FILE USING THIS CLASS: root/index.php, root/models/classes/File.php
* METHODES
*   transform_object_to_array ()
*   cleaner()
*   cleanPageName
*   cleanAccents
*   cleanUrl
*   cssLink
*   session
*   sessionOuverte
*   fermeSession
*   authentification
*   accorder_pluriels()
*********************************************************************/
class Methods extends Website {
    
    public function __construct(){
        parent::__construct();
    }
    
    /******************************************************************************************/
    /** Nom : transform_object_to_array                                                      **/
    /******************************************************************************************/
    /** Description : transforme un object qui contient un array en array simple             **/
    /**                                                                                      **/
    /******************************************************************************************/
    /** Paramètres : [objet] l'objet qui contient l'array à simplifier en array pour la vue  **/
    /******************************************************************************************/
    /** Valeurs retournées : [array] avec le contenu de l'objet                              **/
    /******************************************************************************************/
    /** Auteur : Marc L. Harnist                                                             **/
    /******************************************************************************************/
    /** Version : 1.0                                                                        **/
    /******************************************************************************************/
    /** Créée le : 25/03/2018                                                                **/
    /******************************************************************************************/
    /** Modifiée le : 25/03/2018                                                             **/    /******************************************************************************************/
    public static function transform_object_to_array($object){
        if(is_object($object))// verify if $object is an object
        {
            $array = (array)$object;
            return $array;
        }
        else // error: $object is not an object
        {
            exit("La valeur envoyée n'est pas un object. Or cette fonction ne transforme que des objets en tableau.");
        }
    }
    
    /**********************************************************************************************/
    /****** Nom : cleaner                                                                    ******/
    /**********************************************************************************************/
    /****** Description : nettoie les noms de caractères spéciaux                            ******/
    /******                                                                                  ******/
    /**********************************************************************************************/
    /****** Paramètres : [string] chaîne à nettoyer                                          ******/
    /******              [string] caractère à ôter                                           ******/
    /**********************************************************************************************/
    /****** Valeurs retournées : [string] avec une lettre en plus ou rien en plus            ******/
    /**********************************************************************************************/
    /****** Auteur : Marc L. Harnist                                                         ******/
    /**********************************************************************************************/
    /****** Version : 1.0                                                                    ******/
    /**********************************************************************************************/
    /****** Créée le : 25/03/2018                                                            ******/
    /**********************************************************************************************/
    /****** Modifiée le : 25/03/2018                                                         ******/    /**********************************************************************************************/
    public static function cleaner($mot, $caractere){
        $mot = str_replace($caractere, " ", $mot);
        return $mot;
    }
    
    /**************************************************************************************************************/
    /****** Nom : cleanPageName                                                                              ******/
    /**************************************************************************************************************/
    /****** Description : embellit le nom de la page en remplaçant les _ et - par un espace                  ******/
    /**************************************************************************************************************/
    /****** Paramètres :                                                                                     ******/
    /****** [STRING] $page -> Nom du fichier de la vue qui sera affiché dans head: <title> et donc l'onglet  ******/
    /**************************************************************************************************************/
    /****** Valeurs retournées : chaîne de caractères avec des traits d'unions au lieu de underscores        ******/
    /**************************************************************************************************************/
    /****** Auteur : Marc Harnist                                                                            ******/
    /**************************************************************************************************************/
    /****** Version : 1.0                                                                                    ******/
    /**************************************************************************************************************/
    /****** Créée le : 04/03/2018                                                                            ******/
    /**************************************************************************************************************/
    /****** Modifiée le : 04/03/2018                                                                         ******/
    /**************************************************************************************************************/
    public function cleanPageName($title = "") {
        
        $ugly = ['_','-']; //ugly characters from title in the array "$bad"
        $title = ucfirst(str_replace($ugly," ", $title));//<title> in header
        
        return $title;
    }

    /**************************************************************************************************************/
    /****** Nom : cleanUrl                                                                                   ******/
    /**************************************************************************************************************/
    /****** Description : les url en remplaçant les _ et - par un espace et met en minuscule                 ******/
    /******               Idée: certains navigateurs n'aiment pas les accents et plantent l'affichage        ******/
    /**************************************************************************************************************/
    /****** Paramètres :                                                                                     ******/
    /****** [STRING] $url -> Nom du fichier de la vue qui sera affiché dans l'url                            ******/
    /**************************************************************************************************************/
    /****** Valeurs retournées : chaîne de caractères avec des traits d'unions et en minuscule               ******/
    /**************************************************************************************************************/
    /****** Auteur : Marc Harnist                                                                            ******/
    /**************************************************************************************************************/
    /****** Version : 1.0                                                                                    ******/
    /**************************************************************************************************************/
    /****** Créée le : 04/03/2018                                                                            ******/
    /**************************************************************************************************************/
    /****** Modifiée le : 04/03/2018                                                                         ******/
    /**************************************************************************************************************/

    function cleanUrl( $url) {
        
        $url = $this->cleanAccents($url);
        $erase = ['/', ' ', '"', "'", "%20"];
        $url = str_replace( $erase, '-', $url );//replace keyboard spaces by -
        $url = strtolower($url);
        $url = stripslashes($url);
        return $url;
    }   
    
    /**************************************************************************************************************/
    /****** Nom : cleanPageName                                                                              ******/
    /**************************************************************************************************************/
    /****** Description : nettoie le nom de la page en remplaçant les _ et - par un espace                   ******/
    /**************************************************************************************************************/
    /****** Paramètres :                                                                                     ******/
    /****** [STRING] $page -> Nom du fichier de la vue qui sera affiché dans l'url                           ******/
    /**************************************************************************************************************/
    /****** Valeurs retournées : chaîne de caractères avec des espaces                                       ******/
    /**************************************************************************************************************/
    /****** Auteur : Marc Harnist                                                                            ******/
    /**************************************************************************************************************/
    /****** Version : 1.0                                                                                    ******/
    /**************************************************************************************************************/
    /****** Créée le : 04/03/2018                                                                            ******/
    /**************************************************************************************************************/
    /****** Modifiée le : 04/03/2018                                                                         ******/
    /**************************************************************************************************************/



    function cleanAccents( $str, $charset='utf-8' ) {
     
        $str = htmlentities( $str, ENT_NOQUOTES, $charset );
        
        $str = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
        $str = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $str );
        $str = preg_replace( '#&[^;]+;#', '', $str );
       
        return $str;
    }
    

    /**************************************************************************************************************/
    /****** Nom : cssLink                                                                                    ******/
    /**************************************************************************************************************/
    /****** Description : crée un lien css pour head si un fichier css existe dans root/css/ avec ce nom      *****/
    /**************************************************************************************************************/
    /****** Paramètres :                                                                                     ******/
    /****** [STRING] $page -> Nom du fichier pour lequel il faut chercher un fichier css s'il existe         ******/
    /**************************************************************************************************************/
    /****** Valeurs retournées : chaîne de caractères avec le lien css                                       ******/
    /**************************************************************************************************************/
    /****** Auteur : Marc Harnist                                                                            ******/
    /**************************************************************************************************************/
    /****** Version : 1.0                                                                                    ******/
    /**************************************************************************************************************/
    /****** Créée le : 04/03/2018                                                                            ******/
    /**************************************************************************************************************/
    /****** Modifiée le : 04/03/2018                                                                         ******/
    /**************************************************************************************************************/

    function cssLink($page = "style"){

        // Css file by default
        $css_link = '';//head CSS links by default

        // CSS = root/css/ in 2018. Constant defined in models/config/config.php
        if(is_file('css/' . $page . '.css')){

            //If a css file exists with this name
            $css_link.= "\n\t"; // add return and tab. Works only with ""!
            $css_link.= '<link rel="stylesheet" href="css/' . $page . '.css">';

            $css_link.= "\n"; // add return and tab. Works only with ""!
        }
        return ($css_link);
    } 
    /**************************************************************************************************************/
    /****** Nom : sessionOuverte                                                                             ******/
    /**************************************************************************************************************/
    /****** Description : Vérifie si une session valide est actuellement ouverte sur le serveur Web          ******/
    /**************************************************************************************************************/
    /****** Paramètres : Aucun paramètre                                                                     ******/
    /**************************************************************************************************************/
    /****** Valeurs retournées : [BOOL] Etat de la session (true = session ouverte ; false = session fermée) ******/
    /**************************************************************************************************************/
    /****** Auteur : Samuel RENAUD                                                                           ******/
    /**************************************************************************************************************/
    /****** Version : 1.0                                                                                    ******/
    /**************************************************************************************************************/
    /****** Créée le : 19/02/2018                                                                            ******/
    /**************************************************************************************************************/
    /****** Modifiée le : 19/02/2018                                                                         ******/
    /**************************************************************************************************************/
    function sessionOuverte() {
        //Renvoyer l'état de la session
        session_start();
        return isset($_SESSION['email']);
    }
        


    /******************************************************************************** *************/
    /****** Nom : ouvreSession                                                               ******/
    /**********************************************************************************************/
    /****** Description : Ouvre la session de l'utilisateur passé en paramètres              ******/
    /**********************************************************************************************/
    /****** Paramètres :                                                                     ******/
    /****** [STRING] $email -> Adresse email de l'utilisateur                                ******/
    /****** [STRING] $nom -> Nom de famille de l'utilisateur                                 ******/
    /****** [STRING] $prénom -> Prénom de l'utilisateur                                      ******/
    /**********************************************************************************************/
    /****** Valeurs retournées : [BOOL] Résultat de l'opération (true = OK ; false = Erreur) ******/
    /**********************************************************************************************/
    /****** Auteur : Samuel RENAUD                                                           ******/
    /**********************************************************************************************/
    /****** Version : 1.0                                                                    ******/
    /**********************************************************************************************/
    /****** Créée le : 19/02/2018                                                            ******/
    /**********************************************************************************************/
    /****** Modifiée le : 19/02/2018                                                         ******/
    /**********************************************************************************************/
    function ouvreSession($email = '', $nom = '', $prenom = '') {
            //Vérification des paramètres
            if(!$email) return false;
            
            //Ouverture de le session
            session_start();
            
            //On stocke les infos de l'utilisateur dans la session
            $_SESSION['email']  = $email;
            $_SESSION['nom']    = $nom;
            $_SESSION['prenom'] = $prenom;
            return true;
        }
        
        
        
    /********************************************************************************/
    /****** Nom : fermeSession                                                 ******/
    /********************************************************************************/
    /****** Description : Ferme la session de l'utilisateur sur le serveur Web ******/
    /********************************************************************************/
    /****** Paramètres : Aucun                                                 ******/
    /********************************************************************************/
    /****** Valeurs retournées : Aucune                                        ******/
    /********************************************************************************/
    /****** Auteur : Samuel RENAUD                                             ******/
    /********************************************************************************/
    /****** Version : 1.0                                                      ******/
    /********************************************************************************/
    /****** Créée le : 19/02/2018                                              ******/
    /********************************************************************************/
    /****** Modifiée le : 19/02/2018                                           ******/
    /********************************************************************************/
    function fermeSession() {
        //Fermeture de la session
        session_destroy();
    }
        


    /********************************************************************************/
    /****** Nom : authentification                                             ******/
    /********************************************************************************/
    /****** Description : Vérifie l'identité d'un utilisateur                  ******/
    /********************************************************************************/
    /****** Paramètres :                                                       ******/
    /****** [STRING] $email -> Adresse email de l'utilisateur                  ******/
    /****** [STRING] $password -> Mot de passe de l'utilisateur                ******/
    /********************************************************************************/
    /****** Valeurs retournées : [BOOL] Résultat de l'authentification         ******/
    /****** (true = Utilisateur authentifié ; false = Erreur d'authenfication) ******/
    /********************************************************************************/
    /****** Auteur : Samuel RENAUD                                             ******/
    /********************************************************************************/
    /****** Version : 1.0                                                      ******/
    /********************************************************************************/
    /****** Créée le : 19/02/2018                                              ******/
    /********************************************************************************/
    /****** Modifiée le : 22/02/2018                                           ******/
    /********************************************************************************/
    function authentification($email = '', $password = '') {
        //Vérification des paramètres
        if(!$email || !$password) return false;
        
        //Récupération de la liste des utilisateurs dans un tableau
        $utilisateurs = file('users.txt');
        
        //Boucle de lecture du fichier des utilisateurs
        foreach ($utilisateurs as $utilisateur) {
            //On utilise les points virgules pour séparer les champs
            $infos = explode(';',$utilisateur);

            //Contrôle de l'adresse e-mail
            if($email == trim($infos[0])) {
                //Contrôle du mot de passe
                if(password_verify($password, trim($infos[3]))) {
                    //Infos valides, l'utilisateur est authentifié               
                    //Ouverture de la session
                    return ouvreSession($email, $infos[1], $infos[2]);
                } else {
                    //Erreur : mot de passe invalide
                    return false;
                }
            }
        }
        
        //Utilisateur non trouvé
        return false;
    }

    /****************************************************************************************************/
    /****** Nom : listeUtilisateurs                                                                ******/
    /****************************************************************************************************/
    /****** Description : Affiche le tableau de la liste des utilisateurs                          ******/
    /****************************************************************************************************/
    /****** Paramètres : Aucun                                                                     ******/
    /****************************************************************************************************/
    /****** Valeurs retournées : [STRING] Code HTML du tableau contenant la liste des utilisateurs ******/
    /****************************************************************************************************/
    /****** Auteur : Samuel RENAUD                                                                 ******/
    /****************************************************************************************************/
    /****** Version : 1.0                                                                          ******/
    /****************************************************************************************************/
    /****** Créée le : 22/02/2018                                                                  ******/
    /****************************************************************************************************/
    /****** Modifiée le : 22/02/2018                                                               ******/
    /****************************************************************************************************/
    function listeUtilisateurs() {
        //Préparation de la chaine HTML utilisée pour le renvoi
        $retour = "<table border=\"1\">\n";
        $retour .= "\t\t\t<thead>\n";
        $retour .= "\t\t\t\t<tr align=\"center\">\n";
        $retour .= "\t\t\t\t\t<td><strong>NOM</strong></td>\n";
        $retour .= "\t\t\t\t\t<td><strong>Prénom</strong></td>\n";
        $retour .= "\t\t\t\t\t<td><strong>E-mail</strong></td>\n";
        $retour .= "\t\t\t\t</tr>\n";
        $retour .= "\t\t\t</thead>\n";
        $retour .= "\t\t\t<tbody>\n";
        
        //Chargement du fichier des utilisateurs
        $users = file('users.txt');
        
        foreach ($users as $user) {
            //Séparation des champs
            $champs = explode(';',$user);
            
            //Génération de la ligne (row) du tableau
            $retour .= "\t\t\t\t<tr>\n";
            $retour .= "\t\t\t\t\t<td>".trim($champs[1])."</td>\n";
            $retour .= "\t\t\t\t\t<td>".trim($champs[2])."</td>\n";
            $retour .= "\t\t\t\t\t<td>".trim($champs[0])."</td>\n";
            $retour .= "\t\t\t\t</tr>\n";
        }

        $retour .= "\t\t\t</tbody>\n";
        $retour .= "\t\t</table>";
        
        return $retour;
    }



    /**************************************************************************************/
    /****** Nom : ajoutUtilisateurFichier                                            ******/
    /**************************************************************************************/
    /****** Description : Ajoute un nouvel utilisateur dans le fichier               ******/
    /**************************************************************************************/
    /****** Paramètres :                                                             ******/
    /****** [STRING] $email -> Adresse email de l'utilisateur                        ******/
    /****** [STRING] $nom -> Nom de famille de l'utilisateur                         ******/
    /****** [STRING] $prenom -> Prénom de l'utilisateur                              ******/
    /****** [STRING] $password -> Mot de passe de l'utilisateur                      ******/
    /**************************************************************************************/
    /****** Valeurs retournées : [INTEGER] Code indiquant le résultat de l'opération ******/
    /****** 0 -> Erreur lors de l'ajout de l'utilisateur                             ******/
    /****** 1 -> L'utilisateur a été correctement ajouté                             ******/
    /****** 2 -> Erreur, l'utilisateur existe déjà dans le fichier (doublon)         ******/
    /**************************************************************************************/
    /****** Auteur : Samuel RENAUD                                                   ******/
    /**************************************************************************************/
    /****** Version : 1.0                                                            ******/
    /**************************************************************************************/
    /****** Créée le : 23/02/2018                                                    ******/
    /**************************************************************************************/
    /****** Modifiée le : 23/02/2018                                                 ******/
    /**************************************************************************************/
    function ajoutUtilisateurFichier($email = '', $nom = '', $prenom = '', $password = '') {
        //Vérification des paramètres
        if(!$email || !$password) return 0;
        
        //Nettoyage des caractères vides
        $email    = trim($email);
        $nom      = trim($nom);
        $prenom   = trim($prenom);
        $password = trim($password);
        
        //Cryptage du mot de passe (hash)
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //Chargement de la liste des utilisateurs dans un ARRAY
        $users = file('users.txt');
        
        //Boucle de parcours du ARRAY pour rechercher un doublon
        foreach($users as $user) {
            $infos = explode(';', $user);
            //Vérification si l'email existe déjà
            if($email == $infos[0]) return 2; //Renvoyer le code erreur doublon
        }
        
        //Ajout de l'utilisateur dans le ARRAY
        $users[] = implode(';', array($email, $nom, $prenom, $password))."\n";
        //Sauvegarde du ARRAY dans le fichier des utilisateurs
        if(!file_put_contents('users.txt', $users)) {
            return 0; //L'opération d'écriture du fichier a échoué
        } else {
            return 1; //Tout s'est bien passé
        }
    }
    
    /**************************************************************************************/
    /****** Nom : globales                                                           ******/
    /**************************************************************************************/
    /****** Description : affiche toutes les variables globales dans <pre>           ******/
    /**************************************************************************************/
    /****** Paramètres :   aucun                                                     ******/
    /**************************************************************************************/
    /****** Valeurs retournées : code html avec les variables gloabales              ******/
    /**************************************************************************************/
    /****** Auteur : Marc L. Harnist                                                 ******/
    /**************************************************************************************/
    /****** Version : 1.0                                                            ******/
    /**************************************************************************************/
    /****** Créée le : 23/02/2018                                                    ******/
    /**************************************************************************************/
    /****** Modifiée le : 23/02/2018                                                 ******/
    /**************************************************************************************/

    public function globales(){
        echo '<pre>'; print_r($GLOBALS); echo '</pre>';
    }
    
        
    /**********************************************************************************************/
    /****** Nom : cleanDoubleBr                                                              ******/
    /**********************************************************************************************/
    /****** Description : supprimer les doublons de <br>                                     ******/
    /******                                                                                  ******/
    /**********************************************************************************************/
    /****** Paramètres : [string] chaîne de caractère avec plusieurs <br> à la suite         ******/
    /**********************************************************************************************/
    /****** Valeurs retournées : [string] néttoyée                                           ******/
    /**********************************************************************************************/
    /****** Auteur : Marc L. Harnist                                                         ******/
    /**********************************************************************************************/
    /****** Version : 1.0                                                                    ******/
    /**********************************************************************************************/
    /****** Créée le : 23/07/2018                                                            ******/
    /**********************************************************************************************/
    /****** Modifiée le : 23/07/2018                                                         ******/    /**********************************************************************************************/
    
    public function cleanDoubleBr($string){
        // var_dump($string);
        // die();
        $erase = ['\n\n','<br><br>','<br>\n<br>', '<br /><br />', '<br><br />', '<br><br /><br />', '<br /><br>', 'other needle...'];
        $string = str_replace( $erase, '', $string );//replace double break by one only
        return $string;
    }
    
    
    
    /**********************************************************************************************/
    /****** Nom : accorder_pluriels                                                          ******/
    /**********************************************************************************************/
    /****** Description : rajoute un s, un x ou rien (ex: rhinoceros a déjà un s)            ******/
    /******               et le colle dans un tableau qu'elle retourne                       ******/
    /******                                                                                  ******/
    /**********************************************************************************************/
    /****** Paramètres : [string] substentif à accorder au pluriel                           ******/
    /******              [int]    nombre                                                     ******/
    /**********************************************************************************************/
    /****** Valeurs retournées : [string] avec une lettre en plus ou rien en plus            ******/
    /**********************************************************************************************/
    /****** Auteur : Marc L. Harnist                                                         ******/
    /**********************************************************************************************/
    /****** Version : 1.0                                                                    ******/
    /**********************************************************************************************/
    /****** Créée le : 25/03/2018                                                            ******/
    /**********************************************************************************************/
    /****** Modifiée le : 25/03/2018                                                         ******/    /**********************************************************************************************/
    public static function accorder_pluriels($mot, $nombre){
        if($nombre>1){
            if($mot == "chameau"){
                $mot .= "x";
            }
            elseif($mot == "rhinoceros"){
                $mot = $mot;
            }
            else {
                $mot .= "s";
            }
        }
        return $mot;
    }   
    /* Nom : séparateur de milliers
    *  Attention: utiliser uniquement pour l'affichage!
    *  Sinon les calculs ne fontionnent plus car cette
    *  fonction: number_format() transforme int en string!
    *  Description : rajoute un espace entre les milliers d'un nombre
    *  Paramètres : [int] un grand nombre
    *  Valeurs retournées : [int]
    *  Auteur : Marc L. Harnist
    *  Version : 1.0
    *  Créée le : 15/08/2018
    *  Modifiée le : 15/08/2018
    **/
    public static function separateur($nombre){
		if(is_string($nombre))
			return $nombre.'<span class="text-danger"> (string separateur() bug)</span>';
        else {
			
            // Notation anglaise (par défaut)
            $english_format_nombre = number_format($nombre);
            // 1,235
            // Notation française
            $nombre_format_francais = number_format($nombre, 2, ',', ' ');
            // 1 234,56
            // Exemple: $nombre = 1234.5678;
            // Notation anglaise sans séparateur de milliers
            $english_format_nombre = number_format($nombre, 2, '.', '');
            // 1234.57
            return $nombre_format_francais;
		}    // Exemple: $nombre = 1234.56;
    }
    /* Nom : html_inside
    *  Description: Vérifie s'il y a du code html et bloque le code si oui
    *  Paramètres : [$posts] array qui récupère $_POST
    *  Valeurs retournées : bloque le code
    *  Auteur : Marc L. Harnist
    *  Version : 2.0 (1.0 = Database/update_table_budget_cheques($table, $posts))
    *  Créée le : 16/08/2018
    *  Modifiée le : 28/08/2018
    **/ public function html_inside($posts){

        foreach($posts as $key => $value){
            $post_saved = $posts[$key];//Besoin pour contrôle htmlspecialchars
            $posts[$key] = htmlspecialchars($value);

            //Vérification si la valeur a changé.
            if($post_saved != $posts[$key])
                //Si oui, c'est qu'il y a du code html. On bloque tout.
                exit("Blocage: il y a du code html dans votre saisie...");
        }
	}

} // Close the class
