<?php
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

debug($_POST);
session_start();
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = [];
}
if (isset($_POST["amount"]) && $_POST["amount"] > 0 && doesProductExist($db, $sku)) {
    addPostToCart();
    redirect('cart');
} else {
    redirect("product?error=true&sku=".$_POST['sku']);
}
