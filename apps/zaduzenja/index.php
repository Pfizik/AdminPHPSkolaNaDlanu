<?php include "../../data/https.php"; ?>
<?php include "../../data/session.php"; ?>
<?php include "../../data/check_user.php"; ?>


<!DOCTYPE html>
<html>

<head>
    <title>Zaduženja</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Audiowide&amp;display=swap&amp;subset=latin-ext"
        rel="stylesheet">
    <link rel="icon" href="../favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <meta property="og:title" content="Aplikacija Škola na dlanu - Zaduženja">
    <meta property="og:site_name" content="Škola na dlanu">
    <meta property="og:url" content="https://www.školanadlanu.hr">
    <meta property="og:description"
        content="Korisna aplikacija Škola na dlanu služi profesorima i učenicima za bržu i lakšu komunikaciju unutar škole. ">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/data/logo.png">
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='900' />
    <meta name="Description" content="Aplikacija za školska zaduženja.">
    <meta name="Keywords" content="Raspored Gimnazije Pula,raspored,suglasnost,suglasnosti,zaduženja">
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            position: relative;
            top: 0;
            left: 0;
            font-size: 0.65vw;
        }

        #sub-options {
            height: 65rem;
            width: 120rem;
            position: absolute;
            background-color: white;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            z-index: 1;
            left: 50%;
            top: 55%;
            transform: translate(-50%, -50%);
            display: none;
            font-family: "Open Sans";
        }

        #name-of-option {
            margin-left: 1rem;
            font-size: 2.8rem;
        }

        .properties_off span {
            color: darkgrey;
            height: auto;
            position: relative;
            text-align: center;
            cursor: pointer;
            font-size: 1.2rem !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.3rem;
            padding: 1.2rem 0 1.2rem 0;
            width: 100%;
            margin-left: 0 !important;
            transition: 0.5s;
        }

        #container-for-dropdown-options {
            width: 100%;
            height: auto;
            display: grid;
            grid-template-columns: 33% 60%;
            align-items: center;
            grid-auto-rows: auto;
            margin-left: 1rem;
            grid-row-gap: 1rem;
        }

        #sub-title {
            width: 100%;
            height: 5.5rem;
            background-color: #a3006d;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            position: relative;

        }

        #sub-title p {
            font-size: 3.1rem;
            color: white;
            font-family: 'Audiowide', cursive;
        }

        #sub-title span {
            position: absolute;
            right: 0;
            top: 0;
            color: white;
            font-size: 2.3rem;
            cursor: pointer;
            font-family: 'Audiowide', cursive;
        }

        .name-of-class {
            font-size: 1.7rem;
        }

        .options {
            height: 2.5rem;
            font-size: 1.4rem;
        }

        .options[multiple] {
            height: auto;
            min-height: 11rem;
        }

        #enter-changes {
            position: absolute;
            bottom: 2%;
            right: 2%;
            font-size: 1.7rem;
            padding: 0.5rem 1.8rem 0.5rem 1.8rem;
        }

        .hidden-data {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
        }

        h4.selected-option {
            margin-bottom: 0.5rem;
            margin-top: 0.5rem;
        }

        .list-of-dutys {
            display: block;
            margin-left: auto;
            font-size: 1.5rem;
        }

        #main-box {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: auto;
            background-color: #F5F5F6;
        }

        #header-bar {
            width: 100%;
            height: 7.5rem;
            background-color: #a3006d;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        #header-bar p {
            font-size: 3.1rem;
            color: white;
            font-family: 'Audiowide', cursive;
        }

        #povratak {
            position: absolute;
            left: 1rem;
            height: 4.5rem;
            cursor: pointer;
        }

        #table-data-css {
            min-height: 10rem;
            max-height: 60rem;
            height: auto;
            width: 115rem;
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow: auto;
            background-color: white;
            display: flex;
            flex-direction: column;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            font-family: 'Open Sans';
            padding: 1rem;
        }

        #name-of-school {
            margin: 2rem 0 2rem 0;
            font-size: 2.5em;
        }

        #general-data p,
        #general-data span {
            font-size: 1.5rem;
            margin-left: 0.5rem;
        }

        #date {
            font-family: 'Open Sans';
        }

        #general-data span {
            display: grid;
            grid-template-columns: 20% auto;
            justify-items: start;
            height: 2rem;
            margin: 1rem 0 1rem 0;
            font-weight: 800;

        }

        #general-data h2 {
            text-align: center;
            margin: 1rem 0 1rem 0;
            font-size: 1.7rem;
        }

        #personal-data span {
            display: inline-block;
            height: 2rem;
        }

        #personal-data p,
        #personal-data span {
            font-size: 1.5rem;
            margin-left: 0.5rem;
        }

        .sugestija-priprema {
            display: list-item;
            margin-left: 2.5rem !important;
            color: darkred;
        }

        #direct-working-table {
            width: 100%;
            display: block;
        }

        #names-of-teacher {
            width: 30%;
            font-size: 1.5rem;
        }

        #teacher-name {
            margin: 1rem 0 1.7rem 0;
            font-weight: 800;
        }

        #direct-working-table table {
            width: 100%;
            margin: 1% 0 1% 0%;
        }

        #direct-working-table,
        h3 {
            font-size: 1.7rem;
        }

        #direct-working-table th {
            text-align: center;
        }

        #logs,
        #logs2,
        #logs3,
        #logs4,
        #logs5 {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            /* border-collapse: collapse; */
            width: 100%;
            position: relative;
            top: 0;
            left: 0;
        }

        hr {
            margin: 3rem 0 1rem 0;
        }

        .num-subject-week {
            margin-left: 0;
            width: 100%;
            text-align: center;
            font-size: 1.3rem;
        }

        #logs td,
        #logs th,
        #logs2 td,
        #logs2 th,
        #logs3 td,
        #logs3 th,
        #logs3 td,
        #logs4 th,
        #logs4 td,
        #logs5 th,
        #logs5 td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #logs tr:nth-child(even),
        #logs2 tr:nth-child(even),
        #logs3 tr:nth-child(even),
        #logs4 tr:nth-child(even),
        #logs5 tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #logs tr:hover,
        #logs2 tr:hover,
        #logs3 tr:hover,
        #logs4 tr:hover,
        #logs5 tr:hover {
            background-color: #ddd;
        }

        #logs th,
        #logs2 th,
        #logs3 th,
        #logs4 th,
        #logs5 th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            font-size: 1.3rem;
        }

        .table-entry tr td:nth-child(3),
        .table-vacation tr td:nth-child(3) {
            text-align: center;
        }

        .table-entry tr td:nth-child(4),
        .table-vacation tr td:nth-child(4) {
            text-align: center;
        }

        .table-entry tr td:nth-child(5),
        .table-vacation tr td:nth-child(5) {
            text-align: center;
        }

        .num {
            width: 5%
        }

        .type-of-job {
            width: 50%;
        }

        .num-in-week {
            width: 15%;
        }

        .week-in-year {
            width: 15%;
        }

        .hours-in-year {
            width: 15%;
        }

        #general-data input {
            padding: 0.1rem;
            font-size: 1.3rem;
            width: 30%;
        }

        #personal-data .properties span {
            height: auto;
            position: relative;
            text-align: center;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.3rem;
            padding: 1.2rem 0 1.2rem 0;
            width: 100%;
            margin-left: 0;
            transition: 0.5s;
        }

        #personal-data #teacher-name {
            display: grid;
            grid-template-columns: 20% auto;
            justify-items: start;
            height: 2rem;
            margin: 1rem 0 1rem 0;
        }

        .properties span:nth-child(2):hover {
            background-color: red;
            color: white;
            transition: 0.5s;
            user-select: none;
        }

        .properties span:nth-child(1):hover {
            background-color: #4CAF50;
            color: white;
            transition: 0.5s;
            user-select: none;
        }

        select.direct-teaching,
        select.rest-of-teaching,
        select.during-break,
        select.vacation,
        select.extra {
            width: 100%;
            font-size: 1.5rem;
            height: 2.5rem;
        }

        #container-for-end-controls {
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        .end-controls {
            font-size: 1.5rem;
            min-width: 8rem;
            width: auto;
            padding: 0.5rem 1.6rem 0.5rem 1.6rem;
            margin: 1rem 0rem 1rem 1.5rem;
            display: inline-block;
        }

        #repeal {
            padding: 1rem 0 1rem 0;

        }

        .summary {
            display: flex;
            flex-direction: column;
        }


        .num {
            margin: initial;
            padding: initial;

        }

        #end-line {
            margin: 1rem 0 1rem 0;
        }

        #signature {
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 100%;
            margin-right: 1rem;
            position: relative;
        }

        #signature span.signatures {
            position: relative;
            min-height: 1rem;
            height: auto;
            width: 100%;
            display: block;
        }

        #signature span:nth-child(1) {
            text-align: left;
        }

        #signature span:nth-child(2) {
            text-align: right;
        }

        #give-to p:first-child {
            margin-bottom: 1rem;
        }

        #give-to p {
            margin-bottom: 0;
            margin-top: 0;
        }

        .vacation-calc-input {
            width: 20rem;
            font-size: 1.5rem;
            height: 2.5rem;
        }

        @media (orientation: portrait) {

            html,
            body {
                font-size: 2.2vw;
            }

            #povratak {
                display: none;
            }

            #sub-options {
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                transform: translate(0%, 0);
            }

            #table-data-css {
                min-height: 10rem;
                max-height: unset;
                width: 94%;
                top: calc(1% + 7.5rem);
                left: 50%;
                transform: translate(-50%, 0%);
                margin-bottom: 3%;
            }

            #general-data span {
                grid-template-columns: 35% auto;
            }

            #general-data input {
                padding: 0.1rem;
                font-size: 1.3rem;
                width: 90%;
            }

            #personal-data #teacher-name {
                display: grid;
                grid-template-columns: 47% auto;
            }

            #names-of-teacher {
                width: 93%;
                font-size: 1.5rem;
            }

            .table-vacation tr td:nth-child(6),
            .table-vacation tr th:nth-child(6) {
                /* width: 86% !important; */
                display: none;
            }

            #signature {
                display: grid;
                grid-template-columns: 100%;
                grid-template-rows: auto;
                margin-right: 1rem;
                position: relative;
            }

            #signature span:nth-child(2) {
                text-align: left;
            }
        }

        @media print {

            html,
            body {
                font-size: 10px;
                height: 0;
            }

            #uputstva {
                display: none;
            }

            * {
                break-inside: auto;
            }

            .summary {
                break-inside: avoid;
            }

            #header-bar {
                display: none;
            }

            #main-box {
                background-color: transparent;
                overflow: visible;
            }

            #table-data-css {
                min-height: initial;
                max-height: initial;
                height: auto;
                width: 100%;
                position: relative;
                top: 0%;
                left: 0%;
                transform: translate(0%, 0%);
                overflow: visible;
                background-color: white;
                display: block;
                flex-direction: column;
                box-shadow: initial;
                font-family: 'Open Sans';
                padding: 0rem;
            }

            .sugestija-priprema {
                display: none;
            }

            /*
            #logs th,
            #logs2 th,
            #logs3 th,
            #logs4 th,
            #logs5 th {
                background-color: darkgray;
            }
            */
            /* table td::after {
                content: "Hej";
                display: block;
                font-size: 2rem;
                /* break-inside: auto;
                color: transparent;
                background-color: transparent;
                page-break-after: auto;
            }
            .break {
                page-break-before: always !important;
            }

            */
            * {
                page-break-after: auto;
            }

            table td * {
                page-break-after: auto !important;
            }

            .selected-option {
                page-break-after: auto;

            }

            #general-data input,
            #names-of-teacher {
                width: 50%;
                border: transparent;
                font-size: 1.5rem;
                padding: 0;
                margin: 0;

            }

            #general-data span {
                display: block;
                grid-template-columns: 35% auto;
            }

            #personal-data #teacher-name {
                display: block;
                grid-template-columns: 35% auto;
                justify-items: start;
                height: 2rem;
                margin: 1rem 0 1rem 0;
            }

            #container-for-end-controls {
                display: none;
            }

            #repeal {
                position: relative;
                margin: 0;
            }

            th:nth-child(6),
            .properties {
                display: none;
            }

            th:nth-child(6),
            .properties_off {
                display: none;
            }

            #sub-options {
                display: none;
            }

            td select {
                display: none;
            }
        }
    </style>
