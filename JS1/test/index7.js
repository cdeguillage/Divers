var obj = new Object();
var obj = {};

// console.log( obj );

var ford = {
    model: "Mustang",
    motorisation: "Essence"
};

var arr_ford = [
    "Mustang",  // Modele
    "Essence"   // Motorisation
]

console.log( ford.model );
console.log( arr_ford[0] );

var arr_vehicules = [
    {
        model: "Mustang",
        motorisation: "Essence",
        color: ["red", "blue"]
    },
    {
        model: "Twingo",
        motorisation: "Diesel"
    }
];

console.log( arr_vehicules );
console.log( arr_vehicules[0].color[1] );

console.log("************************************************************");
for (vehicule of arr_vehicules)
{
    var vh = "";
    for (key_vh in vehicule)
    {
        vh += " * " + vehicule[key_vh];
    }
    console.log( vh );
}

console.log("************************************************************");
for (vehicule of arr_vehicules) {
    for (key_vh in vehicule) {
        console.log( key_vh +  " : " + vehicule[key_vh] );
    }
}

console.log("************************************************************");
for (vehicule of arr_vehicules) {
    for (key_vh in vehicule) {
        if ( key_vh == "model" || key_vh == "color" )
            console.log(key_vh + " : " + vehicule[key_vh]);
    }
    console.log("---------------------------");
}

console.log("************************************************************");
arr_vehicules[1].color = "yellow";
for (vehicule of arr_vehicules) {
    for (key_vh in vehicule) {
        if (key_vh == "model" || key_vh == "color")
            console.log(key_vh + " : " + vehicule[key_vh]);
    }
    console.log("---------------------------");
}
