<?php
include "data/https.php";
?>
<?php 
include "data/session.php";

?>



<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap&subset=latin-ext" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="manifest" href="data/PWA/manifest.json">-->

    <link rel="icon" href="apps/favicon.png" type="image/png">
    <meta property="og:title" content="Aplikacija Škola na dlanu - Gimnazija Pula">
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

    <meta name="Description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima Gimnazije Pula za bržu i lakšu komunikaciju unutar škole.">
    <meta name="Keywords" content="Raspored Gimnazije Pula,raspored,suglasnost,suglasnosti">
    <title>Škola na dlanu</title>
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            font-size: 1.05vw;
        }
        
     /* Spinner početak */
        #container-loader {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            overflow: hidden;
            background-color: #ffffffdb;
            display: none;
            z-index: 21;
        }

        #search-text {
            color: black;
            font-size: 2rem;
            position: absolute;
            left: 50%;
            top: 57%;
            font-weight: 600;
            transform: translate(-50%, -50%);
            font-family: Helvetica;

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

        #background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: fixed;
            top: 0;
            left: 0;
            filter: brightness(70%);
        }

        #box-for-all {
            width: 100%;
            min-height: 100vh;
            height: auto;
            margin: 0;
            padding: 0;
            position: relative;
            display: grid;
            grid-template-rows: 25% auto 4% 4%;

        }

        #user-login {
            position: absolute;
            top: 0rem;
            right: 0.1rem;
            /* max-width: 10.5rem; */
            width: fit-content;
            height: auto;
            min-height: 4.5rem;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            align-items: center;
            background-color: transparent;
            z-index: 20;
            transition: 0.3s;
        }
        #user-login img {
            width: 3.3rem;
            height: auto;
            order: 2;
        }

        #user-login:hover {
            background-color: hsl(80, 100%, 50%);
            transition: 0.3s;
            cursor: pointer;
        }
        #user-login:hover p {
            color: black;
            transition: 0.3s;
        }
        #user-login p {
            font-size: 1.3rem;
            font-family: "Open Sans";
            margin: 0;
            color: white;
            transition: 0.3s;
            text-align: center;
            padding: 0 0.4rem 0 0.4rem;
            user-select: none;
            order: 1;
        }

        #container-for-title {
            width: 100%;
            height: auto;
            min-height: 5rem;
            font-family: "Audiowide";
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            margin-top: 1.2rem;

        }

        #container-for-title h1 {
            margin: 0;
            text-align: center;
            font-size: 7rem;
            color: #ffffff;
            text-decoration: solid white;
            text-shadow: 0.03em 0.03em 0.01em rgba(0, 0, 0, 0.4);
        }

        #container-for-title h3 {
            text-align: center;
            margin: 0;
            font-size: 3rem;
            color: #ffffff;
            text-decoration: solid white;
            text-shadow: 0.03em 0.03em 0.01em rgba(0, 0, 0, 0.4);
        }

        #list-of-apps {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin-top: 0;
        }

        .app {
            width: 20rem;
            height: 19rem;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            background-color: #000000cc;
            border-radius: 2rem;
            margin: 1.3rem 0rem 1.3rem 0rem;
            transition: 0.6s;
        }

        .link-to-app {
            text-decoration: none;
        }

        .app:hover {
            transition: 0.6s;
            background-color: #000000ed;
        }

        .app img {
            width: 11rem;
            height: 11rem;
        }

        .app {
            text-align: center;
            font-size: 1.5rem;
            text-decoration: none;
            border-bottom: 2px solid transparent;
            padding: 0 0.5rem 0 0.5rem;
            color: white;
            font-family: 'Open Sans';
            transition: 0.6s;
            cursor: pointer;
            margin: 1rem;

        }


        #sponsors {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            /* background-color: rgba(0, 0, 0, 0.8); */

        }

        #sponsors a {
            font-size: 0.85rem;
            text-decoration: none;
            color: white;
            font-family: 'Open Sans';
            text-align: center;
            padding: 0.3rem;
        }

        #footer {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            padding: 0.3rem;
            /* background-color: rgba(0, 0, 0, 0.8); */
        }

        #footer span {
            display: inline-block;
            text-align: center;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: 'Open Sans';
            background-color: unset;
            color: white;

        }

        @media (orientation: portrait) {

            html,
            body {
                font-size: 2.7vw;
            }

            #user-login {
                position: relative;
                width: fit-content;
                background-size: 50%;
                background-size: 86%;
                right: unset;
                left: 100%;
                transform: translateX(-101%);
                top: 0;
                background-position: top right;
                align-items: center;
            }
            
            #user-login img {
                width: 4rem;
                height: auto;
                order: 2;
            }

            #user-login p {
                font-size: 1.5rem;
                order: 1;
            }

            #box-for-all {
                grid-template-rows: auto auto auto auto;
            }

            #container-for-title h1 {
                font-size: 7rem;
            }

            #container-for-title h2 {
                font-size: 2.5rem;
            }

            #container-for-title {
                justify-content: start;
                margin-top: 0;

            }

            #list-of-apps {
                flex-direction: column;
                justify-content: flex-start;
                margin-top: 3rem;
            }
            .app {
                text-align: center;
                font-size: 1.7rem;
            }

            .app {
                width: 23rem;
                height: 20rem;
            }

            .app:hover {
                width: 21rem;
                transition: 0.6;
            }

            .app img {
                width: 12rem;
                height: 12rem;
            }

            #sponsors a,
            #footer span {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>
    <img src="data/pozadina.jpg" id="background-image">
    <div id="box-for-all">
        <div id="user-login">
            <img src="/data/userLogo.svg">
            <?php 
            if(!isset($_SESSION["sessionID"])) {
            echo "<p>Prijavi se</p>";
            } else {
                $json_file = file_get_contents("login/tempLogin/temp_" . $_SESSION['sessionID'] . ".txt");
                $personObjects = json_decode($json_file);
                echo "<p id='log-out'>Odjavi se, " . $personObjects->imeIPrezime . "</p>";
            }
            ?>
        </div>

        <div id="container-for-title">
            <h1>Škola na dlanu</h1>
            <h3></h3>
        </div>

        <div id="list-of-apps">

