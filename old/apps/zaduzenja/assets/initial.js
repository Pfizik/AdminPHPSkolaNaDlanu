function initial() {
    document.getElementById("name-of-school").textContent = Podaci.Zaduzenja[0].ImeSkole;
    document.getElementById("klasa").getElementsByTagName("input")[0].value = Podaci.Zaduzenja[0].KlasaZaduzenja;
    document.getElementById("ur-broj").getElementsByTagName("input")[0].value = Podaci.Zaduzenja[0].UrBroj;

    var n = new Date();
    var newYear = parseInt(n.getFullYear() + 1);
    document.getElementById("acad-year").value = n.getFullYear() + "./" + newYear + ".";
    document.getElementById("date").valueAsDate = new Date(Podaci.Zaduzenja[0].DatumIspunjavanjaZaduzenja);
    document.getElementById("legal").textContent = Podaci.Zaduzenja[0].ZakonskaOsnova;
    document.getElementById("repeal").textContent = Podaci.Zaduzenja[0].Prigovor;

    document.getElementById("print").onclick = function () {
        window.print();
    }
    var zp = 0;
    for (zp; Podaci.ProfBroj[0].Profesori.length > zp; zp++) {
        var newElement = document.createElement("option");
        newElement.setAttribute("value", Podaci.ProfBroj[zp].Broj);
        newElement.textContent = Podaci.ProfBroj[zp].Profesori;
        //newElement.innerHTML = "<option value='" +  + "'>" +  + "<option>";
        document.getElementById('names-of-teacher').appendChild(newElement);
    }

    var z = 0;
    for (z; document.getElementsByClassName('table-entry').length > z; z++) {
        document.getElementsByClassName('table-entry')[z].getElementsByTagName("TR")[1].getElementsByTagName("TD")[3].innerHTML = Podaci.Zaduzenja[0].RadniTjedan;
    }

    var p = 0;

    for (p; document.getElementsByClassName('table-no-students').length > p; p++) {
        document.getElementsByClassName('table-no-students')[p].getElementsByTagName("TR")[1].getElementsByTagName("TD")[3].innerHTML = Podaci.Zaduzenja[0].TjedniKadaNemaUcenika;
    }
    
    var t = 0;
    for (t; Podaci.Razredi.length > t; t++) {
        var newElement = document.createElement("option");
        newElement.innerHTML = Podaci.Razredi[t].Razred;
        newElement.setAttribute("value", Podaci.Razredi[t].Razred)
        document.getElementById("container-for-dropdown-options").getElementsByClassName("options")[0].appendChild(newElement);
       // document.querySelectorAll('.options[data-attribute]')[0].appendChild(newElement);
    }

    var t = 0;
    for (t; Podaci.PredmetSatnica.length > t; t++) {
        var newElement = document.createElement("option");
        newElement.innerHTML = Podaci.PredmetSatnica[t].Predmet;
        newElement.setAttribute("value", Podaci.PredmetSatnica[t].Satnica)
        document.getElementById("container-for-dropdown-options").getElementsByClassName("options")[2].appendChild(newElement);
       // document.querySelectorAll('.options[data-attribute]')[0].appendChild(newElement);
    }
    
    document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[3].innerHTML = Podaci.Zaduzenja[0].GodisnjiTjedan;
    document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[2].getElementsByTagName("TD")[3].innerHTML = Podaci.Zaduzenja[0].PrazniciTjedan;
    document.getElementById("head-master").textContent = Podaci.Zaduzenja[0].Ravnatelj;

    function populateSubjects() {
        for (var i = 0; Podaci.PredmetSatnica[0].length > i; i++) {

            var key = Podaci.PredmetSatnica[0].Predmet;
            var value = Podaci.PredmetSatnica[0].Satnica;
            document.getElementById("subjects").innerHTML += "<option value='" + value + "'>" + key + "</option>";
        }

    }

    document.getElementById('povratak').onclick = function () {
        window.location.assign('/');
    }

    populateSubjects();
}
initial();
