<?php 
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

if(!isset($_SESSION['user'])){
    redirect('signin');
}

$db = connectDB();
session_start();


unset($_SESSION['cart']);

$parsedOrder = parseOrderToArray();
$userId = getUserInfo($db, $_SESSION['user'])['id'];
addOrderToDB($db, $parsedOrder, $userId);
?>