<?php
$directory = new DirectoryIterator("apps/");

foreach ($directory as $directory) {
    if ($directory->isDot()) {

    } else {
        if ($directory->isDir()) {
            echo "
            <a class=link-to-app href=apps/{$directory}/index.php>
                <div class=app>
                    <img src=apps/{$directory}/assets/icon/icon.svg>
                    <span>" . file_get_contents("apps/{$directory}/assets/name.txt") . "</span>
                </div>
            </a>
            ";
        }

    }

}
?>
        </div>

        <div id="sponsors">
            <script type="text/javascript" src="https://ads.plus.hr/text.js?target=_blank"></script>
            <a href="#"></a>
        </div>

        <div id="footer">
            <span>Privatnost i prikupljanje podataka:
                Mrežna stranica ŠkolaNaDlanu.hr, osim ako nije posebno naznačeno, ne prikuplja podatke svojih
                posjetitelja i korisnika, no koristi tehnologiju kojom bilježi broj posjetitelja. Verzija aplikacije
                2.2</span>
        </div>

    </div>

    <script src="data/data.js?v=<?php echo time() ?>"></script>

    <script>
        document.getElementById("container-for-title").getElementsByTagName("h3")[0].textContent = Podaci.Zaduzenja[0].ImeSkole;
    </script>
    <script>

        function setInitBackgroundImage() {
            var xScreen = screen.width;
            var yScreen = screen.height;
            if (xScreen > yScreen) {
                //pass

                var newStyle = " width: " + xScreen + "px; height: " + yScreen + "px";
                document.getElementById('background-image').style.cssText = newStyle;
                //console.log(event.target.screen.orientation.angle);
            } else {
                //document.getElementById('background-image').removeAttribute("style");
                var newStyle = " width: " + xScreen + "px; height: " + yScreen + "px";
                document.getElementById('background-image').style.cssText = newStyle;
                //console.log(event.target.screen.orientation.angle);

            }

        }
        function bcgImageSet() {
            var xScreen = screen.width;
            var yScreen = screen.height;
            if (xScreen > yScreen) {
                //pass

                var newStyle = " width: " + xScreen + "px; height: " + yScreen + "px";
                document.getElementById('background-image').style.cssText = newStyle;
                //console.log(event.target.screen.orientation.angle);
            } else {
                //document.getElementById('background-image').removeAttribute("style");
                var newStyle = " width: " + xScreen + "px; height: " + yScreen + "px";
                document.getElementById('background-image').style.cssText = newStyle;
                //console.log(event.target.screen.orientation.angle);

            }
        }

        //bcgImageSet();
        window.addEventListener("orientationchange", bcgImageSet);
        setInitBackgroundImage();


    </script>
    <script>
    function logOut() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             document.getElementById("search-text").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "login/logout.php?logOutNow=true", true);
          xhttp.send();
}

        document.getElementById("user-login").onclick = function () {
            if(document.getElementById("log-out")) {
                var urlToPowerAppLogOut = "login/logout.php";
                window.open(urlToPowerAppLogOut, "_parent");

            } else {
                var urlToPowerApp = "login/login.php";
                window.open(urlToPowerApp, "_parent");
                
            }

        }
    </script>
    <!--<script>
        if ('worker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('worker.js');
            });
        }

        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', function (e) {
            deferredPrompt = e;
            deferredPrompt.userChoice.then(function () {
                deferredPrompt = null;
            });
        });
    </script>-->
    <div id="container-loader">
        <p id="search-text">Odjavljujem se...</p>
        <div class="loader"></div>
    </div>
</body>

</html>