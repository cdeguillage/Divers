var nombre = document.getElementById("nombre");
var nombreaff = document.getElementById("nombreaff");
var carreaff = document.getElementById("carreaff");
var cubeaff = document.getElementById("cubeaff");


nombre.onkeyup = function () {
    console.log(document.getElementById("nombre").value);

    // Nombre
    nombreaff.innerHTML = nombre.value;
    // Carré
    carreaff.innerHTML = nombre.value * nombre.value;
    // Cube
    cubeaff.innerHTML = nombre.value * nombre.value * nombre.value;
};
