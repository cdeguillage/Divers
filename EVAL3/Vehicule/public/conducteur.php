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



    // use \Controllers\ConducteurController as Conducteur;

    // $Conducteurs = new Conducteur;
    // $Conducteurs->viewAll();

    // Affichage du formulaire
    // require_once "forms-Conducteur.php";

    // Pied de page
    include "footer.php";
?>