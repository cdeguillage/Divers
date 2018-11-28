<?php

    // Autoload
    function autoload($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "class/".$nomClass . '.php';
    }
    spl_autoload_register('autoload');


    // Déclaration EUROPE
    $europa = new CountryCapital("datas/europa.json");

    $capitaleFrance = $europa->getCapitalByCountry("France");
    echo $capitaleFrance;

    $PaysBratislava = $europa->getCountryByCapital("Bratislava");
    echo $PaysBratislava;

    $europa->getCapitals();

    // Déclaration AMERIQUE
    $america = new CountryCapital("america.json");

