<?php

    // Entete de page
    include "header.php";

    // Models
    function autoload_models($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "../private/".$nomClass . '.php';
    }
    spl_autoload_register('autoload_models');

    // Controllers
    function autoload_controllers($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "../private/".$nomClass . '.php';
    }
    spl_autoload_register('autoload_controllers');



    use \Controllers\VehiculeController as Vehicule;

    $vehicules = new Vehicule;
    $vehicules->viewAll();

    // Affichage du formulaire
    // require_once "forms-vehicule.php";

    // Pied de page
    include "footer.php";
?>