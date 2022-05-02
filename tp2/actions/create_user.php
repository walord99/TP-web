<?php
  define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

  require DOCROOT."/includes/config.inc.php";
  require DOCROOT."/includes/debug.inc.php";
  require DOCROOT."/includes/functions.inc.php";

  $db = connectDB();

  if(isset($_POST["action"]) && $_POST["action"] == "create_user" && validatePasswordConfirmation($_POST["password"], $_POST["passwordconfirm"])){
      insertUser($db);
      redirect("signup?success=true");
  }
  else{
      redirect("signup?success=false");
  }
