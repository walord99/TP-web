<?php 
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

$db = connectDB();
session_start();


unset($_SESSION['cart']);

$parsedOrder = parseOrderToArray();
$userId = getUserInfo($db, $_SESSION['user'])['id'];
addOrderToDB($db, $parsedOrder, $userId);
?>