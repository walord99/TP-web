<!doctype html>
<html class="no-js" lang="">

<?php 
session_start();
define("PAGETITLE", "Produit");
define("PAGEALIAS", "product");
$db = connectDB();
if(isset($_GET["sku"])){
    $productInfo = getProductInfo($db, $_GET["sku"]);
    debug($productInfo);
    
    if(empty($productInfo)){
        redirect('404.html');
    }
} else {
    redirect('404.html');
}
debug($_POST);
if(isset($_GET['success']) && $_GET['success'] == true){
    redirect($_SERVER['PHP_SELF']);
} else {
    if(isset($_POST['amount']) && $_POST['amount'] >= 0){
        
    }
}
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <img src="<?php echo '../img/'.$productInfo['sku'].'.png'?>" alt="">
        <h1><?php echo $productInfo['name']?></h1>
        <p><?php echo $productInfo['description']?></p>
        <p><?php echo $productInfo['price'].'$'?></p>
        <form action="" method="post">
            <input type="number" name="amount" id="amount" min="0" value="1">
            <button type="submit">Ajouter au panier</button>
        </form>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>