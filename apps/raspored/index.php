<?php
include("../../data/https.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Interaktivni školski raspored</title>
    <meta name="Description" content="Aplikacija za prikaz školskog rasporeda.">
    <meta name="Keywords" content="Raspored Gimnazije Pula,raspored,suglasnost,suglasnosti">
    <link rel="icon" href="../favicon.png" type="image/png">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap&subset=latin-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta property="og:title" content="Aplikacija Škola na dlanu - Školski raspored">
    <meta property="og:site_name" content="Škola na dlanu">
    <meta property="og:url" content="https://www.školanadlanu.hr">
    <meta property="og:description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima za bržu i lakšu komunikaciju unutar škole. ">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/data/logo.png">
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='900' />


    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 0.65vw;
            font-family: 'Open Sans', sans-serif;
            user-select: none;
        }

        /* Spinner početak */
        #container-loader {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            overflow: hidden;
            background-color: #ffffffbb;
            display: none;
        }

        #search-text {
            color: black;
            font-size: 2rem;
            position: absolute;
            left: 50%;
            top: 57%;
            font-weight: 600;
            transform: translate(-50%, -50%);

        }

        .loader {
            top: 50%;
            left: 50%;
        }

        .loader,
        .loader:before,
        .loader:after {
            background: #a3006d;
            -webkit-animation: load1 1s infinite ease-in-out;
            animation: load1 1s infinite ease-in-out;
            width: 1em;
            height: 4em;
        }

        .loader {
            color: #a3006d;
            text-indent: -9999em;
            /* margin: 88px auto; */
            position: relative;
            font-size: 1.5rem;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0) translate(-50%, -50%);
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        .loader:before,
        .loader:after {
            position: absolute;
            top: 0;
            content: '';
        }

        .loader:before {
            left: -1.5em;
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .loader:after {
            left: 1.5em;
        }

        @-webkit-keyframes load1 {

            0%,
            80%,
            100% {
                box-shadow: 0 0;
                height: 4em;
            }

            40% {
                box-shadow: 0 -2em;
                height: 5em;
            }
        }

        @keyframes load1 {

            0%,
            80%,
            100% {
                box-shadow: 0 0;
                height: 4em;
            }

            40% {
                box-shadow: 0 -2em;
                height: 5em;
            }
        }

        /* Spinner Kraj */

        /*za prikaz cijele stranice*/
        #box {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        hr {
            width: 90%;
            background-color: white;
        }

        /**/

        #povratak {
            position: absolute;
            left: 1rem;
            height: 4.5rem;
            cursor: pointer;
        }

        /*za prikaz naslova*/
        #naslov {
            height: 7.5rem;
            width: 100%;
            background-color: #a3006d;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #naslov span {
            width: max-content;
            font-size: 3.1rem;
            color: white;
            font-family: 'Audiowide', cursive;
        }

        /**/

        /*za prikaz svega osim naslova*/
        #srednji {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        /**/

        /*za prikaz forme (lijevi dio stranice)*/
        #forma {
            height: 100%;
            width: 25%;
            background-color: #000000cc;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        /*nazivi za unos*/
        .naziv {
            color: white;
            font-size: 1.75rem;
            font-family: 'Open Sans';
            list-style-type: square;
        }

        select[data-ime] {
            font-size: 1.75rem;
        }

        /**/

        /*za unos*/
        .unos {
            padding: 0;
            font-size: 1.75rem;
            outline: none;
            color: black;
            background-color: #F5F5F6;
            border-style: none;
            font-family: 'Open Sans';
        }

        /**/

        ::placeholder {
            color: gray;
            font-family: 'Open Sans';
            font-size: 1.4rem;
            font-style: italic;
        }

        /*oblikovanje gumba*/
        .gumb {
            background-color: transparent;
            border: none;
            cursor: pointer;
            color: #ffffff;
            font-size: 1.75rem;
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 1rem;
            padding-bottom: 1rem;
            outline: none;
            width: 15rem;
            position: relative;
            border: 2px solid hsl(80, 100%, 50%);
            border-radius: 0.76rem;
            /* top: 4.5rem; */
            color: white;
            margin-top: 1.5rem;
            margin-bottom: 2.7rem;
        }

        .gumb:nth-of-type(2) {
            margin-bottom: 1rem;
        }

        /**/

        .gumb:hover {
            background-color: hsl(80, 100%, 50%);
            color: black;
        }

        /**/

        /*za prikaz forme za pretraživanje*/
        #prvaForma {
            position: relative;
            /* top: 3.25rem; */
            margin-top: 1.25rem;
            width: 95%;
            display: grid;
            grid-template-columns: 30% 70%;
            grid-auto-rows: auto;
            grid-row-gap: 2.5rem;
        }

        /**/

        #podaci {
            width: 75%;
            height: 100%;
            background-color: #F5F5F6;
        }

        /*za prikaz tablice i dana*/
        #srednjiTablica {
            height: 81%;
            /* height: 65rem; */
            /* max-height: 62.5vh; */
            padding-top: 1rem;
            padding-bottom: 1rem;
            width: 100rem;
            position: absolute;
            top: 55%;
            left: 62.5%;
            transform: translate(-50%, -50%);
            overflow: hidden;
            background-color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23)
        }

        /**/

        /*za prikaz dana*/
        #nazivTablice {
            height: 7.5%;
            width: 100%;
            text-align: center;
            font-size: 2.5rem;
            background-color: transparent;
            font-weight: bold;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        /**/

        /*za prikaz dana na mobitelu*/
        #nazivTabliceMob {
            height: 6%;
            width: 100%;
            text-align: center;
            font-size: 2.5rem;
            background-color: #F5F5F6;
            font-weight: bold;
            padding-top: 1rem;
            display: none;
        }

        /**/

        /*za prikaz tablice*/
        #zaTablicu {
            max-height: 90%;
            width: 95%;
            overflow-y: scroll;
        }

        /**/

        /*tablice*/
        .tablica {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            font-size: 1.6rem;
            text-align: center;
        }

        .slobodnaUcionica {
            background-color: #aaff00;
        }

        .tablica td,
        .tablica th {
            border: 1px solid #ddd;
            height: 3.5rem;
            text-indent: 5px;
        }

        .tablica th {
            font-size: 1.75rem;
            position: sticky;
            background-color: hsl(80, 100%, 50%);
        }

        /**/

        /*svaki drugi red tablice je obojan u #f2f2f2*/
        .tablica tr:nth-child(2n) {
            background-color: #f2f2f2;
        }

        /**/

        /*prelazak miša preko retka tablice*/
        .tablica tr:hover {
            background-color: #a3006d !important;
            color: white !important;
        }

        /**/

        /*za ikonu uz pomoć koje se prikazuje dnevni raspored za profesore*/
        .prosiriProfesore {
            float: right;
            width: 2rem;
            height: 2rem;
            background-image: url("Ikone/Dropdown.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        /**/

        /*za prikaz slobodnih učionica*/
        #slobodneUcionice {
            margin-top: 1.3rem;
            margin-bottom: 1.3rem;
            width: 95%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        #satSlobodno {
            width: 15rem;
            font-size: 1.75rem;
            text-indent: 5px;
            background-color: #F5F5F6;
        }

        /**/

        /*izgled liste slobodnih učionica*/
        #listaSlobodnihUcionica {
            position: relative;
            left: -15.5rem;
            margin-top: 0.25rem;
            font-size: 1.85rem;
        }

        /**/

        /*za prikaz trenutnog vremena i trenutnog sata*/
        #vrijeme {
            position: relative;
            /* top: 3.5rem; */
            color: white;
            width: 90%;
            text-align: center;
        }

        #trenutnoVrijeme,
        #trenutniSat,
        #preostaloVrijeme {
            width: 100%;
        }

        #trenutnoVrijeme {
            font-size: 5rem;
        }

        #trenutniSat,
        #preostaloVrijeme {
            font-size: 2rem;
        }

        /**/

        /*za padajući izbornik za prikaz profesora, predmeta..*/
        .izbornik {
            position: absolute;
            background-color: white;
            width: 70%;
            display: none;
            max-height: 25rem;
            overflow-y: scroll;
            padding: 0;
            z-index: 1;
        }

        .izbornik span:hover {
            background-color: hsl(80, 100%, 50%);
        }

        .izbornik span {
            text-indent: 5px;
            padding: 0;
            font-size: 1.75rem;
            border-top: solid 1px black;
        }

        /**/

        .unos input {
            font-size: 1.75rem;
            padding: 0;
            width: calc(100% - 1.75rem);
            width: -webkit-calc(100% - 1.75rem);
            border-style: none;
            text-indent: 5px;
            background-color: #F5F5F6;
            outline: none;
        }

        /*ikona za brisanje unosa*/
        .ikonaX {
            width: 1.75rem;
            height: 1.75rem;
            position: relative;
            top: 50%;
            right: 1%;
            transform: translateY(-50%);
            float: right;
        }

        /**/
        #praznaPretraga {
            display: none;
            position: absolute;
            top: 20%;
            width: 100%;
            font-size: 2.5rem;
            text-align: center;
        }

        /*ikona za scrollanje na vrh kod mobitela*/
        #zaGore {
            display: none;
        }

        /**/

        /*prilagodba za mobitele*/
        @media screen and (orientation: portrait) {

            html,
            body {
                font-size: 2.65vw;
            }

            #box {
                display: block;
            }

            #povratak,
            a {
                display: none;
            }

            #naslov {
                height: 10vh;
            }

            #podaci {
                overflow-x: hidden;
                overflow-y: hidden;
                height: auto;
                width: 100%;
                /*
                height: calc(100vh - 5vh - 1rem);
                height: -moz-calc(100vh - 5vh - 1rem);
                height: -webkit-calc(100vh - 5vh - 1rem);
                */
                min-height: fit-content;
                min-height: -moz-fit-content;
                min-height: -webkit-fit-content;
            }

            #srednji {
                flex-direction: column;
                overflow-x: hidden;
                height: fit-content;
                height: -moz-fit-content;
                height: -webkit-fit-content;
            }

            #zaTablicu {
                overflow-y: hidden;
            }

            #nazivTabliceMob {
                display: block;
                height: 5vh;
            }

            #nazivTablice {
                display: none;
            }

            #vrijeme {
                min-height: fit-content;
                min-height: -moz-fit-content;
                min-height: -webkit-fit-content;
            }

            #preostaloVrijeme {
                margin-bottom: 1rem;
            }

            #forma {
                width: 100%;
                min-height: 90vh;
            }

            #srednjiTablica {
                width: 97%;
                height: fit-content;
                height: -moz-fit-content;
                height: -webkit-fit-content;
                min-height: 12.5rem;
                max-height: none;
                position: relative;
                top: 1rem;
                left: 50%;
                transform: translate(-50%, 0);
                padding-bottom: 2.5rem;
                padding-top: 2.5rem;
                overflow-y: hidden;
                overflow-x: hidden;
            }

            #satSlobodno {
                height: 3.25rem;
            }

            .naziv {
                font-size: 2.25rem;
            }

            .tablica {
                font-size: 1.4rem;
            }

            #vrijeme {
                position: initial;
            }

            .tablica th {
                font-size: 1.525rem;
                position: sticky;
                background-color: hsl(80, 100%, 50%);
            }

            .tablica td,
            .tablica th {
                text-indent: 0;
            }

            .tablica tr:hover {
                background-color: initial;
                color: black;
            }

            .unos input {
                font-size: 1.75rem;
                height: 3.25rem;
            }

            .izbornik span {
                font-size: 1.575rem;
                background-color: rgb(232, 232, 232);
                min-height: 3.25rem;
                display: flex;
                align-items: center;
                justify-content: flex-start;
            }

            .izbornik span:hover {
                background-color: initial;
            }

            .gumb:hover {
                background-color: initial;
                color: #FFFFFF;
            }

            .izbornik {
                max-height: 23.5rem;
            }

            #praznaPretraga {
                top: 52.5%;
            }

            #zaGore {
                display: block;
                width: 6rem;
                height: 6rem;
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        /**/
    </style>

