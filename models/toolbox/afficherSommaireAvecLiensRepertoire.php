Menu avec liens:

<ol>
    <?php 
    $dir = "./";
    //  si le dossier pointe existe
    if (is_dir($dir)) {
    
       // si il contient quelque chose
       if ($dh = opendir($dir)) {
    
           // boucler tant que quelque chose est trouve
           while (($file = readdir($dh)) !== false) {
    
               // affiche le nom et le type si ce n'est pas un element du systeme
			   $type = filetype($dir.$file);
               if( $file != '.' && $file != '..') {
    			   if($type == 'dir'){
                       $texte = "Repertoire : <a href=\"./$file\">$file</a>";
    			   }else{
                     $texte = "<a href=\"./$file\">$file</a></li>";
				   }
				echo "<li>$texte</li>";
               }
           }
           // on ferme la connection
           closedir($dh);
       }
    }
    ?>
</ol>
