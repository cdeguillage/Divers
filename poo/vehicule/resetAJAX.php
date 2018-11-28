<?php

    // Class:
    // require_once "Vehicule.php";
    // require_once "scenario.php";

    // Chargement automatique des classes
    function autochargement($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "class/".$nomClass . '.php';
    }
    spl_autoload_register('autochargement');

    // Création de l'objet scénario
    $scenario = new Scenario();

    // Objet reçu : $_POST
    // On l'ajoute au fichier JSON : scénario
    $scenario->json_resetfile();

    echo "<strong>< Aucune action ></strong>";
?>