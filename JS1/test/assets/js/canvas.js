"use strict";  // Permet de n'avoir aucune erreur dans le script !!!

// JQuery Ouverture du document
$(document).ready(function () {
    
    // Retrouver les éléments HTML
    var body = $("body");
    var offCanvas = $("#offcanvas");
    var btnOpen = $("#btn-open-canvas");
    var btnClose = $("#btn-close-canvas");

    // Ouvrir le menu OffCanvas
    // Pour info en ES6 :   btnOpen.on("click", function(arg1, arg2) {});
    //                      btnOpen.on("click", (arg1, arg2) => {});
    btnOpen.on("click", function(){

        // CAS 1 : Transition / Animation
        // offCanvas.animate({
        //     left: "0px"
        // }, 1500); // 1.5 secondes

        // CAS 2 : 
        body.addClass("open");

    });

    // Fermer le menu OffCanvas
    btnClose.on("click", function () {

        // CAS 1 : Transition / Animation
        // offCanvas.animate({
        //     left: "-280px"
        // }, 1500); // 1.5 secondes

        // CAS 2 : 
        body.removeClass("open");

    });

});