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

    // Déclaration des voitures
    require_once "Vehicule_declaration_PHP.php";

    // Création de l'objet scénario
    $scenario = new Scenario();

    // Objet reçu : $_POST
    // On l'ajoute au fichier JSON : scénario
    $scenario->json_addfile($_POST);

    // Lecture du fichier scénario
    $scenario_array = $scenario->json_readfile();

    // Traitement du fichier JSON décodé
    for($i = 0; $i < count($scenario_array); $i++)
    {
        // Initialisation
        $instance = ${$scenario_array[$i]->{'instance'}};
        $fonction = $scenario_array[$i]->{'fonction'};
        $param1 = empty($scenario_array[$i]->{'par1'}) ? array() : array($scenario_array[$i]->{'par1'});

        // On exécute la méthode du scénario !
        call_user_func_array(array($instance, $fonction), $param1);
    }

?>