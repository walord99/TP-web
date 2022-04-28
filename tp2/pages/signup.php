<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=' . DBNAME . ';charset=utf8', DBUSERNAME, DBPASSWORD);
} catch (PDOException $e) {
    echo "Impossible de se connecter!";
    die();
}

$cities = obtainCities($db);
$eventTypes = obtainEventTypes($db);
$event = obtainOneEvent($db, $_GET["id"]);

debug($event);
?>

<!doctype html>
<html class="no-js" lang="">

<?php
define("PAGETITLE", "Créé un compte");
define("PAGEALIAS", "signup");
?>

<?php require DOCROOT . '/includes/head.inc.php'; ?>

<body>

    <?php require DOCROOT . '/includes/header.inc.php'; ?>

    <main class="container">
        <!-- Add your site or application content here -->
        <p>Modifier un événement.</p>

        <?php
        if(isset($_GET["success"]) && $_GET["success"] == "true"){
            echo "<p> Évenement modifié avec succès </p>";
        } 
        elseif(isset($_GET["success"]) && $_GET["success"] == "false"){
            echo "<p> Une erreur est survenue! </p>";
        }
        ?>

        <form id="rendered-form" method="post" action="/actions/create_event.php">
            <div class="rendered-form">
                <div class="formbuilder-text form-group field-name"><label for="name" class="formbuilder-text-label">Nom<span class="formbuilder-required">*</span></label><input type="text" class="form-control" name="name" access="false" id="name" required="required" aria-required="true" value='<?php echo $event['name']; ?>'></div>
                <div class="formbuilder-textarea form-group field-description"><label for="description" class="formbuilder-textarea-label">Description<br><span class="formbuilder-required">*</span></label><textarea type="textarea" class="form-control" name="description" access="false" id="description" required="required" aria-required="true" value='<?php echo $event['description']; ?>'></textarea>
                </div>
                <div class="formbuilder-date form-group field-date"><label for="date" class="formbuilder-date-label">Date<span class="formbuilder-required">*</span></label><input type="date" class="form-control" name="date" access="false" id="date" required="required" aria-required="true" value='<?php echo $event['date']; ?>'></div>
                <div class="formbuilder-number form-group field-cost"><label for="cost" class="formbuilder-number-label">Prix<span class="formbuilder-required">*</span></label><input type="number" class="form-control" name="cost" access="false" id="cost" required="required" aria-required="true" value='<?php echo $event['cost']; ?>'></div>
                <div class="formbuilder-text form-group field-website"><label for="website" class="formbuilder-text-label">Site
                        web<br><span class="formbuilder-required">*</span></label><input type="text" class="form-control" name="website" access="false" id="website" required="required" aria-required="true" value='<?php echo $event['website']; ?>'></div>
                <div class="formbuilder-number form-group field-id_event_types"><label for="id_event_types" class="formbuilder-number-label">Type d'événement<span class="formbuilder-required">*</span></label>
                    <select name="id_event_types" id="id_event_types">
                        <?php
                        //Boucle qui affiche les données
                        foreach ($eventTypes as $eventType) {
                            echo '<option value="' . $eventType['id'] . '">' . $eventType['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="formbuilder-number form-group field-id_cities"><label for="id_cities" class="formbuilder-number-label">Ville<span class="formbuilder-required">*</span></label>
                    <select name="id_cities" id="id_cities">
                        <?php
                        //Boucle qui affiche les données
                        foreach ($cities as $city) {
                            echo '<option value="' . $city['id'] . '">' . $city['name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="formbuilder-button form-group field-submit"><button type="submit" class="btn-primary btn" name="action" access="false" id="action" value="update_event">Envoyer</button></div>
            </div>
        </form>
    </main>

    <?php require DOCROOT . '/includes/footer.inc.php'; ?>

    <?php require DOCROOT . '/includes/javascript.inc.php'; ?>
</body>

</html>