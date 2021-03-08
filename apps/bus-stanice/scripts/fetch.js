var grad = document.getElementById("unosGrada").value;

var a;

var temp_a = document.getElementById("unosDana").value;

function dayConverter() {
    temp_a = document.getElementById("unosDana").value;
    //day converter
    if (temp_a === "Ponedjeljak" || temp_a === "Utorak" || temp_a === "Srijeda" || temp_a === "Četvrtak" || temp_a === "Petak" || temp_a === "Radni dan") {
        a = "Radni dan";
    } else if (temp_a === "Subota") {
        a = "Subota";
    } else if (temp_a === "Nedjelja") {
        a = "Nedjelja";
    }
}

function dayInput() {
    var today2 = new Date();
    var d = today2.getDay();
    if (d === 1) {
        document.getElementById("unosDana").value = "Ponedjeljak";
    } else if (d === 2) {
        document.getElementById("unosDana").value = "Utorak";
    } else if (d === 3) {
        document.getElementById("unosDana").value = "Srijeda";
    } else if (d === 4) {
        document.getElementById("unosDana").value = "Četvrtak";
    } else if (d === 5) {
        document.getElementById("unosDana").value = "Petak";
    } else if (d === 6) {
        document.getElementById("unosDana").value = "Subota";
    } else if (d === 0) {
        document.getElementById("unosDana").value = "Nedjelja";
    }
}
dayInput();

var listOfCityes = Object.keys(Busevi);
for (var i = 0; listOfCityes.length > i; i++) {
    var el = document.createElement("option");
    el.textContent = listOfCityes[i];
    var parent = document.getElementById("unosGrada");
    parent.appendChild(el);
}

function fecthDataForCity(e) {
    console.log(a);
    var routsArray = Array();
    var busStationArray = Array();
    var departureArray = Array();
    grad = document.getElementById("unosGrada").value; //Kada selectiraš opciju, onda select tag ima taj value
    for (var t = 0; Busevi[grad].length > t; t++) {
        var routs = Busevi[grad][t].Ruta;
        var busStation = Busevi[grad][t].Stanica;
        //console.log(busStation);
        var departure = Busevi[grad][t].Stanica;
        var day = Busevi[grad][t].Dan;
        var p1 = document.getElementById("unosLinije");
        var p2 = document.getElementById("unosPolazista");
        var p3 = document.getElementById("unosOdredista");

        if (routsArray.includes(routs) == false) {
            if (a == Busevi[grad][t].Dan || Busevi[grad][t].Dan == "Tjedan") {
                routsArray.push(routs);
            }
        }

        if (e.target.id !== p1.id) {
            p1.innerHTML = "";
            /*var el = document.createElement("option");
            p1.appendChild(el);*/
            //document.getElementById("unosLinije").value = routsArray[0];
            for (z = 0; routsArray.length > z; z++) {
                var el = document.createElement("option");
                el.textContent = routsArray[z];
                var parent = p1;
                parent.appendChild(el);
            }
        }

        if (busStationArray.includes(busStation) == false) {
            if ((document.getElementById("unosLinije").value == Busevi[grad][t].Ruta || document.getElementById("unosLinije").value == "") && (a == Busevi[grad][t].Dan || Busevi[grad][t].Dan == "Tjedan")) {
                busStationArray.push(busStation);
            }
        }

        if (departureArray.includes(departure) == false) {
            if ((document.getElementById("unosLinije").value == Busevi[grad][t].Ruta || document.getElementById("unosLinije").value == "") && (a == Busevi[grad][t].Dan || Busevi[grad][t].Dan == "Tjedan")) {
                departureArray.push(departure);
            }
        }
    }

    p2.innerHTML = "";
    /*var el = document.createElement("option");
    p2.appendChild(el);*/

    for (z = 0; busStationArray.length > z; z++) {
        var el = document.createElement("option");
        el.textContent = busStationArray[z];
        var parent = p2;
        parent.appendChild(el);
    }

    p3.innerHTML = "";
    /*var el = document.createElement("option");
    p3.appendChild(el);*/

    for (z = 0; departureArray.length > z; z++) {
        var el = document.createElement("option");
        el.textContent = departureArray[z];
        var parent = p3;
        parent.appendChild(el);
        if (z == departureArray.length - 1) {
            el.setAttribute("selected", "selected");
        }
    }
}

document.addEventListener("DOMContentLoaded", dayConverter);
document.addEventListener("DOMContentLoaded", fecthDataForCity);
document.getElementById("unosGrada").addEventListener("change", fecthDataForCity);
document.getElementById("unosLinije").addEventListener("change", fecthDataForCity);
document.getElementById("unosDana").addEventListener("change", dayConverter);
document.getElementById("unosDana").addEventListener("change", fecthDataForCity);