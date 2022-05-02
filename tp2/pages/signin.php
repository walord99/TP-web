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
        <!-- Add your site or application content here -->
        <p class="fs-2 signup-title"><?php echo PAGETITLE; ?></p>

        <?php
        if(isset($_GET["success"]) && $_GET["success"] == "true"){
           redirect("signin.php?accountcreated=true");
        } 
        elseif(isset($_GET["success"]) && $_GET["success"] == "false"){
            echo "<p> Une erreur est survenue! </p>";
        }
        ?>

        <form id="rendered-form" method="post" action="/actions/create_event.php">
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
                    <div class="col-2 signup-submit"><button type="submit" class="btn-outline-primary btn" name="action" access="false" id="action" value="login_user">Se connecter</button></div>
                </div>
            </div>
        </form>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>