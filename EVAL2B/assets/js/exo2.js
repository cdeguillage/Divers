var entree = document.getElementById("entree");
var sortie = document.getElementById("sortie");

entree.onkeyup = function () {
    sortie.value = entree.value;
};
