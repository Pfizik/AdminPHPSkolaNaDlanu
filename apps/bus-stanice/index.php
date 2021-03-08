<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Vozni red lokalnih autobusa u Istri</title>
    <meta name="Description" content="Aplikacija za prikaz voznog reda lokalnih autobusa u Istri." />
    <meta name="Keywords" content="Raspored Gimnazije Pula,raspored,suglasnost,suglasnosti,autobus" />
    <link rel="stylesheet" href="style/skolanadlanucopy.css" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="icon" href="assets/favicon.png" type="image/png" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap&subset=latin-ext" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta property="og:title" content="Aplikacija Škola na dlanu - Vozni red lokalnih autobusa u Istri" />
    <meta property="og:site_name" content="Škola na dlanu" />
    <meta property="og:url" content="https://www.školanadlanu.hr" />
    <meta property="og:description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima za bržu i lakšu komunikaciju unutar škole. " />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="/data/logo.png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="900" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
</head>

<body onload="/* dayInput(), filterLine(), filter() */">
    <div id="box">
        <div id="naslov">
            <img id="povratak" src="assets/back.png" />
            <span>Vozni red lokalnih autobusa u Istri</span>
        </div>
        <div id="srednji">
            <div id="forma">
                <form id="prvaForma">
                    <span class="naziv">Grad:</span>
                    <select id="unosGrada">
                        <!--
                        <option>Rovinj</option>
                        <option>Pula</option>
                        <option>Poreč</option>
                        <option>Labin</option>
                        -->
                    </select>

                    <span class="naziv">Dan:</span>
                    <select id="unosDana">
                        <option>Ponedjeljak</option>
                        <option>Utorak</option>
                        <option>Srijeda</option>
                        <option>Četvrtak</option>
                        <option>Petak</option>
                        <option>Subota</option>
                        <option>Nedjelja</option>
                    </select>

                    <span class="naziv">Linija:</span>
                    <select id="unosLinije" oninput="//filter()"></select>

                    <span class="naziv">Polazište:</span>
                    <select id="unosPolazista" data-ime="profesor"></select>

                    <span class="naziv">Odredište:</span>
                    <select id="unosOdredista" data-ime="razred"></select>

                    <span class="naziv">Vrijeme dolaska:</span>
                    <input class="unosInput" id="unosVrijeme" data-ime="smjena" type="time">
                </form>

                <div>
                    <button class="gumb" type="button" id="pronadi">Pronađi</button>

                    <!---<button class="gumb" id="localTime" type="button">Local time</button>-->
                </div>
                <hr style="width: 95%">
                <div id="vrijeme">
                    <button id="map-switch" class="switch-inactive">
                        <img id="map-icon" src="assets/map-white.svg" />
                        <span>Mapa</span>
                    </button>
                    <p>Vrijeme sada</p>
                    <div id="trenutnoVrijeme"></div>
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
                    <div id="zaTablicu"></div>
                    <div id="praznaPretraga">Nema rezultata.</div>
                </div>
                <img id="zaGore" src="assets/dropdown.png" />
                <div id="map-div" class="mapdiv-inactive">
                    <iframe id="gmap" src=""></iframe>
                    <button id="map-exit" >
                        <img src="assets/back-white.svg" id="back-svg" />
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="container-loader">
        <p id="search-text">Tražim...</p>
        <div class="loader"></div>
    </div>

    <script src="database/data.js?v=3.97"></script>
    <script src="scripts/vrijeme.js"></script>
    <script src="scripts/fetch.js"></script>
    <script src="scripts/tablecreator.js"></script>
    <script src="scripts/markerplacer.js"></script>
    <script src="scripts/button.js"></script>
            <script>
        document.getElementById('povratak').onclick = function () {
            window.location.assign('/');
            console.log(2);
        }
    </script>
    <script>
        function PozivVrijeme() {

            d = new Date().toLocaleTimeString("hr-HR");
            d1 = new Date();
            h = parseInt(d.split(":")[0]);
            m = parseInt(d.split(":")[1]);
            s = h * 3600 + m * 60;
            //document.getElementById("trenutniSat").innerText = d;
            document.getElementById("trenutnoVrijeme").innerText = d;

        }
        PozivVrijeme();
        setInterval(PozivVrijeme, 1000);
    </script>
</body>

</html>