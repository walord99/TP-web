<?php
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

session_start();
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = [];
}
if (isset($_POST["amount"]) && $_POST["amount"] > 0 && doesProductExist($_POST['sku'])) {
    $_SESSION['cart'] = addItemForCart($_POST, $_SESSION['cart']);
    redirect('cart');
} else {
    redirect("product?error=true&sku=".$_POST['sku']);
}
