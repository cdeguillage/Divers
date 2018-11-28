// Evite les conflits entre librairies (JQuery, underscore...)
// Transforme $() en JQuery()
// JQuery.noConflict();

// var byId = document.getElementById("sport");
// console.log(byId);

// var art2 = document.getElementsByClassName("article_2")[0];
// console.log(art2);

// var machin = document.getElementsByClassName("machin");
// console.log(machin);

// Comparaison JavaScript / JQuery
// art2.style.border = "1px solid red";
// art2.syle.color = "green";

// JQuery identique au code ci-dessus
// ou $(".machin").css("color", "red").css("padding", "blue");
// ou $(".machin")
//      .css("color", "red")
//      .css("padding", "blue");


$(document).ready(function () {
    $(".article_2").css({
        border: "1px solid red",
        color: "green"
    });

    $(".machin").css({
        backgroundColor: "yellow",
        padding: "1rem"
    });

    $("#sport").css({
        "font-size": "14px"
    });

    // CAS 1 :
    // $("button").click(function (e) {
    //     var isVisible = true;
    //     if (isVisible) {
    //         $(".machin").hide();
    //         $("button").text("Montrer");
    //     } else {
    //         $(".machin").show();
    //         $("button").text("Cacher");
    //     }
    //     isVisible = !(isVisible);
    // });

    // CAS 2 :
    // $("button").click(function (e) {
    //     $(".machin").toggle();
    // });

    // CAS 3 :
    $("button").click(function (e) {

        var machin = $(".machin");
        var isDisplay = machin.css("display") == "block" ? true : false;
        if (isDisplay) {
            $(".machin").hide();
            // machin.css("display", "none");
            $("button").text("Montrer");
        } else {
            $(".machin").show();
            // machin.css("display", "block");
            $("button").text("Cacher");
        }
    });

    console.log( $("#politique").attr("data-timeout") );
    console.log( $("#politique").data("timeout") );

    // $("p").click(function (e) {
    //     $(this).hide();
    // });

    $("#btn-2").on( {
        mouseenter: function() {
            $(this).css("color", "red");
        },
        mouseleave: function() {
            $(this).css("color", "blue");
        }
    });

    // Affichage de la taille de la font
    $("#log").text( $("#taillefont").css("font-size") ); //ou fontSize

    // Changement de la taille de la font sur un clic
    var fontSize = $("#taillefont").css("font-size"); // Memo de la taille de la font
    $("#taillefont").click( function() {
        $(this).css("font-size", ( $(this).css("font-size") == fontSize ? "28px" : fontSize ));
    });
    
    
    $(document).on( {
        keypress: function (e) { 
            var code = e.keyCode || e.which;
            $("#log").html(String.fromCharCode(code));
        }
    });
});
