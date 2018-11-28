$(document).ready(function () {

    // Balayage du menu (actif)
    $('.nav-item').click(function (event)
    {
        // console.log(e);
        // event.currentTarget == this
        $('.nav-item').removeClass('active');
        $(this).addClass('active');
    });


    // // Menu Vehicule  Update
    // $('.vehicule-update').click(function (e)
    // {
    //     // Désactive les liens
    //     e.preventDefault();

    //     // Paramétre de requête
    //     var param = "req=update&id=" + $(this).data('idveh');

    //     // Affichage de la form Vehicule Update
    //     $("#forms").load("forms-vehicule.php", param)
    // });


    // // Menu Vehicule  Delete
    // $('.vehicule-delete').click(function (e) {
    //     // Désactive les liens
    //     e.preventDefault();

    //     // Paramétre de requête
    //     var param = "req=delete&id=" + $(this).data('idveh');

    //     // Affichage de la form Vehicule Update
    //     $("#forms").load("forms-vehicule.php", param)
    // });

    // AU CHARGEMENT DE LA PAGE
    // Paramétre de requête
    // var param = "req=add";
    // Affichage de la form Vehicule Update
    // $("#forms").load("forms-vehicule.php", param)


});