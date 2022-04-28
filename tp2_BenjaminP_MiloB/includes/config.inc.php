<?php
    declare(strict_types=1);

    define("SITEURL", $_SERVER["HTTP_HOST"]);
    define("SITESTATE", "dev"); //dev ou prod

    define("SITETITLE", "La baie Ourson");
    define("SITEDESC", "La baie Ourson - Site de commande de vêtements");
    define("SITEH1", "La baie Ourson");
    define("SITEOWNER", "Copyright © 2022 - Benjamin Plante et Milo Boucher");

    define("VALEURINITIALEDE", 1);
    define("VALEURDE20", 20);

    // Section BD

    define("DBNAME", "baie_ourson");
    define("DBUSERNAME", "mboucher");
    define("DBPASSWORD", "ADMIN");
?>