</head>

<body>
    <span id="box-create"></span>

    <div id="main-box">

        <div id="sub-options">
            <div id="sub-title">
                <p>Izbornik</p>
                <span>(X)</span>

            </div>
            <h3 id="name-of-option">Lorem ipsum</h3>
            <p id="name-of-table" class="hidden-data">Lorem ipsum</p>
            <h3 id="name-of-option-hidden" class="hidden-data">Lorem ipsum</h3>
            <p id="name-of-row" class="hidden-data">Lorem ipsum</p>
            <div id="container-for-dropdown-options">
                <span class="name-of-class">Razred:</span>
                <select class="options" multiple>
                    <option value="">Razredi nisu uključeni</option>
                    <option value="Svi razredi">Svi razredi</option>
                </select>

                <!--<span class="name-of-class">Razred:</span>
                <select class="options" data-attribute="multiple" multiple>

                </select>-->

                <span class="name-of-class">Smjer:</span>
                <select class="options" multiple>
                    <option value="">Smjerovi nisu uključeni</option>
                    <option value="svi smjerovi">Svi smjerovi</option>
                    <option value="opći smjer">Opći smjer</option>
                    <option value="jezični smjer">Jezični smjer</option>
                    <option value="sportski smjer">Sportski smjer</option>
                    <option value="matematički smjer">Matematički smjer</option>
                </select>


                <span class="name-of-class">Predmeti:</span>
                <select class="options" id="subjects">
                    <option></option>

                </select>


                <span class="name-of-class">Tjedni br. sati rada:</span>
                <input type="number" class="options">
                <!-- <select class="options">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                </select>
            -->

                <span class="name-of-class">Naziv projekti, izleta, dodatno objašnjenje:</span>
                <input type="text" placeholder="Naziv projekt: npr. Putevima glagoljaša" class="options projects">
                <span class="name-of-class">Broj radnih tjedana:</span>
                <select class="options" id="maturanti">
                    <option value="35">35 tjedana</option>
                    <option value="32">32 tjedna za maturante</option>
                    <option value="3" data-for-table="0" data-rest-weeks="3">Ne računaj tjedne (kada nema maturanata)
                    </option>
                </select>

            </div>
            <hr>
            <!--<p id="suggestion" class="name-of-class">.....</p>-->
            <input type="button" value="OK" id="enter-changes">
        </div>
        <div id="header-bar">
            <img id="povratak" src="../back.png" />
            <p>Zaduženja</p>
        </div>

        <div id="table-data-css">
            <div id="general-data">

                <h1 id="name-of-school"></h1>

                <span id="klasa">Klasa: &nbsp; <input type="text"> </span>

                <span id="ur-broj">Urbroj: <input type="text"></span>

                <span>Datum ispunjavanja: <input type="date" id="date" value="2017-06-01"></span>
                <span>Školska godina: <input type="text" id="acad-year"></span>

                <p id="legal">

                </p>
                <h2>Odluku o tjednom i godišnjem zaduženju nastavnika</h2>

            </div>
            <div id="personal-data">
                <span id="teacher-name">Prezime i ime nastavnika:
                    <select id="names-of-teacher">

                        <option value=""></option>

                    </select>
                </span>
                <div id="direct-working-table">
                    <h3>a) Neposredan rad s učenicima - redovita nastava</h3>
                    <table id="logs" class="table-entry">
                        <tbody>
                            <tr>
                                <th class="num">R. br.</th>
                                <th class="type-of-job">Vrsta posla</th>
                                <th class="num-in-week">Broj sati tjedno</th>
                                <th class="week-in-year">Broj radnih tjedana u godini</th>
                                <th class="hours-in-year">Ukupni broj radnih sati u godini</th>
                                <th>Mogućnosti</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>
                                    <select class="direct-teaching">
                                        <option></option>
                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="properties">
                                    <span>
                                        + Dodaj red ispod
                                    </span>

                                    <span>
                                        - Izbriši red
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="summary">
                        <span>Ukupan broj sati tjedno: <span class="num weeks">0</span></span>

                        <span>Ukupan broj radnih sati godišnje: <span class="num hours-years">0</span></span>
                    </div>



                    <h3 class="break">b) Ostali poslovi vezani za redovitu nastavu</h3>
                    <table id="logs2" class="table-entry">
                        <tbody>
                            <tr>
                                <th class="num">R. br.</th>
                                <th class="type-of-job">Vrsta posla</th>
                                <th class="num-in-week">Broj sati tjedno</th>
                                <th class="week-in-year">Broj tjedana u godini</th>
                                <th class="hours-in-year">Broj radnih sati u godini</th>
                                <th>Mogućnosti</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>
                                    <select class="rest-of-teaching">
                                        <option></option>

                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="properties">
                                    <span>
                                        + Dodaj red ispod
                                    </span>

                                    <span>
                                        - Izbriši red
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="summary">
                        <span>Ukupan broj sati tjedno: <span class="num weeks">0</span></span>

                        <span>Ukupan broj radnih sati godišnje: <span class="num hours-years">0</span></span>
                    </div>
                    <hr>
                    <h3 class="break">c) Ostali poslovi u tjednima kada nema nastave</h3>
                    <table id="logs3" class="table-entry table-no-students">
                        <tbody>
                            <tr>
                                <th class="num">R. br.</th>
                                <th class="type-of-job">Vrsta posla</th>
                                <th class="num-in-week">Broj sati tjedno</th>
                                <th class="week-in-year">Broj tjedana u godini</th>
                                <th class="hours-in-year">Broj radnih sati u godini</th>
                                <th>Mogućnosti</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>
                                    <select class="during-break">
                                        <option></option>

                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="properties">
                                    <span>
                                        + Dodaj red ispod
                                    </span>

                                    <span>
                                        - Izbriši red
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="summary">
                        <span>Ukupan broj sati tjedno: <span class="num weeks">0</span></span>

                        <span>Ukupan broj radnih sati godišnje: <span class="num hours-years">0</span></span>
                    </div>
                    <h3 class="break">d) Odmori i dopusti</h3>
                    <table id="logs4" class="table-vacation table-entry">
                        <tbody>
                            <tr>
                                <th class="num">R. br.</th>
                                <th class="type-of-job">Vrsta posla</th>
                                <th class="num-in-week">Broj sati neposredno-odgojnog rada po tjednu</th>
                                <th class="week-in-year">Broj tjedana godišnjeg odmora</th>
                                <th class="hours-in-year">Broj sati u godini</th>
                                <th>Mogućnosti</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>
                                    Godišnji odmor
                                    <!--<select class="vacation">

                                    </select>-->
                                </td>
                                <td>
                                    0
                                    <!--<input type="text" class="vacation-calc-input">-->
                                </td>
                                <td></td>
                                <td></td>
                                <td class="properties_off">
                                    <span>
                                        + Dodaj red ispod
                                    </span>

                                    <span>
                                        - Izbriši red
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>
                                    Blagdani i neradni dani
                                </td>
                                <td>
                                    0
                                    <!-- <input type="text" class="vacation-calc-input">-->
                                </td>
                                <td></td>
                                <td></td>
                                <td class="properties_off">
                                    <span>
                                        + Dodaj red ispod
                                    </span>

                                    <span>
                                        - Izbriši red
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="summary">
                        <span>Ukupan broj sati godišnje za odmor: <span
                                class="num weeks days-per-vacation">0</span></span>

                        <span>Ukupan broj radnih sati godišnje za neradne dane: <span
                                class="num hours-years days-per-break">0</span></span>
                    </div>
                    <hr>


                    <h3 class="break">Rad iznad norme</h3>
                    <table id="logs5" class="table-entry">
                        <tbody>
                            <tr>
                                <th class="num">R. br.</th>
                                <th class="type-of-job">Vrsta posla</th>
                                <th class="num-in-week">Broj sati tjedno</th>
                                <th class="week-in-year">Broj tjedana u godini</th>
                                <th class="hours-in-year">Broj radnih sati u godini</th>
                                <th>Mogućnosti</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td>
                                    <select class="extra">
                                        <option></option>

                                    </select>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="properties">
                                    <span>
                                        + Dodaj red ispod
                                    </span>

                                    <span>
                                        - Izbriši red
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="summary">
                        <span>Ukupan broj sati tjedno: <span class="num weeks">0</span></span>

                        <span>Ukupan broj radnih sati godišnje: <span class="num hours-years-extra">0</span></span>
                    </div>
                    <hr>

                    <div id="end-report">
                        <h3>Rekapitulacija</h3>
                        <span style="font-weight: 600;">Sveukupni broj sati tjedno za neposredan rad i za poslove vezane
                            za redovitu nastavu
                            iznosi: <span>0</span></span>
                        <br>
                        <span>Sveukupni broj sati godišnje za neposredan rad i za poslove vezane za redovitu nastavu
                            iznosi (metodičke pripreme itd.): <span>0</span></span>
                        <br>
                        <br>
                        <span>Sveukupni broj sati tjedno za rad kada nema nastave: <span
                                id="no-students-per-week">0</span></span>
                        <br>
                        <span>Sveukupni broj sati godišnje za rad kada nema nastave: <span
                                id="no-students-per-year">0</span></span>
                        <br>
                        <br>
                        <span>Sveukupni broj sati tjedno za rad iznad norme (honorar): <span
                                id="work-above-per-week">0</span></span>
                        <br>
                        <span>Sveukupni broj sati godišnje za rad iznad norme (honorar): <span
                                id="work-above-per-year">0</span></span>
                        <br>
                        <br>
                        <span>Godišnji odmor (broj sati godišnje): <span id="vacation-per-year">0</span></span>
                        <br>
                        <span>Blagdani i neradni dani (broj sati godišnje): <span id="break-per-year">0</span></span>
                        <br>
                        <br>
                        <span style="font-weight: 600;">Sveukupni broj sati u cijeloj godini: <span
                                id="sveukupnost"></span> </span>
                        <br>
                        <p style="font-weight: 600;">Napomena: brojevi se u rekapitulaciji zaokružuju (npr. 2.3 na 2 ili
                            2.5 na 3). U sveukupni izvještaj radnih dana i tjedana ne uračunava se rad iznad norme. U
                            danima kada nema maturanata, računa se samo ostatak sati od 32. tjedna do 35. radnog tjedana
                            jer je broj sati tjedno utvrđen.</p>
                    </div>
                    <hr id="end-line">
                    <p id="repeal">

                    </p>
                    <div id="signature">
                        <span class="signatures">
                            <p>Potpis odgovorne osobe</p>
                            <p>___________________________________</p>
                            <p id="head-master"></p>
                        </span>

                        <span class="signatures">
                            <p>Potpis primatelja zaduženja</p>
                            <p>___________________________________</p>
                        </span>
                    </div>
                    <br>
                    <div id="give-to">
                        <p>Dostaviti</p>
                        <p>1. Djelatniku</p>
                        <p>2. U dosje radnika</p>
                    </div>
                    <div id="container-for-end-controls">
                        <!--<input type="button" value="Spremi" id="save" class="end-controls">-->
                        <input type="button" value="Ispiši" id="print" class="end-controls">
                        <input type="button" value="Sačuvaj kao" id="SaveAs" class="end-controls">
                        <input type="button" value="Otvori" id="OpenFile" class="end-controls">

                    </div>

                </div>
            </div>

        </div>

    </div>
    <script src="../../data/data.js?v=<?php echo time() ?>"></script>
    <script src="assets/initial.js?v=<?php echo time() ?>"></script>
    <script src="assets/calc.js?v=<?php echo time() ?>"></script>
    <script src="assets/manipulate.js?v=<?php echo time() ?>"></script>
    <script src="assets/writtesave.js?v=<?php echo time() ?>"></script>
    <script>

        document.getElementById("SaveAs").addEventListener('click', () => saveFile());
        document.getElementById("OpenFile").addEventListener('click', () => getFileHandle());
    </script>

</body>

</html>