<?php
        /*************************************************/
        /** OBJECT ORIENTED PROGRAMMING LANGAGE         **/
        /*************************************************/
        /** CLASS Page                                  **/
        /*************************************************/
        /** AUTHOR: Marc L. Harnist                     **/
        /*************************************************/
        /** CREATION: 19/07/2018                        **/
        /*************************************************/
        /** UPDATED:  19/07/2018                        **/
        /*************************************************/
        /** FILE USING THIS CLASS: root/index.php       **/
        /*************************************************/
        /** FUNCTION INSIDE: __construct, getPage       **/
        /*************************************************/

class Page extends Methods {

  public $header      =  "inc/header.php";
  public $footer      =  "inc/footer.php";
  public $page        =  'accueil';                    // Default page
  public $title       =  'accueil';                   // Title of default page
  public $controller  =  'controllers/accueil.php';  // Homepage controller path
  public $view        =  'view/accueil.php';        // Homepage view path
  public $file_name   =  '';                       // See above getPage()
  public $css         =  '';                      // See above getPage()

    // Constructer
    public function __construct(){
        $this->getPage();
    }

    public function getPage(){

        //  Read page name with methode GET
        if(!empty($_GET['page'])){
            $this->page       = htmlspecialchars($_GET['page']);//Get what is written in url after "page="
            $this->title      = $this->cleanPageName($this->page); // function in class Methods
            $this->file_name  = $this->page . '.php'; // page with extension to find view file
            $this->css        = $this->cssLink($this->page); //Create a css link in head for this page in models/css-link

            // If a file controller exist with this file name: we define the path of the file
            if(is_file("controllers/" . $this->file_name)) $this->controller = "controllers/" . $this->file_name;

            // if view exists define PAGE (real path) path of this file in view
            if(is_file("view/" . $this->file_name)) $this->view =  "view/" . $this->file_name;
			else
				$this->view = "view/vue_par_defaut.php";//View by default
        }
    }
}