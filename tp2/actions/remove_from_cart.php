<?php 
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

$db = connectDB();
session_start();

debug($_POST);
if(isset($_SESSION['cart']) && doesProductExist($db, $_POST['sku'])){
    $_SESSION['cart'] = removeFromCart($_SESSION['cart'], $_POST['sku']);
    redirect('cart');
}
redirect('cart?error=true')
?>