<?php
  define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

  require DOCROOT."/includes/config.inc.php";
  require DOCROOT."/includes/debug.inc.php";
  require DOCROOT."/includes/functions.inc.php";

  $db = connectDB();

  if(isset($_POST["action"]) && $_POST["action"] == "create_user" && validatePassword($_POST["password"], $_POST["passwordconfirm"])){
      insertUser($db, $_POST);
      debug($_POST);
      //redirect("signup?success=true");
  }
  else{
      redirect("signup?success=false");
  }