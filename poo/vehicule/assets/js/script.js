$(document).ready(function () {

    // RESET
    $("#scenario-reset").on('click', function(e)
    {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('resetAJAX.php');
    });
    
    // START
    $("#voiture1-start").on('click', function(e)
    {
        e.preventDefault(); // Annulation du lien
        // $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">'); // Animation
        $('#queue').load('VehiculeAJAX.php', voiture1_start_cufa);
    });

    $("#voiture2-start").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture2_start_cufa);
    });

    $("#voiture3-start").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture3_start_cufa);
    });

    // STOP
    $("#voiture1-stop").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        // $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">'); // Animation
        $('#queue').load('VehiculeAJAX.php', voiture1_stop_cufa);
    });

    $("#voiture2-stop").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture2_stop_cufa);
    });

    $("#voiture3-stop").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture3_stop_cufa);
    });

    // GO
    $("#voiture1-go").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        // $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">'); // Animation
        $('#queue').load('VehiculeAJAX.php', voiture1_go_cufa);
    });

    $("#voiture2-go").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture2_go_cufa);
    });

    $("#voiture3-go").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture3_go_cufa);
    });

    // TURN LEFT
    $("#voiture1-turn-TURN_LEFT").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        // $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">'); // Animation
        $('#queue').load('VehiculeAJAX.php', voiture1_turnL_cufa);
    });

    $("#voiture2-turn-TURN_LEFT").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture2_turnL_cufa);
    });

    $("#voiture3-turn-TURN_LEFT").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture3_turnL_cufa);
    });

    // TURN RIGHT
    $("#voiture1-turn-TURN_RIGHT").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        // $('#r').html('<img src="http://www.mediaforma.com/sdz/jquery/ajax-loader.gif">'); // Animation
        $('#queue').load('VehiculeAJAX.php', voiture1_turnR_cufa);
    });

    $("#voiture2-turn-TURN_RIGHT").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture2_turnR_cufa);
    });

    $("#voiture3-turn-TURN_RIGHT").on('click', function (e) {
        e.preventDefault(); // Annulation du lien
        $('#queue').load('VehiculeAJAX.php', voiture3_turnR_cufa);
    });

});
