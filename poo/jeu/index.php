<?php

/**
 * Street Fighters reborn !
 */

require_once "Personnage.php";

// Création des personnages
$batman = new Personnage("Batman", Personnage::MEDIUM);
$superman = new Personnage("Superman", Personnage::NOVICE);

echo "<h1><u>".$batman->name." <i>vs</i> ".$superman->name."</u></h1>";

echo "<h3>".$batman->name."</h3>";
echo "<div>Point de vie : ".$batman->life."</div>";
echo "<div>Expérience : ".$batman->xp."</div>";

echo "<h3>".$superman->name."</h3>";
echo "<div>Point de vie : ".$superman->life."</div>";
echo "<div>Expérience : ".$superman->xp."</div><br/>";

echo "<hr>";

echo "<h2>Début du combat !</h2>";
echo "<div>".$batman->SayHello($superman)."</div>";
echo "<div>".$superman->SayHello($batman)."</div><br />";

echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Batman attaque Superman</h3>";
$batman->Attack($superman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Superman riposte sur Batman : Attaque + super-attaque</h3>";
$superman->Attack($batman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";
$superman->SuperAttack($batman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Une magnifique super-attaque de Batman !!</h3>";
$batman->SuperAttack($superman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Superman pleure sa maman... et se soigne</h3>";
$superman->Care();
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Batman utilise son attaque secrète (mais... dans le vent)</h3>";
$superman->SecretAttack($batman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Superman (la tête dans le sac) se défend avec une double attaque... trop pitoyable :p.</h3>";
$superman->Attack($batman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";
$superman->Attack($batman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";

echo "<h3>Batman lance une simple attaque puis achève l'alien avec une attaque secrète.</h3>";
$batman->Attack($superman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";
$batman->SecretAttack($superman);
echo "<div><strong>[[[ Batman | </strong>".$batman->life."  //\\\\  ".$superman->life."<strong> | Superman ]]]</strong></div><br />";


echo "<h3>Batman a son expérience qui augmente !</h3>";
$batman->LevelUp();
echo "<div>Expérience : ".$batman->xp."</div>";


echo "<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
?>