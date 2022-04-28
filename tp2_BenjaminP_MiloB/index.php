<?php
  //Porte d'entrée de mon application
  //Bootstrap = démarrage de l'application web
  define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

  require DOCROOT."/includes/config.inc.php";
  require DOCROOT."/includes/debug.inc.php";
  require DOCROOT."/includes/functions.inc.php";

  if(isset($_GET["page"])){
      $filename =  DOCROOT."/pages/".$_GET["page"].".php";

      if (file_exists($filename)) {
          require DOCROOT."/pages/".$_GET["page"].".php";
      } else {
          redirect("404.html");
      }
  }else{
      require DOCROOT."/pages/accueil.php";
  }
