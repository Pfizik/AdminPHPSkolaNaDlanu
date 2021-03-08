<?php
    include("../../data/https.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="icon" href="../favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap&subset=latin-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


    <meta property="og:title" content="Aplikacija Škola na dlanu - Generator suglasnosti">
    <meta property="og:site_name" content="Škola na dlanu">
    <meta property="og:url" content="https://www.školanadlanu.hr">
    <meta property="og:description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima za bržu i lakšu komunikaciju unutar škole. ">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/data/logo.png">
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='900' />

    <title>Generator suglasnosti</title>
    <meta name="Description" content="Aplikacija za generiranje školskih suglasnosti.">
    <meta name="Keywords" content="Raspored Gimnazije Pula,raspored,suglasnost,suglasnosti">

    <meta name="language" content="Hrvatski">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 0.65vw;
            font-family: 'Open Sans', sans-serif;
            overflow: hidden;
        }

        /*za prikaz cijele stranice*/
        #box {
            height: 100%;
            width: 100%;
            display: grid;
            grid-template-columns: 100%;
            grid-template-rows: 7.5rem auto;
            flex-direction: column;
            justify-content: flex-start;
        }

        /**/

        #povratak,
        a {
            position: absolute;
            left: 1rem;
            height: 4.5rem;
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

        #srednji {
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
        }

        /*za prikaz forme*/
        #forma {
            height: 100%;
            width: 50rem;
            background-color: #000000cc;
            font-size: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            overflow: auto;
        }

        /**/

        /*za odabir između predloška suglasnosi i prazne suglasnosti*/
        #odabir {
            width: 100%;
            height: 4rem;
            display: flex;
        }

        #gotovaSugl,
        #urediSugl {
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.65rem;
            color: white;
            cursor: pointer;
        }

        #urediSugl {
            background-color: #7e7171;
            color: white;
            border-left: none;
        }

        /**/

        /*za prikaz forme za predložak suglasnosti*/
        #prvaForma {
            position: relative;
            margin-top: 1.3rem;
            top: 0rem;
            display: grid;
            grid-template-columns: 40% 60%;
            grid-auto-rows: auto;
            grid-row-gap: 2rem;
            /*height: 60rem; */
            width: 34rem;
        }

        .naziv {
            color: white;
            font-size: 1.6rem;
        }

        .unos {
            padding: 0;
            padding-left: 5px;
            font-size: 1.75rem;
            outline: none;
            color: black;
            background-color: #F5F5F6;
            border-style: none;
            font-family: 'Open Sans';
        }

        form input {
            height: 2.5rem;
        }

        input[type="date"],
        input[type="time"] {
            width: calc(100% - 5px);

        }

        #prvaForma textarea {
            height: 10rem;
            padding-top: 5px;
        }

        ::placeholder {
            color: gray;
            font-family: 'Open Sans';
            font-size: 1.4rem;
            font-style: italic;
        }

        /**/

        /*za prikaz forme za kreiranje vlastite suglasnosti*/
        #drugaForma {
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            display: none;
            width: 100%;
            height: 50rem;
        }

        #unosTeksta {
            width: 90%;
            margin-top: 2.5rem;
        }

        #tekstSugl {
            width: 90%;
            height: 65%;
        }

        #drugaBroj {
            display: flex;
            margin-top: 2.5rem;
            width: calc(90% + 5px);
            width: -webkit-calc(90% + 5px);
            justify-content: space-between;
        }

        #drugaBrojInput {
            width: 60%;
        }

        #drugaBrojSpan {
            width: 40%;
        }

        /**/

        /*izgled gumba*/
        .gumb {
            background-color: transparent;
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
            top: 0rem;
            margin-top: 1.3rem;
        }

        /**/

        /*prelazak mišem preko gumba*/
        .gumb:hover {
            background-color: hsl(80, 100%, 50%);
            color: black;
        }

        /**/

        #podaci {
            width: 100%;
            height: 100%;
            background-color: #F5F5F6;
        }

        /*za prikaz suglasnosti*/
        .suglasnost {
            width: 92.5rem;
            min-height: 37.5rem;
            height: 37.5rem;
            overflow: auto;
            background-color: white;
            position: absolute;
            bottom: 45%;
            left: 50%;
            transform: translate(-30%, 50%);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            line-height: 1.4;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
        }

        /**/

        /*naslov suglasnosti*/
        .top {
            position: relative;
            top: 0rem;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin: 0;
            padding: 0;
            width: 100%;
        }

        /**/

        /*dio za datum i potpis*/
        .datumPotpis {
            position: relative;
            right: 1rem;
            bottom: 1rem;
            font-size: 1.75rem;
            width: 100%;
            text-align: right;
        }

        /**/

        /*tekst suglasnosti*/
        .tekst {
            width: 90%;
            /* min-height: 35%; */
            height: auto;
            margin-top: 5rem;
            margin-bottom: 7rem;
            padding: 0;
            font-size: 1.75rem;
            text-align: justify;
            word-wrap: break-word;
        }

        /**/

        /*logo*/
        .logo {
            position: relative;
            left: 1.7rem;
            top: 1.7rem;
            width: 12rem;
            display: block;
            align-self: flex-start;
        }

        /**/

        /*animacija kod upisa teksta*/
        @keyframes Animacija {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /**/

        /*za oblikovanje teksta*/
        #stilTeksta {
            height: 20rem;
            width: 30rem;
            position: absolute;
            right: 12rem;
            bottom: -15rem;
            background-color: #000000cc;
            box-shadow: rgba(0, 0, 0, 0.16) -5px -5px 6px, rgba(0, 0, 0, 0.23) 5px 0px 6px;
            display: none;
        }

        #uredivanjeTeksta {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -20%);
            width: 90%;
            display: grid;
            grid-template-columns: 35% 65%;
            grid-auto-rows: auto;
            grid-row-gap: 2.5rem;
        }

        #uredivanjeNaslov {
            height: 5rem;
            width: 100%;
            background-color: #a3006d;
            cursor: pointer;
        }

        #uredivanjeNaslov span {
            width: max-content;
            font-size: 2.2rem;
            font-weight: bold;
            position: absolute;
            top: 2.5rem;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #ffffff;
        }

        #ikonaTekst {
            display: none;
        }

        /**/

        /*animacija za prikazivanje dijela za oblikovanje teskta*/
        @keyframes Podizanje {
            0% {
                bottom: -15rem;
            }

            100% {
                bottom: 0rem;
            }
        }

        /**/

        /*animacija za sakrivanje dijela za oblikovanje teskta*/
        @keyframes Spustanje {
            0% {
                bottom: 0rem;
            }

            100% {
                bottom: -15rem;
            }
        }

        /**/

        /*za scrollanje ovisno o poziciji na stranici*/
        #zaGore,
        #zaDolje {
            display: none;
        }

        /**/

        #podaciIspis {
            display: none;
        }

        @media (orientation: portrait) {

            html,
            body {
                font-size: 2.25vw;
                overflow: auto;
            }

            #box {
                min-height: 100%;
                height: 100vh;
                overflow: unset;
            }

            #povratak {
                display: none;
            }

            #naslov {
                position: relative;
            }

            #srednji {
                flex-direction: column;
                height: auto;

            }

            .naziv {
                font-size: 2.1rem;
            }

            #podaci {
                height: calc(100% + 92.5rem);
            }

            #forma {
                width: 100%;
                /* min-height: 100%; */
                height: auto;
                overflow: unset;
                padding-bottom: 1.7rem;
            }
            .unos {
                height: 3.2rem;
            }
            #prvaForma {
                position: relative;
                margin-top: 1.9rem;
                width: 95%;
                grid-template-columns: 50% 50%;
            }

            .gumb {
                margin-top: 2rem;
            }

            #podaci {
                position: relative;
                display: flex;
                flex-direction: column;
                align-content: flex-start;
                justify-content: flex-start;
                padding-bottom: 1rem;
            }

            #zaDoljeImg {
                height: 100%;
            }

            #zaDolje {
                position: relative;
                width: auto;
                height: 5rem;
                right: 15rem;
                display: initial;
                left: 0;
                bottom: 0;
            }

            .suglasnost {
                left: 50%;
                top: 0;
                transform: translate(-50%, 0%);
                position: relative;
                margin: 0;
                height: 92.5rem;
                width: 95%;
                margin-top: 2rem;
                margin-bottom: 1rem;
                justify-content: space-between;
            }

        }

        /*za printanje suglasnosti*/
        @media print {

            html,
            body {
                overflow: visible !important;
                min-height: none;
            }

            #naslov,
            #forma,
            #stilTeksta,
            #podaci,
            #box,
            #srednji,
            #povratak,
            a {
                display: none;
            }

            #podaciIspis {
                display: block;
                position: absolute;
                top: 0;
                max-height: fit-content;
                max-height: -moz-fit-content;
                max-height: -webkit-fit-content;
                width: 100%;
            }

            .suglasnost {
                overflow: unset;
                width: 100%;
                min-height: unset;
                height: fit-content;
                height: -moz-fit-content;
                height: -webkit-fit-content;
                top: 0cm;
                left: 0;
                transform: none;
                box-shadow: none;
                position: relative;
                margin-top: 0.7cm;
                page-break-inside: avoid;
                border-bottom: black 1px dotted;
            }

            .tekst {
                margin-top: 2.2cm;
                margin-bottom: 1.5cm;
            }

            .logo {
                width: 100px;
            }

        }

        /**/



        /**/
    </style>
    <style media="print" id="zaPrint">
        .tekst,
        .datumPotpis {
            font-size: 14px;
        }

        .top {
            font-size: 20px;
        }
    </style>

