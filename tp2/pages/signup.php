<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
} catch (PDOException $e) {
    echo "Impossible de se connecter!";
    die();
}

?>

<!doctype html>
<html class="no-js" lang="">

<?php
define("PAGETITLE", "Créer un compte");
define("PAGEALIAS", "signup");
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

        <form id="rendered-form" method="post" action="/actions/create_user.php">
            <div class="rendered-form">
                <p class="fs-4 signup-subtitle">Information sur le compte</p>
                
                <div class="formbuilder-text form-group field-email row">
                    <div class="col-3"><label for="email" class="formbuilder-text-label">Email : </label></div>
                    <div class="col-9"><input type="email" class="form-control" name="email" access="false" id="email" required="required" aria-required="true"></div>
                </div>
                <div class="formbuilder-text form-group field-password row">
                    <div class="col-3"><label for="password" class="formbuilder-text-label">Mot de passe : </label></div>
                    <div class="col-9"><input type="password" class="form-control" name="password" access="false" id="password" required="true" aria-required="true"></div>
                </div>
                <div class="formbuilder-text form-group field-passwordconfirm row">
                    <div class="col-3"><label for="passwordconfirm" class="formbuilder-text-label">Confirmation du mot de passe : </label></div>
                    <div class="col-9"><input type="password" class="form-control" name="passwordconfirm" access="false" id="passwordconfirm" required="true" aria-required="true"></div>
                </div>

                <p class="fs-4 signup-subtitle">Information sur la livraison</p>

                <div class="formbuilder-text form-group field-first_name row">
                    <div class="col-3"><label for="first_name" class="formbuilder-text-label">Prénom : </label></div>
                    <div class="col-9"><input type="text" class="form-control" name="first_name" access="false" id="first_name" required="required" aria-required="true"></div>
                </div>
                <div class="formbuilder-text form-group field-last_name row">
                    <div class="col-3"><label for="last_name" class="formbuilder-text-label">Nom : </label></div>
                    <div class="col-9"><input type="text" class="form-control" name="last_name" access="false" id="last_name" required="required" aria-required="true"></div>
                </div>
                <div class="formbuilder-text form-group field-shipping_adress row">
                    <div class="col-3"><label for="shipping_adress" class="formbuilder-text-label">Adresse de livraison : </label></div>
                    <div class="col-9"><input type="text" class="form-control" name="shipping_adress" access="false" id="shipping_adress" required="required" aria-required="true"></div>
                </div>
                <div class="formbuilder-button form-group field-submit row">
                    <div class="col-10"></div>
                    <div class="col-2 signup-submit"><button type="submit" class="btn-outline-primary btn" name="action" access="false" id="action" value="create_user">Créer le compte</button></div>
                </div>
            </div>
        </form>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>