<?php

session_start(); // On veut utiliser les sessions sur la page

var_dump($_SESSION); // Tableau vide

$countries = ['fr', 'it'];
$_SESSION['countries'] = $countries;
var_dump($countries);

// Pour les cookies (session qui dure indéfiniment et sur la machine cliente)
var_dump($_COOKIES);
setcookie('cookie', 'test', time()+60*60*24*365);
setcookie('cookie', 'test', time()-60*60*24*365);
