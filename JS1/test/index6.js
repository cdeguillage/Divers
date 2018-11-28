// Les tableaux
var array_fruits = ["banane", "pomme"];

for(let i=0; i<array_fruits.length; i++)
{
    console.log( array_fruits[i] );
}

array_fruits.push("kiwi");
array_fruits.push("fraise");
array_fruits.push("ananas");
console.log( array_fruits );

var pos_kiwi = array_fruits.indexOf("kiwi");
console.log( pos_kiwi );

array_fruits.splice(pos_kiwi, 1);
console.log( array_fruits );

var body = document.getElementsByTagName("body")[0];
console.log( body );

/*
for (let i=0; i<array_fruits.length; i++)
{
    body.innerText += array_fruits[i] + ",";
}
*/

// Exemple pour un breadcrumb
var str_fruits = array_fruits.join(" > ");
body.innerText = str_fruits;

console.log( str_fruits );
console.log( str_fruits.split(" > ") );

