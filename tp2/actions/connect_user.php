<?php
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

$db = connectDB();

if (isset($_POST["action"]) && $_POST["action"] == "connect_user") {
    if (emailPasswordValidation($db, $_POST['email'], $_POST['password'])) {
        session_start();
        connectUser($_POST['email']);
        redirect("accueil?connected=true");
    }
    redirect("signin?success=false");
} else {
    redirect("signin?success=false");
}
