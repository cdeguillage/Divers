var btn_bouge = $("#btn_bouge");
var square = $(".square");
var position = 1;  //position initiale (4 positions)
var deplacement = 75;  //25px

$(document).ready(function () {

    // Capture de l'évenement
    btn_bouge.on("click", mouvement);


    // Mouvement du carré
    function mouvement()
    {
        var square_X = Math.floor(square.css("left").replace("px", ""));
        var square_Y = Math.floor(square.css("top").replace("px", ""));

        // console.log("Avant :");
        // console.log(square_X);
        // console.log(square_Y);

        switch(position)
        {
            case 1:
                square_X = square_X + deplacement;
                square.css("left", square_X + "px");
                position = 2;
                break;

            case 2:
                square_Y = square_Y - deplacement;
                square.css("top", square_Y + "px");
                position = 3;
                break;

            case 3:
                square_X = square_X - deplacement;
                square.css("left", square_X + "px");
                position = 4;
                break;

            case 4:
                square_Y = square_Y + deplacement;
                square.css("top", square_Y + "px");
                position = 1;
                break;
        }

        // console.log("Après :");
        // console.log(square_X);
        // console.log(square_Y);

    }

});