<?php
  define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

  require DOCROOT."/includes/config.inc.php";
  require DOCROOT."/includes/debug.inc.php";
  require DOCROOT."/includes/functions.inc.php";

  $db = connectDB(DBNAME, DBUSERNAME, DBPASSWORD);

  if(isset($_POST["action"]) && $_POST["action"] == "create_event"){
      insertEvents($db, $_POST);
      redirect("accueil?success=true");
  }
  else{
      redirect("accueil?success=true");
  }
