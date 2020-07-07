<?php
/****                      - CLASSE Alpha.php -
*                             Marc L. Harnist
*                               30/08/2018
*
*    MAJ: Website coupé en deux. Alpha = ancien fichier de configuration
*    du site web (root/model/config/config.php).  Les const TABLE_MEMBER
*    et TABLE_PAGES sont déplacées ici.  La classe "Database" est un en-
*    semble de programmes (des méthodes) sans aucune donnée particulière.
*
*    PARTICULARITE
*      Cette classe est unique, elle contient les attributs propres au site
*      web: il ne faut pas la copier pour un autre site sans la modifier...
*
*    IMPORTANT
*      Toutes les constantes et variables du site renseignées ici.
*      Aucune autre classe ne doit contenir de donnée particulière
*      afin de limiter la modification de ce seul fichier pour l'installation du
*      CMS Light dans un site web.
*      Ce fichier remplace "config.php" qui était protégé par un fichier
*      ".htaccess deny from all"
*
*    Methodes
*     define_database_ids_and_website_url()..line 50
*     connect_to_database()..................line 77
*/
class Alpha{
    //Constantes particulières et propres à ce site web
    const OWNER_MAIL = "harnist.isabelle@gmail.com"; // Pour formulaire contact
    const OWNER = "Isabelle Harnist"; // Propriétaire du site web
    const WEBMASTER = "Marc L. Harnist"; // Pour root/inc/footer.php
    const WEBMASTER_MAIL = "marcharnistpro@gmail.com";
    const NAME = "Piscine"; // Nom du site pour header: root/inc/header.php
    const DOMAIN = "piscine"; // Nom de domaine pour __explorer.php
    const SUBTITLE = "Sortie piscine"; // Sous-titre

    // Les tables de la base de données inutile de créer notebook_members
    const TABLE_MEMBER = 'light_members';// utiliser une seule table!
    const TABLE_PAGES  = 'piscine_pages';

    private $db_host;                      // pour la classe "Database"
    private $db_name   = 'marcharnssmarc'; // pour la classe "Database"
    private $db_username;                  // pour la classe "Database"
    private $db_password;                  // pour la classe "Database"

    public function __construct(){
        // Démarrage de la fonction defineDatabaseIds
        $this->define_database_ids_and_website_url();
    }
/** define_database_ids_and_website_url()...line 50
*	Description : permet d'afficher un message en css dans un contrôleur
*	Paramètres: $titre, $message, $background-color.
*	Valeurs retournées : message avec css
*/  public function define_database_ids_and_website_url(){
        // Online URL
        if(isset($_SERVER['SCRIPT_URI'])){
            $this->website_url = $_SERVER['SCRIPT_URI']; // online url

            //Online data base id(db)
            $this->db_host = 'marcharnssmarc.mysql.db';// pour la classe "Database"
            $this->db_username = 'marcharnssmarc';     // pour la classe "Database"
            $this->db_password = '***';         // pour la classe "Database"
        }
        else{ // We are on localhost on PC
            $this->website_url = $_SERVER['SCRIPT_NAME'];//easyPhp url

            //On easyPhp data base id(db)
            $this->db_host = 'Localhost';    // pour la classe "Database"
            $this->db_username = 'root';     // pour la classe "Database"
            $this->db_password = '';         // pour la classe "Database"
        }
        $this->website_url = str_replace('index.php', '',$this->website_url);
        $this->page_url = $this->website_url .  'index.php?page='; // in a lot of files
        $this->file_url = $this->website_url .  'index.php?file='; // in __explorer
        $this->img_url = $this->website_url .  'img/'; // in __pages-edition, carrousel
    }
/** connect_to_database()..................line 77
*	Description : connexion à la base de donnée
*	Paramètres: identifiants de connexion "privés"
*	Valeurs retournées : objet PDO
*   Version : 1.0
*   Créée le : 21/03/2018
*   Modifiée le : 26/03/2018
*/  protected function connect_to_database(){
        try {
			$this->db = new PDO('mysql:host=' . $this->db_host . '; dbname=' . $this->db_name, $this->db_username, $this->db_password);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$this->db->exec("SET CHARACTER SET utf8");
		} catch(PDOException $e) {
			echo '"Note du webmaster ' . $this->webmaster . ': Erreur de connection à la base de donnée : ' . $e->getMessage() . '"';
			die();
		}
    }
/** connect_to_database_saving()..................line 93
*	Description : connexion à la base de donnée
*	Paramètres: identifiants de connexion "privés"
*	Valeurs retournées : objet PDO
*   Version : 1.0
*   Créée le : 21/03/2018
*   Modifiée le : 26/03/2018
*/  protected function connect_to_database_saving(){
		$conn = new PDO('mysql:host=' . $this->db_host . '; dbname=' . $this->db_name, $this->db_username, $this->db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
     return $conn;
    }
//Getters.........................................81
protected function get_db_host(){return $this->db_host;}
protected function get_db_name(){return $this->db_name;}

}