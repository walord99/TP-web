<!doctype html>
<html class="no-js" lang="">

<?php 
define("PAGETITLE", "Panier");
define("PAGEALIAS", "cart");
session_start();
$db = connectDB();
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <h2>Votre panier</h2>
        <?php debug($_SESSION['cart']);
        if(!isset($_SESSION['cart']) && empty($_SESSION['cart'])){
            echo 'votre panier est vide';
        } else {
            echo '<form action="/action/order.php">';
            for ($i=0; $i < count($_SESSION['cart']); $i++) { 
                $productInfo = getProductInfo($db,$_SESSION['cart'][$i]['sku']);
                echo    '<div>
                            <img src="../img/'.$productInfo['sku'].'.png" alt="'.$productInfo['description'].'">
                            <h3?>'.$productInfo['name'].'</h3>
                            <label for="amount">Nombre d\'item: </label><input type="number" id="amount" name="amount" min="1" value="'.$_SESSION['cart'][$i]['amount'].'">
                            <p>Cout: '.$productInfo['price']*$_SESSION['cart'][$i]['amount'].'</p>
                        </div>';
            }
            echo    '<button type="submit"> 
                    </form>';
        }
        ?>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>