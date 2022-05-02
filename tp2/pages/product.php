<!doctype html>
<html class="no-js" lang="">

<?php 
define("PAGETITLE", "Produit");
define("PAGEALIAS", "product");
$db = connectDB();
if(isset($_GET["sku"])){
    $productInfo = getProductInfo($db, $_GET["sku"]);
    
    if(empty($productInfo)){
        redirect('404.html');
    }
} else {
    redirect('404.html');
}

?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php';?>

    <main class="container">
    <div  class="row">
        <div class="col-6"> 
            <img src="<?php echo '../img/'.$productInfo['sku'].'.png'?>" alt="<?php echo $productInfo['name']?>">
        </div>
        <div class="col-6">
            <h1><?php echo $productInfo['name']?></h1>
            <p><?php echo $productInfo['description']?></p>
            <p><?php echo $productInfo['price'].'$'?></p>
            <form action="/actions/add_to_cart.php" method="post">
                <input type="number" name="amount" id="amount" min="0" value="1">
                <button type="submit">Ajouter au panier</button>
                <input type="hidden" name="sku" value="<?php echo $productInfo['sku']?>">
            </form>
        </div>
    </div>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>