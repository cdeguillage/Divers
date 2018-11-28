function get_ajax()
{
    // Variable qui va stocker l'instance de XMLHttpRequest
    var xhr;

    // Instance de l'objet XMLHttpRequest
    if (window.ActiveXObject)  // IE
    {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    }
    else if (window.XMLHttpRequest)  // Les autres navigateurs
    {
        xhr = new XMLHttpRequest();
    }
    else  // Autres navigateurs
    {
        alert("Votre navigateur n'est pas adapté pour faire des requêtes AJAX... !")
    }


    // Est-ce que XHR n'est pas indéfinie ?
    // Est-il utilisable ?
    if (xhr != undefined)
    {
        xhr.open(
            /* methode  */ 'GET',
            /* url      */ 'https://api.coinmarketcap.com/v2/listings/',
            /* async    */ true,                                                /* FACULTATIF Si false, ne retourne pas la réponse */
            /* user     */ null,                                                /* FACULTATIF Nom d'utilisateur */
            /* password */ null                                                 /* FACULTATIF Mot de passe */
        );

        // Traiter l'état de la requête
        // Tentative de réception du fichier dans le lien URL ci-dessous
        xhr.onreadystatechange = function()
        {
            // readystate
            // 0 : Non envoyé
            // 1 : Connexion ouverte, mais send() pas encore appelée
            // 2 : Headers HTTP reçus, send() est appelée, les headers et statut sont disponibles
            // 3 : Chargement en cours..... la réponse est partielle    [ATTENTION]
            // 4 : Terminé !!!
            console.log("Ready State : " + xhr.readyState);
            console.log("Status      : " + xhr.status);

            if (xhr.readyState == 4 && xhr.status == 200)  // Réception OK
            {
                console.log("La requête est terminée !");
                console.log(xhr.responseText);

                // Lecture lié au type de fichier
                xhr.setRequestHeader('Content-type', 'application/json');
            }
            else   // Error
            {
                console.log("Ooooopsss !");
            }
        }
        // Envoi de la requête
        xhr.send();
    }

}