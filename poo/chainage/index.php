<?php

    // Autoload
    function autoload($nomClass) {
        $nomClass = preg_replace("/\\\/", "/", $nomClass);
        include_once "class/".$nomClass . '.php';
    }
    spl_autoload_register('autoload');


    $hello = "Hello World";
    $text = new Texte();
    echo $text->set($hello)->print()."<br>";
    echo $text->set($hello)->bold()->print()."<br>";
    echo $text->set($hello)->italic()->print()."<br>";
    echo $text->set($hello)->strike()->print()."<br>";
    echo $text->set($hello)->italic()->bold()->strike()->print()."<br>";