</head>

<body>
    <div id="box">
        <div id="naslov">
            <a href="#"><img id="povratak" src="../back.png" /></a>
            <span>Generator suglasnosti</span>
        </div>
        <div id="srednji">
            <div id="forma">
                <div id="odabir">
                    <div id="gotovaSugl"><span>Predložak suglasnosti</span></div>
                    <div id="urediSugl"><span>Kreiraj suglasnost</span></div>
                </div>
                <form id="prvaForma">
                    <span class="naziv">Razred:</span>
                    <select class="unos" id="razredUnos" data-ime="razred">
                        <option></option>

                    </select>
                    <span class="naziv">Tip aktivnosti:</span>
                    <select class="unos" data-ime="tipAktivnosti">
                        <option>
                        </option>
                        <option value="redovnoj nastavi">redovna nastava</option>
                        <option value="izvannastavnoj aktivnosti">izvannastavna aktivnost</option>
                        <option value="izvanškolskoj aktivnosti">izvanškolska aktivnost</option>
                    </select>
                    <span class="naziv">Predmet:</span>
                    <select class="unos" id="unosPredmeta" data-ime="predmet">
                        <option></option>

                    </select>
                    <span class="naziv">Razlog:</span>
                    <textarea class="unos" type="text"
                        placeholder="Unesite razlog... (npr. Gledanje predstave Mačak u čizmama održat će se u INK-u)"
                        data-ime="razlog"></textarea>
                    <span class="naziv">Datum: </span>
                    <input class="unos" type="date" data-ime="datum">
                    <span class="naziv">Vrijeme: </span>
                    <input class="unos" type="time" data-ime="vrijeme">
                    <span class="naziv">Profesor:</span>
                    <select class="unos" id="unosProfesora" data-ime="profesor">
                        <option></option>

                    </select>
                    <span class="naziv">Napomena:</span>
                    <textarea class="unos" type="text"
                        placeholder="Unesite napomenu ako ima potrebe (npr. Polazak je u 8 sati s pulskog kolodvora)"
                        data-ime="napomena"></textarea>

                    <span class="naziv">Broj suglasnosti:</span>
                    <input class="unos" type="text">

                    <!--<div id="zaDolje">
                        <img id="zaDoljeImg" src="assets/DropdownWhite.png" />
                    </div>-->

                </form>
                <form id="drugaForma">
                    <span class="naziv" id="unosTeksta">Unesite tekst za suglasnost:</span>
                    <br />
                    <textarea class="unos" id="tekstSugl"></textarea>
                    <div id="drugaBroj">
                        <span class="naziv" id="drugaBrojSpan">Broj suglasnosti:</span>
                        <input class="unos" id="drugaBrojInput" type="text">
                    </div>
                </form>
                <button class="gumb" type="button">Isprintaj</button>

            </div>
            <div id="podaci">
                <div class="suglasnost">
                    <img class="logo" src="assets/logo.png" />
                    <span class="top">SUGLASNOST</span>
                    <p class="tekst">
                        Učenik/ica _______________________________ (ime i prezime)
                        (<span id="razred">______________ (razred)</span>)
                        ima dopuštenje roditelja/skrbnika za sudjelovanje u
                        <span id="tipAktivnosti"> ________________ (tip aktivnosti)</span>
                        u sklopu predmeta
                        <span id="predmet">______________ (predmet)</span>.
                        <span id="razlog">______________ (razlog)</span>
                        održat će se
                        <span id="datum">______________ (datum)</span>
                        godine u
                        <span id="vrijeme">______________ (vrijeme)</span>
                        sati. Profesor/ica
                        <span id="profesor">______________</span>
                        voditelj je spomenute aktivnosti.
                        <br />
                        <span id="napomena"></span>
                    </p>
                    <p class="datumPotpis">Datum i potpis roditelja: _________________________________________</p>
                </div>
            </div>

        </div>

    </div>
    <div id="podaciIspis"></div>
    <div id="stilTeksta">
        <div id="uredivanjeNaslov">
            <span>Oblikuj tekst suglasnosti</span>
            <img id="ikonaTekst" src="assets/IkonaTekst.png" />
        </div>
        <form id="uredivanjeTeksta">
            <span class="naziv">Veličina:</span>
            <select class="unos" id="unosVelicineFonta">
                <option>10</option>
                <option>12</option>
                <option selected="selected">14</option>
                <option>16</option>
            </select>
            <span class="naziv">Font:</span>
            <select class="unos" id="unosFonta">
                <option selected="selected">Open Sans</option>
                <option>Arial</option>
                <option>Comic Sans MS</option>
                <option>Times New Roman</option>
                <option>Tahoma</option>
            </select>
        </form>
    </div>
    <script>
        var tekst;  //varijabla za tekst suglasnosti

        var ime;    //varijabla za dohvaćanje atributa data-ime koji služi za promjenu teksta suglasnosti

        var s;  //varijabla za oblikovanje formata datuma

        var font;   //varijabla za vrstu fonta

        var velicina;   //varijabla za velicinu fonta

        var brojSugl; //varijabla za broj suglasnosti

        /*svi pozivi funkcija*/
        //document.getElementById("zaDolje").addEventListener("click", Scrollaj);
        //document.getElementById("box").addEventListener("scroll", Scrollaj);
        document.getElementById("urediSugl").addEventListener("click", Micanje);
        document.getElementById("gotovaSugl").addEventListener("click", Micanje);
        for (var i = 0; i < document.getElementsByClassName("unos").length - 5; i++) {
            document.getElementsByClassName("unos")[i].addEventListener("input", Promjena);
        }
        document.getElementById("tekstSugl").addEventListener("input", Promjena);
        document.getElementsByClassName("gumb")[0].addEventListener("click", Umnozavanje);
        document.getElementById("uredivanjeNaslov").addEventListener("click", PodizanjeUredivanja);
        document.getElementById("unosVelicineFonta").addEventListener("input", PromjenaVelicine);
        document.getElementById("unosFonta").addEventListener("input", PromjenaFonta);
        /**/


        /**/

        /*funkcija za scrollanje ovisno o poziciji na stranici*/
        function Scrollaj(s) {
            if (s.target.id == "zaDoljeImg") {
                document.getElementById("podaci").scrollIntoView({ behavior: 'smooth' });
            }
            else if (s.target.id == "zaGoreImg") {
                document.getElementById("naslov").scrollIntoView({ behavior: 'smooth' });
            }
        }
        /**/

        /*funkcija za promjenu između predloška suglasnosti i prazne suglasnosti*/
        tekst = document.getElementsByClassName("tekst")[0].innerHTML;
        function Micanje(k) {
            if ((k.target.id == "urediSugl") || ((k.target.tagName == "SPAN") && (k.target.parentNode.id == "urediSugl"))) {
                document.getElementById("prvaForma").style.display = "none";
                document.getElementById("drugaForma").style.display = "flex";
                tekst = document.getElementsByClassName("tekst")[0].innerHTML;
                document.getElementsByClassName("tekst")[0].innerHTML = "";
                document.getElementById("gotovaSugl").style.backgroundColor = "#7e7171";
                document.getElementById("urediSugl").style.backgroundColor = "transparent";
            }
            else {
                document.getElementById("drugaForma").style.display = "none";
                document.getElementById("prvaForma").style.display = "grid";
                document.getElementsByClassName("tekst")[0].innerHTML = tekst;
                document.getElementById("urediSugl").style.backgroundColor = "#7e7171";
                document.getElementById("gotovaSugl").style.backgroundColor = "transparent";
            }
            for (var i = 0; i < document.getElementsByClassName("unos").length; i++) {
                document.getElementsByClassName("unos")[i].style.minHeight = window.getComputedStyle(document.getElementsByClassName("unos")[i]).height;
            }
            for (var i = 0; i < document.getElementsByClassName("naziv").length; i++) {
                document.getElementsByClassName("naziv")[i].style.minHeight = window.getComputedStyle(document.getElementsByClassName("naziv")[i]).height;
            }
        }
        /**/

        /*funkcija za promjenu teksta suglasnosti*/
        function Promjena(k) {
            if (k.target.id != "tekstSugl") {
                ime = k.target.getAttribute("data-ime");
                if ((k.target.value == "") && (ime != "napomena")) {
                    if (ime == "tipAktivnosti") {
                        document.getElementById(ime).innerHTML = " ________________ (tip aktivnosti)";
                    }
                    else {
                        document.getElementById(ime).innerHTML = " ______________ (" + ime + ")";
                    }
                }
                else {
                    document.getElementById(ime).innerHTML = k.target.value;
                }

                document.getElementById(ime).style.animation = "Animacija 0.5s linear forwards";
                if ((ime == "napomena") && (k.target.value != "")) {
                    document.getElementById(ime).innerHTML = "(Napomena: " + k.target.value + ").";
                    document.getElementById(ime).style.animation = "Animacija 0.5s linear forwards";
                }
                if (ime == "datum") {
                    s = document.getElementById(ime).innerText;
                    s = s.replace(/(\d{4})-(\d{2})-(\d{2})/, /$3.$2.$1./);
                    s = s.slice(1, s.length - 1);
                    document.getElementById(ime).innerText = s;
                    document.getElementById(ime).style.animation = "Animacija 0.5s linear forwards";
                }
                setTimeout(function () {
                    document.getElementById(ime).style.animation = "";
                }, 500);
            }
            else {
                document.getElementsByClassName("tekst")[0].innerText = k.target.value;
            }
        }
        /**/

        /*funkcija za povecanje broja suglasnosti*/
        function Umnozavanje() {
            if (document.getElementById("drugaBrojInput").value != "") {
                brojSugl = parseInt(document.getElementsByClassName("unos")[10].value);
            }
            else {
                brojSugl = parseInt(document.getElementsByClassName("unos")[8].value);
            }
            for (var i = 1; i < brojSugl + 1; i++) {
                document.getElementById("podaciIspis").append(document.getElementsByClassName("suglasnost")[0].cloneNode(true));
                document.getElementsByClassName("suglasnost")[i].style.boxShadow = "none";
            }
            setTimeout(function () {
                window.print();
            }, 250);
            setTimeout(function () {
                document.getElementById("podaciIspis").innerHTML = "";
            }, 2000);

        }
        /**/

        /*funkcija za podizanje dijela za oblikovanje teksta*/
        function PodizanjeUredivanja() {
            document.getElementById("stilTeksta").style.animation = "Podizanje 0.5s normal  ease-out";
            setTimeout(function () {
                document.getElementById("stilTeksta").style.animation = "";
            }, 500);
            document.getElementById("stilTeksta").style.bottom = "0rem";
            document.getElementById("uredivanjeNaslov").removeEventListener("click", PodizanjeUredivanja)
            document.getElementById("uredivanjeNaslov").addEventListener("click", SpustanjeUredivanja);
            document.getElementById("box").addEventListener("click", SpustanjeUredivanja);
        }
        /**/

        /*funkcija za spuštanje dijela za oblikovanje teksta*/
        function SpustanjeUredivanja() {
            document.getElementById("stilTeksta").style.animation = "Spustanje 0.5s normal  ease-out";
            setTimeout(function () {
                document.getElementById("stilTeksta").style.animation = "";
            }, 500);
            document.getElementById("stilTeksta").style.bottom = "-15rem";
            document.getElementById("uredivanjeNaslov").removeEventListener("click", SpustanjeUredivanja);
            document.getElementById("box").removeEventListener("click", SpustanjeUredivanja);
            document.getElementById("uredivanjeNaslov").addEventListener("click", PodizanjeUredivanja);
        }
        /**/

        /*funkcija za promjenu vrste fonta*/
        function PromjenaFonta() {
            font = document.getElementById("unosFonta").value;
            document.getElementsByClassName("suglasnost")[0].style.fontFamily = font;
        }
        /**/

        /*funkcija za promjenu veličine fonta*/
        function PromjenaVelicine() {
            velicina = document.getElementById("unosVelicineFonta").value;
            velicina = parseInt(velicina);
            document.getElementById("zaPrint").innerText = `html,
                                                            body {
                                                                overflow: visible !important;
                                                            }
                                                            .tekst, .datumPotpis {
                                                                font-size: ` + velicina + `px !important;
                                                            }
    
                                                            .top {
                                                                font-size: ` + (velicina + 6) + `px !important;
                                                            }`;
            velicina = (1.75 * velicina) / 14;
            document.getElementsByClassName("tekst")[0].style.fontSize = velicina + "rem";
            document.getElementsByClassName("datumPotpis")[0].style.fontSize = velicina + "rem";
            document.getElementsByClassName("top")[0].style.fontSize = velicina + 0.75 + "rem";
        }
        /**/

    </script>
    <script>
        document.getElementById('povratak').onclick = function () {
            window.location.assign('/');
        }

    </script>
    <script src="../../data/data.js?v=<?php echo time()?>"></script>
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
            document.getElementById("razredUnos").appendChild(el);
        }
    </script>
    <script>
        for (var t1 = 0; Podaci.Predmet.length > t1; t1++) {
            var el = document.createElement("option");
            el.innerText = Podaci.Predmet[t1].Predmet;
            document.getElementById("unosPredmeta").appendChild(el);
        }
    </script>
</body>

</html>