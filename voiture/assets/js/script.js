"use strict"

var parent_js = document.getElementsByClassName('parent_js')[0];
// console.log(parent_js);
var child_js = document.createElement("DIV");
child_js.setAttribute('class', 'blue');
parent_js.appendChild(child_js);


var parent_jquery = $(".parent_jquery");
// console.log(parent_jquery);
var child_jquery = $('<div></div>').addClass('green');
parent_jquery.append(child_jquery);  // .preprend avant le contenu du parent

var arr = ["Pommes", "Poires"];
arr.push("Bananes");  // Ajout àa la fin
 console.log(arr);

for(let i=0; i<arr.length; ++i)
{
    console.log(arr[i]);
}

for (let value of arr)
{
    console.log(value);
}

for (let index in arr)
{
    console.log(arr[index]);
}