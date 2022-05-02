<?php 
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

session_start();
debug($_POST);

if(isset($_SESSION['cart'])){
    for ($i=0; $i < count($_SESSION['cart']); $i++) { 
        if($_SESSION['cart'][$i]['sku'] == $_POST['sku']){
            unset($_SESSION['cart'][$i]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
    debug($_SESSION['cart']);
    redirect('cart');
}
redirect('cart?error=true')
?>