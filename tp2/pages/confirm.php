<!doctype html>
<html class="no-js" lang="">

<?php 
define("PAGETITLE", "Confirmation");
define("PAGEALIAS", "model");
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <div class="row pt-3">
            <div class="col-2"></div>
            <div class="col-8 text-center"><h1>Merci pour votre commande !</h1></div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col text-center pt-3 pb-3"><a href="accueil"><button class="btn btn-outline-primary fw-bolder">Continuer de magasiner</button></a></div>
            <div class="col"></div>
        </div>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>