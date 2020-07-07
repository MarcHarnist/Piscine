<?php
/****                                    - Classe Explorer.php -
*                                            Marc L. Harnist
*                                               25/03/2018
*
*   MAJ 01/09/2018
*/
class Explorer extends Website{
  //Déclaration des variables
  public $dir;
  public $new_dir;
  public $dir_existe = True;
  public $first_dir_name;
  public $navigateur = "";
  public $explorateur = array();
  public $key =0;
  public $symbole_des_programmes = "__";
  public $domaine = self::DOMAIN;
  public $new_dir_creation;
  public $chemin = False;

  /** Constructeur
  * Auteur: MLHarnist
  * Date: 25/03/2018
  * MAJ: 01/09/2018
  * Particularité: vérifie si le répertoire existe grâce à la fonction
  * recherche_dir() de la ligne 113
  */public function __construct($dir = "inc"){
        parent::__construct();
        $this->dir = $dir;
        //"inc" Repertoire par défaut: les includes!
        $recherche_dir = self::recherche_dir($this->dir);//fonction ligne 113
        if($recherche_dir == True){
          $this->first_dir_name = $this->dir;
          $this->dir = $recherche_dir;
        }
    }
  /** explorateur()................................Line  52
  *   Auteur: MLHarnist
  *   Date: 25/03/2018
  *   MAJ: 01/09/2018
  *   Particularité: renvoie la liste des fichiers du dossier renseigné
  *   L'explorateur ($explorateur) est un tableau array() qui sera affichée
  *   dans la vue en second, sous l' $explorer
  */  public function explorateur($dir = "inc"){
      if (is_dir($dir)) {
          //si le dossier pointe existe
          if ($dh = opendir($dir)){
            //si il contient quelque chose
            while (($file = readdir($dh)) !== false){
              //bouclé tant que quelque chose est trouvé
              // Est-ce un repertoire ou un fichier? Si oui l'affichage sera différent
			  $path = $dir."/".$file;
			  $realpath = realpath($path);
			  // echo '<br>$realpath: '.$realpath."<br>";
              $last_modified = date("Y-m-d", filemtime($realpath));
			  
			  $description = "";//???? Pas d'info trouvée sur le web
                
              // affiche le nom et le type si ce n'est pas un element du systeme
              $type = filetype($dir."/".$file);
              $this->explorateur[$this->key]["dir"] = $dir;
              $this->explorateur[$this->key]["type"] = filetype($dir."/".$file); // $dir.$file = inc/footer.php
              $this->explorateur[$this->key]["url"] = $dir."/".$file;
              $this->explorateur[$this->key]["file_name"] = $file ;
              $this->explorateur[$this->key]['domaine'] = $this->domaine;
              $extension = pathinfo($file, PATHINFO_EXTENSION); // Récupération de l'extension
              $this->explorateur[$this->key]["extension"] = $extension;
			  $this->explorateur[$this->key]["last_modified"] = $last_modified;
			  $this->explorateur[$this->key]["size"] = filesize($realpath);
			  $this->explorateur[$this->key]["description"] = $description;
			  if($type !== 'dir'){
              }
              $this->key++;
            }//Ferme While
            closedir($dh); // on ferme la connection
          }//Ferme if($dh = opendir($dir))
      }//Ferme if (is_dir($dir)) {
    return $this->explorateur;
    }
  /* navigateur().................................Line  52
  *  Auteur: MLHarnist
  *  Date: 25/03/2018
  *  MAJ: 01/09/2018
  *  Particularité: renvoie une chaîne de caractères, un menu de navigation
  *  qui sera placé tout en haut dans la vue: "nav". Il permettra de se 
  *  promener dans les répertoires du site web.
  */ public function navigateur($dir = "inc"){
       $url = $this->website_url;
       $array = explode("/", $this->website_url);
       // $this->website_url = /light/ for http://marcharnist.fr/light/index.php
       /* "$this->navigateur" est une barre de navigation qui permettra de se promener dans les repertoires parents 
       *  c'est une variable de chaîne de caractère qui sera affichée dans la vue tout en haut de la page
       */ for($i = count($array)-1; $i >= 0; $i--){
           
            if($i == count($array)-2){
              $this->navigateur =  "<a href=\"$url\">" . $array[$i] . "</a>" . $this->navigateur;

              // Préparation d'un menu de navigation: root/dir1/dir2/dir3.../file.php
              $link_one = "<a href=\"$url\">" . $array[$i] . "</a>";
              }
            elseif($i == count($array)-3){ $this->navigateur = "<a href=\"../../$array[$i]\">" . $array[$i] . "</a>/" . $this->navigateur;}
            elseif($i == count($array)-4)
              $this->navigateur =  "<a href=\"../../../$array[$i]\">" . $array[$i] . "</a>" . $this->navigateur;
            elseif($i == count($array)-5)
            $this->navigateur =  "<a href=\"../../../../$array[$i]\">" . $array[$i] . "</a>" . $this->navigateur;
          } //Ferme for($i = count($array); $i == 1; $i--){
        $this->navigateur .= "/<a href=\"" . $this->dir . "\">".$this->dir."</a>";
        return $this->navigateur;
  }
  /** recherche_dir()........................line..113
  * Auteur: MLH
  * Date: 25/03/2018
  * Particularité:recherche du fichier si le chemin est faux
  * Valeur retournée: tableau array() avec le bon chemin du repertoire ou Faux (false)
  */public function recherche_dir(){
        if(is_dir($this->dir) == False){//Si le chemin est faux
          for($i = 20; is_dir($this->dir) == False; $i--){
            $this->dir = "../" . $this->dir;
            if($i == 0){
                $this->dir_existe = False;
                return;
                }
            }
          $this->new_dir_creation = True;
          return $this->new_dir;
        }
        else
            $this->chemin = True; 
    }//Ferme function recherche_dir()
}//Ferme la classe Explorer