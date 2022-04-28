<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
} catch (PDOException $e) {
    echo "Impossible de se connecter!";
    die();
}

$products = getAllProduct($db);
?>

<!doctype html>
<html class="no-js" lang="">

<?php
define("PAGETITLE", "Accueil");
define("PAGEALIAS", "accueil");
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <div class='row'>
        <?php
        //Boucle qui affiche les données
        foreach ($products as $product) {
            echo "<div class='col-4'>
                    <a href='product?sku=" . $product["sku"] . "'>
                        <img src='../img/".$product["sku"].".png' alt='".$product["description"]."'>".$product["name"]."</br>
                        ".$product["price"]."
                    </a>
                  </div>";
        }
        ?>
        </div>
        
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>