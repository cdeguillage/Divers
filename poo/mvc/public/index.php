<?php

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

use \Controllers\ArticleController as Article;
use \Controllers\User;

$articles = new Article;
$articles->viewAll();


