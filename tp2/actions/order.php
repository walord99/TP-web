<?php 
define('DOCROOT', $_SERVER['DOCUMENT_ROOT']);

require DOCROOT . "/includes/config.inc.php";
require DOCROOT . "/includes/debug.inc.php";
require DOCROOT . "/includes/functions.inc.php";

$db = connectDB();
session_start();

if(!isset($_SESSION['user'])){
    redirect('signin?cart=true');
}

unset($_SESSION['cart']);

$parsedOrder = parseOrderToArray();
$userId = getUserInfo($db, $_SESSION['user'])['id'];
$error = false;
debug($parsedOrder);
debug($userId);
for ($i=0; $i < count($parsedOrder); $i++) { 
    if(!doesProductExist($db, $parsedOrder[$i]['sku'])){
        $error = true;
    }
}
if(!$error){
    addOrderToDB($db, $parsedOrder, $userId);
    redirect('accueil?order=true');
}
redirect('cart?error=true');
?>