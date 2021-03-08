<?php include "../../data/https.php"; ?>
<?php include "../../data/session.php"; ?>
<?php include "../../data/check_user.php"; ?>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Audiowide&amp;display=swap&amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="icon" href="../favicon.png" type="image/png">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <meta property="og:title" content="Aplikacija Škola na dlanu - SMS obavijesti">
    <meta property="og:site_name" content="Škola na dlanu">
    <meta property="og:url" content="https://www.školanadlanu.hr">
    <meta property="og:description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima za bržu i lakšu komunikaciju unutar škole. ">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/data/logo.png">
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='900' />
    <meta name="Description" content="Aplikacija za obavještavanje učenika i profesora putem SMS-a.">
    <meta name="Keywords" content="SMS obavijesti">
    <title>Slanje SMS obavijesti</title>
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }

        #povratak, a {
            position: absolute;
            left: 1rem;
            height: 4.5rem;
        }

        /*za naslov*/
        .page-header {
            height: 8rem;
            width: 100%;
            background-color: #a3006d;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 0;
            padding: 0;
        }

        .page-header span {
            width: max-content;
            font-size: 3rem;
            color: white;
            font-family: 'Audiowide', cursive;
        }
        /**/

        /*za prikaz cijele stranice*/
        .container {
            padding: 0;
            margin: 0;
            width: 100%;
        }
        /**/

        /*za opis stranice*/
        .lead {
            padding-left: 4rem;
            padding-right: 4rem;
            text-align: justify;
        }
        /**/

        /*za formu*/
        .form-horizontal {
            padding-left: 5rem;
            padding-right: 5rem;
        }
        /**/
            #my-response {
             margin: 10px;
            }
            h4 {
            font-weight: bold;
            font-size: 1.8rem;
            margin-top: 1rem;
            margin-bottom: 1rem;

        }

        /*za naziv unosa*/
        .col-sm-2 {
            padding-right: 1.5rem;
            padding-left: 1.5rem;
        }
        /**/

        /*za unos*/
        .form-control {
            height: 3.4rem;
        }
        /**/

        /*za naslove formi*/
        /*
        .panel-default>.panel-heading {
            color: black;
            background-color: rgb(232, 232, 232); hsl(80, 90%, 50%)
            border-color: #ddd;
        }
        */
        /* Dodao */
      .panel-default>.panel-heading {
            color: white;
            background-color: #000000cc;
            border-color: #ddd;
        }
        .panel-heading {
            padding: 1rem 1.5rem;
        }
        /**/

        /*za dugme*/
        .btn {
            font-weight: bold;
            align-self: center;
        }
        .btn-lg{
            position: relative;
            left: 50%;
            transform: translateX(-50%);
            background-color: hsl(320, 100%, 32%); /* Dodao */
            border: 1px solid hsl(320, 100%, 32%);  /* Dodao */
            transition: 0.3s; /* Dodao */
            color: white; /* Dodao */
            padding-left: 2rem; /* Dodao */
            padding-right: 2rem; /* Dodao */
        }
        /* Dodao */
        .btn-default:hover {
        color: white !important;
        background-color: #7b0454 !important;
        border: 1px solid #7b0454 !important;
        transition: 0.3s;
        }
        /**/

        /*prilagodba mobitelima*/
        @media screen and (max-device-width: 500px), (max-width: 500px) {
            html, body {
                font-size: 5px;
                min-height: 100vh;
            }

            #povratak, a {
                display: none;
            }

            .page-header {
                height: 11rem;
            }

            .page-header span {
                font-size: 5rem;
            }
            .lead {
                font-size: 3rem;
                margin-bottom: 3rem;
            }
            .form-horizontal {
                padding-left: 3rem;
                padding-right: 3rem;

            }
            .form-horizontal .control-label {
                text-align: left;
                margin-bottom: 2rem;
            }
            h4 {
                font-size: 3rem;
            }

            .col-sm-2 {
                font-size: 3rem;
                float: none;
                width: 95%;
                height: 3rem;
            }
            .form-control {
                width: 100%;
                /* margin-left: 2rem; */
                height: 6rem;
                font-size: 3rem;
            }
            .btn-lg{
                position: relative;
                left: 50%;
                transform: translateX(-50%);
                font-size: 4rem;
                margin-top: -2rem;
                margin-bottom: 0rem;
                padding: 2rem 3rem 2rem 3rem;

            }
            .alert-danger {
                font-size: 2rem;
            }
        }
        /**/
    </style>
</head>

<body>
    <div class="container">

        <div class="page-header">
            <a href="/"><img id="povratak" src="../back.png" /></a>
            <span>Slanje SMS obavijesti</span>
        </div>
        <!--<p class="lead">Pošaljite napredni SMS sa svim dostupnim značajkama i parametrima.</p>-->

        <form action="response.php" method="POST" id="send_form"
            class="form-horizontal">
            <!--<div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Autentifikacija</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="in_username" class="col-sm-2 control-label">Korisničko ime</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="in_username" placeholder="Korisničko ime"
                                name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="in_password" class="col-sm-2 control-label">Lozinka</label>

                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="in_password" placeholder="Lozinka"
                                name="password">
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Slanje poruke</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="in_from" class="col-sm-2 control-label">Pošiljatelj</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="in_from"
                                placeholder="Pošiljatelj (mogu se upisati slova)" name="fromInput" value="GimnazijaPu">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="in_to" class="col-sm-2 control-label">Broj telefona</label>

                        <div class="col-sm-10">
                        <select id="in_to" class="form-control" name="toInput" required>
                            <option></option>
                            <option value="00385959049229">Dejan Pavlinović, prof.</option>
                            <option value="00385989987710">Nikola Vujačić, prof.</option>
                            <option value="00385998277280">Filip Zoričić, prof.</option>
                        </select>
                            <!--<input type="text" class="form-control" id="in_to"
                                placeholder="Broj mobitela u međunarodnom obliku (primjer: 003859899855212)" name="toInput">-->
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="in_messageId" class="col-sm-2 control-label">ID poruke</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="in_messageId" placeholder="ID poruke"
                                name="messageIdInput">
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label for="in_text" class="col-sm-2 control-label">Tekst poruke</label>

                        <div class="col-sm-10">
                            <textarea class="form-control" id="in_text" placeholder="Tekst poruke" name="textInput"
                                rows="4"></textarea>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="in_notify_url" class="col-sm-2 control-label">Notify URL</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="in_notify_url" placeholder="Notify URL"
                                name="notifyUrlInput">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="in_notify_contentType" class="col-sm-2 control-label">Notify content type</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="in_notify_contentType"
                                placeholder="Notify content type (application/json, application/xml)"
                                name="notifyContentTypeInput">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="in_callback_data" class="col-sm-2 control-label">Callback data</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="in_callback_data" placeholder="Callback data"
                                name="callbackDataInput">
                        </div>
                    </div>-->
                </div>
            </div>

            <input class="btn btn-default btn-lg" type="submit" value="Pošalji">
        </form>


</body>

</html>

</html>
