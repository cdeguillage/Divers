<?php

require_once "Personnage.php";

$personnage = new Personnage("Personnage", 54);
echo "<div>".$personnage->prenom."</div>";
echo "<div>".$personnage->age."</div>";

var_dump($personnage);

echo "<div>".$personnage->sayBonjour("Claire")."</div>";
echo "<div>".$personnage->sayBonjour("Samantha")."</div>";
echo "<div>".$personnage->sayAuRevoir()."</div>";

echo "<div>".$personnage::BONJOUR."</div>";
echo "<div>".$personnage::AU_REVOIR."</div>";
echo "<div>".Personnage::BONJOUR."</div>";


$nathan = new Personnage("Nathan", 30);
echo "<div>".$nathan->prenom."==>".$nathan->age."</div>";

var_dump($nathan);

$christophe = new Personnage("Christophe", 45);
echo "<div>".$christophe->prenom."==>".$christophe->age."</div>";

var_dump($christophe);


var_dump($nathan);
var_dump($christophe);


