"use strict"

var palet          = $("#palet");
var boule          = $("#boule");
var brique         = $(".brique");
var elemBrique     = $('<div class="brique"></div>');
var elemBriques    = $(".briques");
var elemNbBriques  = $("#nbbriques");

var createdBriques = false;

var size_BriqueX = Math.floor(brique.css("width").replace("px", ""));   // Taille X d'une brique
var size_BriqueY = Math.floor(brique.css("height").replace("px", ""));   // Taille Y d'une brique

console.log(size_BriqueX);
console.log(size_BriqueY);

var nbBriques      = 0;

var direction_X    = 1;   // 
var direction_Y    = -1;

// Chargement de la page / gestion des touches / Gestion du mouvement
$(document).ready(function () {

    // Affichage des briques
    createBriques();

    // Affichage de la boule
    moveBoule();

    // Gestion des touches et mouvement des objets
    $(this).on({
        // Déplacement du carré
        keypress: function (e) {
            // console.log("charCode : " + e.charCode);
            var palet_left = Math.floor(palet.css("left").replace("px", ""));
            switch (e.charCode) {
                case 32:  // Barre espace
                    break;
                case 113:  // Droite  (D)
                    if (palet_left > 0)
                        palet.css("left", (palet_left - 20) + "px");
                    break;
                case 100:  // Gauche  (Q)
                    if (palet_left < 520)
                        palet.css("left", (palet_left + 20) + "px");
                    break;
                // default:
                //     console.log("charCode default : " + e.charCode);
            }
        }
    })

});

// Création du tableau
function createBriques() {

    // Tableau déjà généré ?
    if (!createdBriques)
    {
        for (let brique_X = 0; brique_X < 10; brique_X++)  // axe X
        {
            for (let brique_Y = 0; brique_Y < 10; brique_Y++)  // axe Y
            {
                var elemBrique = $('<div class="brique"></div>');
                    elemBrique.attr("id", "brique-" + brique_X + "-" + brique_Y);  // Identifiant/Emplacement de la brique (grille)
                    elemBrique.css("left", (brique_X * size_BriqueX));
                    elemBrique.css("top", (brique_Y * size_BriqueY));
                    elemBriques.append(elemBrique);

                    // Calcul du nombre de briques à exploser
                    nbBriques += 1;
                    elemNbBriques.text("Briques : " + nbBriques);
            }
        }
        createdBriques = true;
    }
}

// Mouvement de la boule
function moveBoule()
{
    var boule_X = Math.floor(boule.css("left").replace("px", ""));
    var boule_Y = Math.floor(boule.css("top").replace("px", ""));

    var palet_left = Math.floor(palet.css("left").replace("px", ""));

    // Mouvement automatique de la boule
    var myTimer = setTimeout( function() {moveBoule();}, 1);

    // Changement de direction
    if ((boule_X < 0) || (boule_X > 593))
        direction_X = -(direction_X);
    if (boule_Y < 0)
        direction_Y = -(direction_Y);

    boule_X = boule_X + direction_X;
    boule_Y = boule_Y + direction_Y;

    // Affichage de la boule
    boule.css("left", boule_X + "px");
    boule.css("top", boule_Y + "px");


    // Rebondissement sur palet ?
    if ((boule_Y > 490) && (boule_X > (palet_left)) && (boule_X < (palet_left+80)))
    {
        direction_Y = -1;
    }


    // Collision avec une brique
    if (isCollision(boule_X, boule_Y))
    {
        // FIN DE PARTIE - FELICITATIONS !!!
        if (nbBriques == 0)
        {
            // Boule immobile
            direction_X = 0;
            direction_Y = 0;

            // Fin d'animation de la boule
            clearTimeout(myTimer);

            // G A M E   O V E R
            alert("!!!!               C O N G R A T U L A T I O N S               !!!!");
        }

    }


    // Partie perdue !!!
    if (boule_Y > 550)
    {
        // Boule immobile
        direction_X = 0;
        direction_Y = 0;

        // Fin d'animation de la boule
        clearTimeout(myTimer);

        // G A M E   O V E R
        alert("!!!            G A M E     O V E R            !!!");
    }
}

// Collision entre la boule et la brique
function isCollision(b_X, b_Y)
{
    // Traverse-t-on le container briques ?
    // 50 50 498 + 50 198 + 50
    if (  (b_X > 50) && (b_Y < 548)  // X
       && (b_Y > 50) && (b_Y < 248)  // Y
        )
    {
        // Détection emplacement brique
        var emp_briqueX = Math.floor((b_X - 50) / size_BriqueX);
        var emp_briqueY = Math.floor((b_Y - 50) / size_BriqueY);

        // Nom de la DIV brique à supprimer selon son emplacement
        var deletedBrique = "#brique-" + emp_briqueX + "-" + emp_briqueY;
        // console.log("brique-" + emp_briqueX + "-" + emp_briqueY);

        // La brique a-t-elle déjà été effacé ?
        // console.log($(deletedBrique).css("display"));
        if ($(deletedBrique).css("display") != undefined)
        {

            // Effacement de la DIV brique   (le remove empêche l'affichage du fondu -dommage Eliane-)
            // $(deletedBrique).css("background-color", "red");
            // $(deletedBrique).fadeOut(350);

            // Calcul du nombre de briques à exploser
            nbBriques -= 1;
            elemNbBriques.text("Briques : " + nbBriques);

            // Effacement de la DIV brique
            $(deletedBrique).remove();

            // Retourne la suppression d'une brique
            // Retourne true si brique trouvée sinon false
            return ($(deletedBrique).css("display") == undefined);
        }
       
    }

    return false;
}

