"use strict"

// =============================
// Flux JSON
// =============================
var sourceHTTP = "http://osw3.net/tp/";
var sourceJSONVehicules = "vehicules.php";
var sourceJSONModele = "";

// Ressources
var resSite = "assets/";

// Variables déclaration
var vehicules = {};
var modeles = {};

// =============================
// Retrouver Elements
// =============================
var elem_vehiculesList = $("#vehicules-list");
var elem_modelesList = $("#modeles-list");

// =============================
// PROCESSUS
// =============================
$(document).ready(function () {
    
    // =============================
    // Retrouver vehicules
    // =============================
    setVehicules(sourceHTTP + sourceJSONVehicules);

    /**
     * Set setVehicules
     * 
     * @param (string) url adresse du fichier vehicules
     * @return (object) Vehicules
     */
    function setVehicules(url) {
        // On récupére les données des véhicules
        $.ajax({
            method: "GET", // ou POST
            url: url,
            dataType: "json",
            success: function (response) {
                vehicules = response;
                parseVehicules();
            },
            error: function () {
                alert("Oops an error has occured.");
            }
        })
    }

    /**
     * Get vehicules
     * 
     * @param
     * @return (object) vehicules
     */
    function getVehicules() {
        return vehicules;
    }

    /**
     * Set setModele
     * 
     * @param (string) url adresse du fichier modele
     * @return (object) Modeles
     */
    function setModele(url) {
        // On récupére les données des modeles
        $.ajax({
            method: "GET", // ou POST
            url: url,
            dataType: "json",
            success: function (response) {
                modeles = response;
                parseModeles();
            },
            error: function () {
                alert("Oops an error has occured.");
            }
        })
    }

    /**
     * Get modeles
     * 
     * @param
     * @return (object) modeles
     */
    function getModeles() {
        return modeles;
    }


    /**
     * parseVehicules
     * 
     * @param
     * @return
     */
    function parseVehicules() {

        // On va chercher la liste des vehicules
        var listeVehicules = getVehicules();

        // Création de la liste des vehicules
        $.each(listeVehicules, function (key, value) {
            // Créer une playlist button
            var elem_plVehicule = $("<a></a>");
            elem_plVehicule.addClass("dropdown-item");
            elem_plVehicule.html(value.constructor);
            elem_plVehicule.attr("data-keyvehicule", key);
            // elem_plVehicule.attr("data-vehicule", value.constructor);
            elem_vehiculesList.append(elem_plVehicule);
        });

        // Clic sur le bouton d'un vehicule
        $("#vehicules-list > a").on("click", function () {

            var indexVehicule = $(this).data("keyvehicule");
            var imgVehicule = listeVehicules[indexVehicule].brand;
            var sourceJSONModele = sourceHTTP + listeVehicules[indexVehicule].models;

            // On cache le détail du véhicule
            $("#modele-detail").css("display", "none");

            // On affiche le vehicule selectionné
            $("#vehicules").html(listeVehicules[indexVehicule].constructor);
            $("#modeles").html("Sélectionner un modèle");

            // On affiche le logo du vehicule
            $("#img-modeles").attr("src", resSite + imgVehicule);

            // On va rechercher la liste des modeles associés
            setModele(sourceJSONModele);
        });

    }

    /**
     * parseModeles
     * 
     * @param
     * @return
     */
    function parseModeles() {

        // On va chercher la liste des modeles
        var listeModeles = getModeles();

        // On vide les éléments précédents du vehicule demandé
        elem_modelesList.empty();

        // Création de la liste des modeles
        $.each(listeModeles.models, function (key, value) {
            // Créer une playlist button
            var elem_plModeles = $("<a></a>");
            elem_plModeles.addClass("dropdown-item");
            elem_plModeles.html(value.name);
            elem_plModeles.attr("data-keymodele", key);
            elem_modelesList.append(elem_plModeles);
        });

        // Clic sur le modele
        $("#modeles-list > a").on("click", function () {

            // Clic sur le modele du vehicule
            var indexModele = $(this).data("keymodele");
            var modeleConstructor = listeModeles.constructor;
            var modeleName = listeModeles.models[indexModele].name;
            var imgModeleIllustration = resSite + listeModeles.models[indexModele].illustration;
            var imgModelePoster = resSite + listeModeles.models[indexModele].poster;

            // On affiche le vehicule selectionné
            $("#modeles").html(listeModeles.models[indexModele].name);

            // On affiche les détails
            $("#detailimage").attr("src", imgModeleIllustration);
            $("#detail1").html(modeleConstructor);
            $("#detail2").html(modeleName);
            $("#detail3").html(imgModeleIllustration);
            $("#detail4").html(imgModelePoster);

            // On montre le détail du véhicule
            $("#modele-detail").css("display", "block");

        });

    }

});