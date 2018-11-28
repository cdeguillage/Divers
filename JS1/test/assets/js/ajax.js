"use strict"

// =============================
// Flux JSON
// =============================
var source = "http://osw3.net/playlists.php";

// Variables déclaration
var playlists = {};

// =============================
// Retrouver Elements
// =============================
var elem_btnGet = $("#get-playlists");
var elem_playlists = $("#playlists");
var elem_playlistsBtns = $("#playlistsBtns");
var elem_playlistsTracks = $("#playlistsTracks");


// =============================
// PROCESSUS
// =============================
$(document).ready(function () {

    // =============================
    // Retrouver playlists
    // =============================

    // elem_btnGet.on({
    //     click: function() { playlists = getPlaylists(); }
    // });
    elem_btnGet.on("click", function(){
        // Affiche le loading
        $(".loader").css("display", "block");

        // ATTENTION : Retour effectué trop tard par Ajax (Asynchrone !!!)
        setPlaylists(source);
    });


/**
 * Set playlist
 * 
 * @param (string) url adresse du fichier playlists
 * @return (object) Playlists
 */
function setPlaylists(url){
    // CAS 1:
    // $.ajax(url)
    //    .done(function {})
    //    .fail(function {})
    //    .always(function {})

    // CAS 2:
    $.ajax({
        method: "GET", // ou POST
        url: url,
        dataType: "json",
        success: function(response){
            playlists = response;
            // ATTENTION : Retour effectué trop tard par Ajax (Asynchrone !!!)
            parsePlaylist();
        },
        error: function(){
            alert("Oops an error has occured.");
        }
    })

    // CAS 3: ATTENTION ! PAS DE RETOUR D'ERREUR
    // $.getJSON(url, function(response){
    //     console.log(response);
    // });

}

/**
 * Get playlist
 * 
 * @param
 * @return (object) Playlists
 */
function getPlaylist() {
    return playlists;
}

/**
 * parsePlaylist
 * 
 * @param
 * @return
 */
function parsePlaylist() {
    var pl = getPlaylist();

    $("#totalPlaylists").text("Total : " + pl.playlists.length)

    // console.log(pl.generator);
    // console.log(pl.lastUpdate);
    // console.log(pl);
    // console.log(pl.playlists);

    // Idem ci-dessus mais en JQuery
    // $.each(pl.playlists, function(key, value) {
    //     console.log(key + " // " + value); // 0, 1, 2 et element du tableau
    // })

    // Total nombre de tracks
    // CAS 1:
    // $("#totalPlaylist").text("Total : " + pl.playlists.length);

    // CAS 2:
    // var elem = $("<div></div>");
    // elem.addClass("totalPlaylist");
    // $("#playlists").append(elem);

    // elem.html("Total : <span></span>");
    // $(".totalPlaylist").find("span").html(pl.playlists.length);

    // elem.addClass("playlistsBtns");
    // $("#playlists").append(elem);

    // elem.addClass("playlistsTracks");
    // $("#playlists").append(elem);

    // CAS 3:
    // $("#playlists").append("<div id=\"totalPlaylist\">Total : " + pl.playlists.length + "</div>")


    // Affiche les chaines
    // for (let i = 0; i < pl.playlists.length; i++) {
    //     // console.log(pl.playlists[i]);
    //     // console.log(pl.playlists[i].title + " // " + pl.playlists[i].lastUpdate + " // " + pl.playlists[i].tracks);
    //     var elemBtn = $("<button>" + pl.playlists[i].title + "</button>");
    //     elemBtn.addClass("btn" + pl.playlists[i].title);
    //     $(".playlistsBtns").append(elemBtn);
    // }

    // Affiche les boutons des chaines
    elem_playlistsBtns.empty();
    elem_playlistsTracks.empty();

    $.each(pl.playlists, function(key, value) {

        // Créer une playlist button
        var elem_plBtn = $("<button></button>");
            elem_plBtn.html(value.title);
            elem_plBtn.attr("data-key", key);
        elem_playlistsBtns.append(elem_plBtn);

        // Créer la playlist Track list
        var elem_plTracksList = $("<div></div>");

        if (key > 0) {
            elem_plTracksList.css({display: "none"});
            // elem.plTracksList.hide();

        }

        // Injection du titre de la playlist
        var elem_plTracksList_h3 = $("<h3></h3>");
            elem_plTracksList_h3.html(value.title);

        elem_plTracksList.append(elem_plTracksList_h3);

        // Injection de la liste des tracks
        var elem_ul = $("<ul></ul>");
        elem_plTracksList.append(elem_ul);

        // Boucle sur la liste des tracks
        $.each(value.tracks, function (key_1, track) { 
            // console.log(track);
            var li_track = $("<li></li>");
            var div_artist = $("<div></div>");
            var div_title = $("<div></div>");

                div_artist.html(track.artist);
                div_title.html(track.title);

                li_track.append(div_artist);
                li_track.append(div_title);
                elem_ul.append(li_track);
        });

        // elem_playlistsTracks.append(elem_plTracksList);

        // Clic sur le bouton d'une playlist
        $(".playlistsBtns > button").on ("click", function(){
            // console.log($(this).data("key"));

            // On masque TOUTES les playlists
            $(".playlistsTracks > div").hide();

            // On affiche la playlist sélectionnée
            $(".playlistsTracks > #" + $(this).data("key")).show();
        });

    });


    // N'affiche plus le loading
    $(".loader").css("display", "none");
}


});
