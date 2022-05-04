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
        <?php debug($_SESSION['cart']);
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        if(empty($_SESSION['cart'])){
            echo 'votre panier est vide';
        } else {       
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                $productInfo = getProductInfo($db,$_SESSION['cart'][$i]['sku']);
                echo '  <form action="/actions/remove_from_cart.php" method="post">
                        <div>
                            <img class="img-fluid" src="../img/'.$productInfo['sku'].'.png" alt="'.$productInfo['description'].'">
                            <h3?>'.$productInfo['name'].'</h3>
                            <p>Nombre d\'item: '.$_SESSION['cart'][$i]['amount'].'</p>
                            <p>Cout: '.$productInfo['price']*$_SESSION['cart'][$i]['amount'].'</p>
                            <input type="hidden" id="sku" name="sku" value="'.$productInfo['sku'].'">
                            <button type="submit">Suprimer du panier</button>
                        </div>
                        </form>';
                        
            }
            echo '<form action="/actions/order.php" method="post">';
            for ($i=0; $i < count($_SESSION['cart']); $i++){
                echo '  <input type="hidden" id="sku" name="sku'.$i.'" value="'.$_SESSION['cart'][$i]['sku'].'">
                        <input type="hidden" id="amount" name="amount'.$i.'" value="'.$_SESSION['cart'][$i]['amount'].'">';
            }
            echo '  <button type="submit">Passer la commande</button>
                    </form>';
        }
        ?>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>