</head>

<body>
    <div id="box">
        <div id="naslov">
            <img id="povratak" src="../back.png" />
            <span>Raspored</span>
        </div>
        <div id="srednji">
            <div id="forma">
                <form id="prvaForma">
                    <span class="naziv">Dan:</span>
                    <select id="unosDana" data-ime="dan">
                        <option>Ponedjeljak</option>
                        <option>Utorak</option>
                        <option>Srijeda</option>
                        <option>Četvrtak</option>
                        <option>Petak</option>
                    </select>

                    <span class="naziv">Profesor:</span>

                    <select id="unosProfesora" data-ime="profesor">
                        <option></option>
                    </select>


                    <span class="naziv">Razred:</span>
                    <select id="unosRazreda" data-ime="razred">
                        <option></option>
                    </select>

                    <span class="naziv">Predmet:</span>
                    <select class="unosInput" id="unosPredmeta" data-ime="predmet">
                        <option></option>
                    </select>

                    <span class="naziv">Učionica: </span>

                    <select class="unosInput" id="unosUcionica" data-ime="ucionica">
                        <option></option>
                    </select>

                    <span class="naziv">Sat: </span>
                    <select class="unosInput" id="unosSati" data-ime="sat">
                        <option></option>

                    </select>

                    <span class="naziv">Smjena: </span>

                    <select class="unosInput" id="unosSmjena" data-ime="smjena">
                        <option></option>
                    </select>
                </form>

                <button class="gumb" type="button">Pretraži</button>
                <hr>
                <div class="naziv" id="slobodneUcionice">
                    <span>Slobodne učionice: </span>
                    <select class="unosSat" id="satSlobodno">
                        <option></option>
                    </select>

                </div>

                <button class="gumb" type="button">Pronađi</button>
                <div id="vrijeme">
                    <div id="trenutnoVrijeme"></div>
                    <div id="trenutniSat"></div>
                    <div id="preostaloVrijeme"></div>
                </div>
            </div>
            <div id="nazivTabliceMob">
                <span></span>
            </div>
            <div id="podaci">
                <div id="srednjiTablica">
                    <div id="nazivTablice">
                        <span></span>
                    </div>
                    <div id="zaTablicu">

                    </div>
                    <div id="praznaPretraga">Nema rezultata.</div>
                </div>
                <img id="zaGore" src="../raspored/assets/Dropdown180.png" />

            </div>

        </div>
    </div>

    <div id="container-loader">
        <p id="search-text">Tražim...</p>
        <div class="loader"></div>
    </div>

    <script>
        document.getElementById('povratak').onclick = function () {
            window.location.assign('/');
            
        }
    </script>
    <script src="../../data/data.js?v=<?php echo time();?>"></script>
    <script src="../../data/raspored.js?v=<?php echo time();?>"></script>

    <script>
        for (var t1 = 0; Podaci.Profesori.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Profesori[t1].Profesori;
            document.getElementById("unosProfesora").appendChild(el);
        }

    </script>

    <script>
        for (var t1 = 0; Podaci.Razredi.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Razredi[t1].Razred;
            document.getElementById("unosRazreda").appendChild(el);
        }

    </script>

    <script>
        for (var t1 = 0; Podaci.Predmet.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Predmet[t1].Predmet;
            document.getElementById("unosPredmeta").appendChild(el);
        }

    </script>
    <script>
        for (var t1 = 0; Podaci.Ucionice.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Ucionice[t1].Mjesto;
            document.getElementById("unosUcionica").appendChild(el);
        }
    </script>

    <script>
        for (var t1 = 0; Podaci.Sat.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Sat[t1].Sat;
            document.getElementById("unosSati").appendChild(el);

        }
    </script>
    <script>
        for (var t1 = 0; Podaci.Sat.length > t1; t1++) {
            var el = document.createElement("option");
            el.setAttribute("value", Podaci.Sat[t1].Sat);
            el.innerText = Podaci.Sat[t1].Sat + " sat";

            document.getElementById("satSlobodno").appendChild(el);
        }
    </script>
    <script>
        for (var t1 = 0; Podaci.Smjena.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Smjena[t1].Smjena;
            document.getElementById("unosSmjena").appendChild(el);
        }
    </script>
    <script>

    </script>
    <script>
        document.getElementById("unosDana").onchange = function () {

        }
    </script>
    <script>
        function PozivVrijeme() {

            d = new Date().toLocaleTimeString("hr-HR");
            d1 = new Date();
            h = parseInt(d.split(":")[0]);
            m = parseInt(d.split(":")[1]);
            s = h * 3600 + m * 60;

            document.getElementById("trenutnoVrijeme").innerText = d;

            if (m < 10) {
                m = "0" + m;
            }
            //var zx = h + ":" + m;
            var zx = h + "" + m;
            var checker = 1;


            for (var i = 0; Podaci.Vrijeme.length > i; i++) {
                var key = Podaci.Vrijeme[i].Sat;
                key = key.replace(":", "");
                key = Number(key);
                zx = Number(zx);


                if (zx > key) {

                    key = String(key);


                    if (key.length < 4) {
                        key = key[0] + ":" + key[1] + key[2];
                        key = String(key);
                    } else {
                        key = key[0] + key[1] + ":" + key[2] + key[3];
                        key = String(key);
                    }
                    value = Podaci.Vrijeme[i].Opis;

                    document.getElementById("trenutniSat").innerText = value;

                } else {

                }
                checker++;
            }

        }
        d2 = new Date()
        document.getElementById("unosDana").selectedIndex = d2.getDay() - 1;

        var curentDay = document.getElementById("unosDana").value;
        document.getElementById("nazivTablice").getElementsByTagName("span")[0].textContent = curentDay;
        document.getElementById("nazivTabliceMob").getElementsByTagName("span")[0].textContent = curentDay;

        PozivVrijeme();
        setInterval(PozivVrijeme, 1000);
    </script>
    <script>
        function IsporuciRasporedPoredan() {
            if (document.getElementById("unosProfesora").value != "" || document.getElementById("unosRazreda").value != "") {
                var table, rows, switching, i, x, y, shouldSwitch;
                table = document.getElementsByClassName("tablica")[0];
                switching = true;
                /*Make a loop that will continue until
                no switching has been done:*/
                while (switching) {
                    //start by saying: no switching is done:
                    switching = false;
                    rows = table.rows;
                    /*Loop through all table rows (except the
                    first, which contains table headers):*/
                    for (i = 1; i < (rows.length - 1); i++) {
                        //start by saying there should be no switching:
                        shouldSwitch = false;
                        /*Get the two elements you want to compare,
                        one from current row and one from the next:*/
                        x = rows[i].getElementsByTagName("TD")[1];
                        y = rows[i + 1].getElementsByTagName("TD")[1];
                        //check if the two rows should switch place:
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                    if (shouldSwitch) {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        console.log("radi");
                    }
                }
            } else {
                //alert("Sortiranje je moguće jedino kada se izabare stavka profesor ili razred!")
            }

        }


        function IsporuciRaspored() {
            var a;
            var b;
            var c;
            var d;
            var e;
            var f;
            var g;
            var increment;

            a = document.getElementById("unosDana").value;
            b = document.getElementById("unosProfesora").value;
            c = document.getElementById("unosRazreda").value;
            d = document.getElementById("unosPredmeta").value;
            e = document.getElementById("unosUcionica").value;
            f = document.getElementById("unosSati").value;
            g = document.getElementById("unosSmjena").value;
            var increment = 0;
            document.getElementById("praznaPretraga").removeAttribute("style");

            if (document.getElementsByClassName("tablica")[0]) {
                document.getElementsByClassName("tablica")[0].remove();
            }

            document.getElementById("container-loader").style.display = "block";
            //console.log("Radi")

            var el = document.createElement("table");
            el.className = "tablica";
            document.getElementById("zaTablicu").appendChild(el);
            var rowTable = document.createElement("tr");
            rowTable.innerHTML = "<tr><th>Ime i prezime</th><th>Sat</th><th>Predmet</th><th>Razred</th><th>Učionica</th><th>Smjena</th></tr>";
            document.getElementsByClassName("tablica")[0].appendChild(rowTable);

            for (increment; Raspored.Raspored.length > increment; increment++) {
                var prof = Raspored.Raspored[increment].Prof;
                var razred = Raspored.Raspored[increment].Razred;
                var predmet = Raspored.Raspored[increment].Predmet;
                var prostor = Raspored.Raspored[increment].Prostor;
                var dan = Raspored.Raspored[increment].Dan;
                var sat = Raspored.Raspored[increment].Sat;
                var smjena = Raspored.Raspored[increment].Smjena;
                // console.log(prof);

                //container-loader
                if ((prof == b || b == "") && (dan == a || a == "") && (razred == c || c == "") && (predmet == d || d == "") && (prostor == e || e == "") && (sat == f || f == "") && (smjena == g || g == "")) {
                    //console.log("Radi");
                    ""
                    var rowTable = document.createElement("tr");
                    var sat1 = sat.replace(".", "");
                    rowTable.setAttribute("data-sat", sat1);
                    rowTable.innerHTML = `<td>${prof}</td><td>${sat}</td><td>${predmet}</td><td>${razred}</td><td>${prostor}</td><td>${smjena}</td>`;
                    document.getElementsByClassName("tablica")[0].appendChild(rowTable);
                    //console.log(prof + " " + razred + " " + predmet + " " + prostor + " " + dan + " " + sat + " " + smjena);

                } else {
                    //console.log("Nema zapisa");
                    //console.log(prof + b);
                    //console.log(Raspored.Raspored[increment].Prof);
                }
            }

            if (document.getElementsByClassName("tablica")[0] && document.getElementsByClassName("tablica")[0].getElementsByTagName("tr").length == 1) {
                //document.getElementsByClassName("tablica")[0].remove();
                document.getElementById("praznaPretraga").style.display = "block";

            }

            //console.log("Gotovo");
            document.getElementById("nazivTablice").getElementsByTagName("span")[0].textContent = a;
            document.getElementById("nazivTabliceMob").getElementsByTagName("span")[0].textContent = a;
            document.getElementById("container-loader").removeAttribute("style");
            document.getElementById('nazivTabliceMob').scrollIntoView({ behavior: "smooth" })

            document.getElementsByClassName("tablica")[0].getElementsByTagName("TR")[0].getElementsByTagName("TH")[1].addEventListener("click", IsporuciRasporedPoredan);
            document.getElementsByClassName("tablica")[0].getElementsByTagName("TR")[0].getElementsByTagName("TH")[1].click();
        }
        IsporuciRaspored();



        document.getElementsByClassName("gumb")[0].addEventListener("click", IsporuciRaspored);


        document.getElementById("zaGore").addEventListener("click", function () {
            document.getElementById('naslov').scrollIntoView({ behavior: "smooth" });
        });

        document.getElementsByClassName("gumb")[1].addEventListener("click", function () {
            
            if (document.getElementById("unosSmjena").value != "") {
                var a, b;
                var increment = 0;
                var satIzbor = document.getElementById("satSlobodno").value;
                a = document.getElementById("unosDana").value;
                b = document.getElementById("unosSmjena").value;
                var sat = Raspored.Raspored[increment].Sat;



                if (document.getElementsByClassName("tablica")[0]) {
                    document.getElementsByClassName("tablica")[0].remove();
                }

                var el = document.createElement("table");
                el.className = "tablica";
                document.getElementById("zaTablicu").appendChild(el);
                var rowTable = document.createElement("tr");
                rowTable.innerHTML = "<tr><th>Ime i prezime</th><th>Sat</th><th>Predmet</th><th>Razred</th><th>Učionica</th><th>Smjena</th></tr>";
                document.getElementsByClassName("tablica")[0].appendChild(rowTable);

                for (increment; Raspored.Raspored.length > increment; increment++) {

                    var prof = Raspored.Raspored[increment].Prof;
                    var razred = Raspored.Raspored[increment].Razred;
                    var predmet = Raspored.Raspored[increment].Predmet;
                    var prostor = Raspored.Raspored[increment].Prostor;
                    var dan = Raspored.Raspored[increment].Dan;
                    var sat = Raspored.Raspored[increment].Sat;
                    var smjena = Raspored.Raspored[increment].Smjena;
                    if (sat == satIzbor && predmet == "//" && b == smjena) {
                        var rowTable = document.createElement("tr");
                        var sat1 = sat.replace(".", "");
                        rowTable.setAttribute("data-sat", sat1);
                        rowTable.innerHTML = `<td>${prof}</td><td>${sat}</td><td>${predmet}</td><td >${razred}</td><td class="slobodnaUcionica">${prostor}</td><td>${smjena}</td>`;
                        document.getElementsByClassName("tablica")[0].appendChild(rowTable);
                    } else {
                        
                    }


                }
                if(document.getElementsByClassName("tablica")[0].getElementsByTagName("tr").length > 1) {
                    document.getElementById("praznaPretraga").removeAttribute("style");

                } else {
                    document.getElementById("praznaPretraga").style.display = "block";
                }
                document.getElementById('nazivTabliceMob').scrollIntoView({ behavior: "smooth" })
            } else {
                alert("Izaberite sat i smjenu");
            }
        });



    </script>

</body>

</html>