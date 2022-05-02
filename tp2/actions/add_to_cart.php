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
if (isset($_POST["amount"]) && $_POST["amount"] > 0) {
    $found = false;
    for ($i=0; $i < count($_SESSION['cart']); $i++) { 
        if($_SESSION['cart'][$i]['sku'] == $_POST['sku']){
            $_SESSION['cart'][$i]['amount'] += $_POST['amount'];
            $found = true;
        }
    }
    //foreach ($_SESSION['cart'] as $item) {
    //    if($item['sku'] == $_POST['sku']){
    //        $item['amount'] += $_POST['amount'];
    //        debug($item);
    //        $found = true;
    //    }
    //}

    if(!$found){
        $_SESSION['cart'][count($_SESSION['cart'])] = array('sku' => $_POST['sku'], 'amount' => $_POST['amount']);
    }
    debug($_SESSION['cart']);
    redirect('cart');
} else {
    redirect("product?error=true&sku=".$_POST['sku']);
}
