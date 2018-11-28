$(document).ready(function () {


    $.ajax({
        url: 'https://api.coinmarketcap.com/v2/listings/',
        success: function (r) {
            var cryptos = r.data;
            var el_cryptos = $("#cryptos");

            $.each( cryptos, function(index, crypto) {
                var el_opt = $('<option>');
                    el_opt.attr('value', crypto.symbol);
                    el_opt.text(crypto.name);
                    el_cryptos.append(el_opt);
            });
        }
    });


    function get_btc()
    {
        $.ajax({
            method: 'GET',
            url: 'https://api.coinmarketcap.com/v2/ticker/?convert=BTC&limit=10',
            success: show_crypto,
            error: function()
            {
                alert("Your "+symbol+" as gone away !");
            }
        });
    }

    function show_crypto(response)
    {
        // Récupération des cryptos
        var cryptos = response.data;

        $.each(cryptos, function(index, crypto)
        {
            console.log(crypto.symbol);
            // Liste des cryptodevises  ex:BTC
            // console.log(crypto.symbol);
            if (crypto.symbol === "BTC")
            {
                console.log(crypto);
                console.log(crypto.quotes.USD.price);
            }

        });

        console.log(cryptos);
    }

    // Clic sur le bouton "get_btc"
    $("#get_btc").on('click', get_btc);

});