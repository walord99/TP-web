<?php
$db = connectDB();

$products = getAllProduct($db);
?>

<!doctype html>
<html class="no-js" lang="">

<?php
define("PAGETITLE", "Produits");
define("PAGEALIAS", "accueil");
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <div class='row '>
        <?php
        if(isset($_GET['order']) && $_GET['order'] == "true"){
            echo "<div class='alert alert-success' role='alert'>Commande affectuer</div>";
        }
        if(isset($_GET['disconnected']) && $_GET['disconnected'] == "true"){
            echo "<div class='alert alert-success' role='alert'> Déconnecté avec succès</div>";
        }
        if(isset($_GET['connected']) && $_GET['connected'] == "true"){
            echo "<div class='alert alert-success' role='alert'> Connecté avec succès</div>";
        }
        foreach ($products as $product) {
            echo "<div class='col-4'>
                    <div class='product-div'>
                        <a class='product-link' href='product?sku=" . $product["sku"] . "'>
                            <img class='img-fluid product-img' src='../img/".$product["sku"].".png' alt='".$product["description"]."'>
                            <p class='fs-5'>".$product["name"]."</p>
                            <p class='fs-6'>".$product["price"]."$</p>
                        </a>
                    </div>    
                  </div>";
        }
        ?>
        </div>
        
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>