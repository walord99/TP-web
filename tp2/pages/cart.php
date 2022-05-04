<!doctype html>
<html class="no-js" lang="">

<?php 
define("PAGETITLE", "Panier");
define("PAGEALIAS", "cart");
$db = connectDB();
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>
    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <h2>Votre panier</h2>
        <?php //debug($_SESSION['cart']);
        if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
            echo 'votre panier est vide';
        } else {       
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                $productInfo = getProductInfo($db,$_SESSION['cart'][$i]['sku']);
                echo '  <form class="cart-item" action="/actions/remove_from_cart.php" method="post">
                            <div class="row mb-3 ">
                                <div class="col-2 mt-2 mb-2">
                                    <img class="img-fluid" src="../img/'.$productInfo['sku'].'.png" alt="'.$productInfo['description'].'">
                                </div>
                                <div class="col-4 mt-2">
                                    <h3 class="fs-4">'.$productInfo['name'].'</h3>
                                    <p>x'.$_SESSION['cart'][$i]['amount'].'</p>
                                </div>
                                <div class="col-3">
                                </div>
                                <div class="col-3 mt-2 mb-2 d-flex align-items-end flex-column">
                                    <p class="fs-5 fw-bolder">Cout: '.$productInfo['price']*$_SESSION['cart'][$i]['amount'].'$</p>
                                    <input type="hidden" id="sku" name="sku" value="'.$productInfo['sku'].'">
                                    <button class="btn btn-outline-primary fw-bolder mt-auto" type="submit">Suprimer du panier</button>
                                </div>
                            </div>
                        </form>';
                        
            }
            echo '  <form action="/actions/order.php" method="post">';
            for ($i=0; $i < count($_SESSION['cart']); $i++){
                echo '  <input type="hidden" id="sku" name="sku'.$i.'" value="'.$_SESSION['cart'][$i]['sku'].'">
                        <input type="hidden" id="amount" name="amount'.$i.'" value="'.$_SESSION['cart'][$i]['amount'].'">';
            }   
            echo '      <div class="row">
                            <div class="col-3">   
                                <p class="fs-4 fw-bolder">Sous total</p>
                            </div>
                            <div class="col-6">
                            </div>
                            <div class="col-3 d-flex align-items-end flex-column">
                                </br>
                                <p class="fs-3 fw-bolder">'.addCartPrice($db).'$</p>
                                <button class="btn btn-outline-primary fw-bolder" type="submit">Passer la commande</button>
                            </div>
                        </div>
                    </form>';
        }
        ?>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>