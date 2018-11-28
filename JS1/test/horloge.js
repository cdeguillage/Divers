// Ajoute les 0 manquants quand inférieur à 10
function checkTime(i)
{
    return i < 10 ? "0" + i : i;
}

// A partir du numéro du jour, on renvoie le nom du jour
function getNomJour(numJour)
{
    var jours = ["Dim.", "Lun.", "Mar.", "Mer.", "Jeu.", "Ven.", "Sam."];
    return jours[numJour];
}

// A partir du numéro du mois, on renvoie le nom du mois
function getNomMois(numMois) {
    var mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    return mois[numMois];
}

// Processus de calcul de l'heure et de l'affichage
var myTimerDate;
function displayTime()
{
    var myDate = new Date();
    var hh = myDate.getHours();
    var mm = myDate.getMinutes();
    var ss = myDate.getSeconds();

    // Contrôle des 0 manquants
    hh = checkTime(hh);
    mm = checkTime(mm);
    ss = checkTime(ss);

    // Affichage
    document.getElementById("horloge1").innerHTML = myDate.toString();
    // document.getElementById("horloge2").innerHTML = hh + ":" + mm + ":" + ss;

    document.getElementById("jourNom").innerHTML = getNomJour( myDate.getDay() );
    document.getElementById("jour").innerHTML = myDate.getDate();
    document.getElementById("mois").innerHTML = getNomMois( myDate.getMonth() );
    document.getElementById("annee").innerHTML = myDate.getFullYear();

    document.getElementById("heures").innerHTML = hh;
    document.getElementById("minutes").innerHTML = mm;
    document.getElementById("secondes").innerHTML = ss;

    // Clignotement des séparateurs (seconde paire/impaire)
    var separators = document.getElementsByClassName("separator");
    separators[0].style.color = (ss%2 ? 'white' : 'black');
    separators[1].style.color = (ss%2 ? 'white' : 'black');
    
    // On relance le timer et sa fontion chaque seconde
    myTimerDate = setTimeout( function ()
                              {
                                displayTime();
                              }, 1000);
}

var livres = 20;
livres -= 10;
document.getElementById("horloge2").innerHTML = livres;

// Initialisation du processus
displayTime();
