var n1 = [];
var k1 = [];

function IsporuciRaspored() {
    var b;
    var c;
    var d;
    var e;
    var increment;

    b = document.getElementById("unosLinije").value;
    c = document.getElementById("unosPolazista").value;
    d = document.getElementById("unosOdredista").value;
    e = document.getElementById("unosVrijeme").value;
    var increment = 0;
    var brstan = 0;
    document.getElementById("praznaPretraga").removeAttribute("style");

    if (document.getElementsByClassName("tablica")[0]) {
        document.getElementsByClassName("tablica")[0].remove();
    }

    document.getElementById("container-loader").style.display = "block";

    var el = document.createElement("table");
    el.className = "tablica";
    document.getElementById("zaTablicu").appendChild(el);
    var rowTable = document.createElement("tr");
    rowTable.innerHTML = "<tr><th>Linija</th><th></th><th>Vrijeme polaska</th><th>Polazište</th><th></th><th>Odredište</th><th>Vrijeme dolaska</th></tr>";
    document.getElementsByClassName("tablica")[0].appendChild(rowTable);

    /*var brstan = 1;
    var n;
    for (n=0; Busevi[grad][n]<Busevi[grad].lenght; n++){
        if(Busevi[grad][n] == ){
            bre
        }
    }
    console.log(brstan);*/

    //console.log(c);
    //console.log(d);
    //var polaziste = "";
    //var odrediste = "";
    var n = 0;
    var k = 0;
    n1 = [];
    k1 = [];

    for (n; Busevi[grad].length > n; n++) {
        if (Busevi[grad][n].Stanica == c && (Busevi[grad][n].Dan == a || Busevi[grad][n].Dan == "Tjedan") && Busevi[grad][n].Ruta == b) {
            //var polaziste = Busevi[grad][increment].Stanica;
            n1.push(n);
        }
    }

    //console.log(n1);

    for (k; Busevi[grad].length > k; k++) {
        if (Busevi[grad][k].Stanica == d && (Busevi[grad][k].Dan == a || Busevi[grad][k].Dan == "Tjedan") && Busevi[grad][k].Ruta == b) {
            //var odrediste = Busevi[grad][increment].Stanica;
            k1.push(k);
        }
    }
    console.log(k1);

    //var vrijeme = document.getElementById("unosVrijeme").value.replace(/^0/, "").replace(/\D/, "");
    //console.log(k1);
        for (increment; n1.length > increment; increment++) {
            if (n1[increment] < k1[increment] && (new Date ('1/1/1999 ' + document.getElementById("unosVrijeme").value) > new Date ('1/1/1999 ' + Busevi[grad][k1[increment]].Polazak) || document.getElementById("unosVrijeme").value == "")) {
                var rowTable = document.createElement("tr");
                rowTable.innerHTML = `<td>${Busevi[grad][n1[increment]].Ruta}</td><td></td><td>${Busevi[grad][n1[increment]].Polazak}</td><td>${Busevi[grad][n1[increment]].Stanica}</td><td></td><td>${Busevi[grad][k1[increment]].Stanica}</td><td>${Busevi[grad][k1[increment]].Polazak}</td>`;
                document.getElementsByClassName("tablica")[0].appendChild(rowTable);
            }else if (n1[increment] < k1[increment]) {
                var rowTable = document.createElement("tr");
                rowTable.innerHTML = `<td>${Busevi[grad][n1[increment]].Ruta}</td><td></td><td>${Busevi[grad][n1[increment]].Polazak}</td><td>${Busevi[grad][n1[increment]].Stanica}</td><td></td><td style="color: red">${Busevi[grad][k1[increment]].Stanica}</td><td style="color: red">${Busevi[grad][k1[increment]].Polazak}</td>`;
                document.getElementsByClassName("tablica")[0].appendChild(rowTable);
            }/*else if (k1[increment] < n1[increment]) {
                var rowTable = document.createElement("tr");
                rowTable.innerHTML = `<td>${Busevi[grad][n1[increment]].Ruta}</td><td>${Busevi[grad][k1[increment]].Polazak}</td><td>${Busevi[grad][n1[increment]].Polazak}</td><td>${Busevi[grad][k1[increment]].Stanica}</td><td>${Busevi[grad][n1[increment]].Stanica}</td>`;
                document.getElementsByClassName("tablica")[0].appendChild(rowTable);
            }*/
        }

    if (document.getElementsByClassName("tablica")[0] && document.getElementsByClassName("tablica")[0].getElementsByTagName("tr").length == 1) {
        document.getElementById("praznaPretraga").style.display = "block";

    }

    document.getElementById("nazivTablice").getElementsByTagName("span")[0].textContent = a;
    document.getElementById("nazivTabliceMob").getElementsByTagName("span")[0].textContent = a;
    document.getElementById("container-loader").removeAttribute("style");
    document.getElementById('nazivTabliceMob').scrollIntoView({ behavior: "smooth" })

    document.getElementsByClassName("tablica")[0].getElementsByTagName("TR")[0].getElementsByTagName("TH")[1].click();
}

document.addEventListener("DOMContentLoaded", IsporuciRaspored);

document.getElementsByClassName("gumb")[0].addEventListener("click", IsporuciRaspored);


document.getElementById("zaGore").addEventListener("click", function () {
    document.getElementById('naslov').scrollIntoView({ behavior: "smooth" });
});