// Sauvegarde des données saisies
var myData = [
    {
        nom: "Lee", prenom: "Bruce"
    },
    {
        nom: "max", prenom: "ddd"
    },
    {
        nom: "dddd", prenom: "fgf"
    }
];


//// Gestion de l'affichage HTML ////
// On enregistre/affiche les données sur 2 colonnes
var numCol = 2;

// Création de la table
var myTable = document.createElement("table");
myTable.setAttribute("id", "myTable");
myTable.setAttribute("name", "myTable");
document.getElementsByTagName("body")[0].appendChild(myTable);

// Création du corps de la table
var myTbody = document.createElement("tbody");
myTbody.setAttribute("id", "myTbody");
myTbody.setAttribute("name", "myTbody");
document.getElementsByTagName("table")[0].appendChild(myTbody);

// On y insére les x lignes correspondants au tableau de données
// On y ajoute les y colonnes correspondants à la variable définie
function ajoutTrTd(myParent, myNumLigne, myNumCol)
{
    var myDataTd = "";

    var myTr = document.createElement("tr");
    myTr.setAttribute("id", "myTr" + myNumLigne);
    myTr.setAttribute("name", "myTr" + myNumLigne);
    
    // On balaye chaque colonne
    for( i=0; i<myNumCol; i++)
    {
        switch (i)
        {
            case 0: // nom
                myDataTd = myData[myNumLigne].nom;
                break;
            case 1: // prenom
                myDataTd = myData[myNumLigne].prenom;
                break;
            default:
                myDataTd = "???";
        }
        myTr.innerHTML += "<td>" + myDataTd + "</td>";
    }
    document.getElementsByTagName(myParent)[0].appendChild(myTr);
}

// Affichage des données enregistrées
for( iRow in myData )
{
    ajoutTrTd("table", iRow, numCol);
}


// Liste des événements
// ** Bouton Ajouter les infos su formulaires dans le tableau
var btnAdd = document.getElementById("ajouter");
btnAdd = addEventListener("click", ajouterChamps);

function ajouterChamps() {
    var nom_el = document.getElementById("nom");
    var prenom_el = document.getElementById("prenom");

    var nom_val = nom.value;
    var prenom_val = prenom.value;

    alert(nom_val + "*" + prenom_val);
}
