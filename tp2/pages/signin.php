<?php
    $db = connectDB();
?>

<!doctype html>
<html class="no-js" lang="">

<?php
define("PAGETITLE", "Se connecter");
define("PAGEALIAS", "signin");
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <p class="fs-2 signup-title"><?php echo PAGETITLE; ?></p>

        <?php
        if(isset($_GET["accountcreated"]) && $_GET["accountcreated"] == "true"){
           echo "<div class='alert alert-success' role='alert'> Compte créé avec succès, veuillez vous connecter</div>";
        }

        if(isset($_GET["success"]) && $_GET["success"] == "true"){
            echo "<div class='alert alert-success' role='alert'> Compte créé avec succès, veuillez vous connecter</div>";
            redirect("accueil?connected=true");
        } elseif(isset($_GET["success"]) && $_GET["success"] == "false"){
            echo "<div class='alert alert-danger' role='alert'>Une erreur est survenue</div>";
        }
        ?>

        <form id="rendered-form" method="post" action="/actions/connect_user.php<?php if(isset($_GET['cart']) && $_GET['cart'] == true) echo '?cart=true'?>">
            <div class="rendered-form">
                <div class="formbuilder-text form-group field-email row">
                    <div class="col-3"><label for="email" class="formbuilder-text-label">Email : </label></div>
                    <div class="col-9"><input type="email" class="form-control" name="email" access="false" id="email" required="required" aria-required="true"></div>
                </div>
                <div class="formbuilder-text form-group field-password row">
                    <div class="col-3"><label for="password" class="formbuilder-text-label">Mot de passe : </label></div>
                    <div class="col-9"><input type="password" class="form-control" name="password" access="false" id="password" required="true" aria-required="true"></div>
                </div>
                <div class="formbuilder-button form-group field-submit row">
                    <div class="col-10"></div>
                    <div class="col-2 signup-submit"><button type="submit" class="btn-outline-primary btn" name="action" access="false" id="action" value="connect_user">Se connecter</button></div>
                </div>
            </div>
        </form>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>