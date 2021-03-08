
<?php
    include("../../data/https.php");
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="icon" href="../favicon.png" type="image/png">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta property="og:title" content="Aplikacija Škola na dlanu - Tražilica enciklopedija">
    <meta property="og:site_name" content="Škola na dlanu">
    <meta property="og:url" content="https://www.školanadlanu.hr">
    <meta property="og:description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima za bržu i lakšu komunikaciju unutar škole. ">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/data/logo.png">
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='900' />

    <title>Tražilica hrvatskih enciklopedija</title>
    <meta name="Description" content="Aplikacija za pretraživanje enciklopedija na hrvatskom jeziku. Sve na jednom mjestu.">
    <meta name="Keywords" content="Raspored Gimnazije Pula,raspored,suglasnost,suglasnosti">
    
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
        
        #povratak {
            position: absolute;
            left: 1rem;
            height: 4.5rem;
            cursor: pointer;
        }
        
        /*za naslov*/
        #naslov {
            width: 100%;
            background-color: #a3006d;
            font-size: 3rem;
            color: white;
            font-family: 'Audiowide', cursive;
            text-align: center;
            height: 7.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /**/

        /*za prikaz cijele stranice*/
        #srednji {
            width: 100%;
        }
        /**/
        
        /*opis stranice*/
        #opis
        {
            font-size: 2rem;
            padding-left: 1rem;
            text-align: center;
            padding: 2rem;
        }
        /**/
        
        /*Google-ova tra탑ilica*/
        .gcse-search {
            width: 50%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        /**/
        
        /*prilagodba mobitelima*/
        @media screen and (max-device-width: 500px) and (max-width: 500px) {

            html,
            body {
                font-size: 2.65vw;
                scroll-behavior: smooth;
                -webkit-tap-highlight-color: transparent;
                -webkit-overflow-scrolling: touch;
                
            }
            
            #povratak {
                display: none;
            }
            
            #naslov {
                height: 10rem;
            }
        }
        /**/
    </style>
</head>

<body>
    <div id="naslov">
        <img id="povratak" src="../back.png" />
        Tražilica hrvatskih enciklopedija
    </div>
    <div id="srednji">
        <div id="opis">
            Na ovoj stranici možete uz par klikova jednostavno i brzo pretražiti stranice hrvatskih enciklopedija o
            temama i pojmovima koji vas zanimaju. Sve informacije koje se prikažu nakon pretrage, preuzete su s Istrapedije, Hrvatske enciklopedije i Istarske enciklopedije. Iste informacije ne pripadaju aplikaciji ŠkolaNaDlanu.hr.
        </div>
        <script async src="https://cse.google.com/cse.js?cx=f1a187eeac10c8881"></script>
        <div class="gcse-search"></div>
    </div>
    <script>
        document.getElementById('povratak').onclick = function() {
           window.location.assign('/');
        }
        
        
    </script>
</body>

</html>