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
    <?php 
        if(isset($_GET['error']) && $_GET['error'] == "true"){
            echo "<div class='alert alert-error' role='alert'>Une erreur est survenu</div>";
        }
    ?>
    <div  class="row">
        <div class="col-6"> 
            <img class="img-fluid" src="<?php echo '../img/'.$productInfo['sku'].'.png'?>" alt="<?php echo $productInfo['name']?>">
        </div>
        <div class="col-6">
            <h1 class="pt-4 pb-4"><?php echo $productInfo['name']?></h1>
            <p class="mb-0"><?php echo $productInfo['description']?></p>
            <p class="mb-1 fs-2"><?php echo $productInfo['price'].'$'?></p>
            <form action="/actions/add_to_cart.php" method="post">
                <div class="container ps-0">
                    <div class="row">
                        <div class="col-3"><input class="form-control" type="number" name="amount" id="amount" min="0" value="1"></div>
                        <div class="col-2"></div>
                        <div class="col-7"><button class="btn btn-outline-primary fw-bolder" type="submit">Ajouter au panier</button></div>
                    </div>
                </div>
                <input type="hidden" name="sku" value="<?php echo $productInfo['sku']?>">
            </form>
        </div>
    </div>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>