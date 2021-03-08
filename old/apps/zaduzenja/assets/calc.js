
function initial3() {
function addNumberToName() {
    document.getElementById("names-of-teacher").addEventListener("change", function () {
        //console.log(podaci.KlasaZaduzenja);
        this.options[this.selectedIndex].setAttribute("selected", true);
        document.getElementById("klasa").getElementsByTagName("input")[0].value = Podaci.Zaduzenja[0].KlasaZaduzenja + this.value
    });
}
function calcSum() {
    var tab = document.getElementsByClassName("table-entry")[0].getElementsByTagName("TR");
    var sumWeektab = 0;
    var sumHoursPerYear = 0;
    for (var a = 1; tab.length > a; a++) {
        //console.log(tab[a].getElementsByTagName("TD")[2].innerHTML + "Hej");

        if (tab[a].getElementsByTagName("TD")[2].innerHTML == "") {

        } else {
            sumWeektab = sumWeektab + Number(tab[a].getElementsByTagName("TD")[2].innerHTML);
        }
        document.getElementsByClassName("weeks")[0].innerHTML = sumWeektab.toFixed(2);

        if (tab[a].getElementsByTagName("TD")[4].innerHTML == "") {

        } else {
            sumHoursPerYear = sumHoursPerYear + Number(tab[a].getElementsByTagName("TD")[4].innerHTML);
        }
        document.getElementsByClassName("hours-years")[0].innerHTML = sumHoursPerYear.toFixed(2);
    }
    /* **************************************************** */
    var tab = document.getElementsByClassName("table-entry")[1].getElementsByTagName("TR");
    var sumWeektab = 0;
    var sumHoursPerYear = 0;
    for (var a = 1; tab.length > a; a++) {
        //console.log(tab[a].getElementsByTagName("TD")[2].innerHTML + "Hej");

        if (tab[a].getElementsByTagName("TD")[2].innerHTML == "") {

        } else {
            sumWeektab = sumWeektab + Number(tab[a].getElementsByTagName("TD")[2].innerHTML);
        }
        document.getElementsByClassName("weeks")[1].innerHTML = sumWeektab.toFixed(2);

        if (tab[a].getElementsByTagName("TD")[4].innerHTML == "") {

        } else {
            sumHoursPerYear = sumHoursPerYear + Number(tab[a].getElementsByTagName("TD")[4].innerHTML);
        }
        document.getElementsByClassName("hours-years")[1].innerHTML = sumHoursPerYear.toFixed(2);
    }
    /* **************************************************** */
    var tab = document.getElementsByClassName("table-entry")[2].getElementsByTagName("TR");
    var sumWeektab = 0;
    var sumHoursPerYear = 0;
    for (var a = 1; tab.length > a; a++) {
        //console.log(tab[a].getElementsByTagName("TD")[2].innerHTML + "Hej");

        if (tab[a].getElementsByTagName("TD")[2].innerHTML == "") {

        } else {
            sumWeektab = sumWeektab + Number(tab[a].getElementsByTagName("TD")[2].innerHTML);
        }
        document.getElementsByClassName("weeks")[2].innerHTML = sumWeektab.toFixed(2);

        if (tab[a].getElementsByTagName("TD")[4].innerHTML == "") {

        } else {
            sumHoursPerYear = sumHoursPerYear + Number(tab[a].getElementsByTagName("TD")[4].innerHTML);
        }
        document.getElementsByClassName("hours-years")[2].innerHTML = sumHoursPerYear.toFixed(2);
    }
    /* **************************************************** */
    /* Odmor */
    var tab = document.getElementsByClassName("table-entry")[3].getElementsByTagName("TR");
    var sumWeektab = 0;
    var sumHoursPerYear = 0;
    for (var a = 1; tab.length > a; a++) {
        //console.log(tab[a].getElementsByTagName("TD")[2].innerHTML + "Hej");

        if (tab[a].getElementsByTagName("TD")[2].innerHTML == "") {


        } else {

            sumWeektab = sumWeektab + Number(tab[a].getElementsByTagName("TD")[2].innerHTML);
        }
        //document.getElementsByClassName("weeks")[3].innerHTML = sumWeektab;

        if (tab[a].getElementsByTagName("TD")[4].innerHTML == "") {

        } else {
            sumHoursPerYear = sumHoursPerYear + Number(tab[a].getElementsByTagName("TD")[4].innerHTML);
        }
        //document.getElementsByClassName("hours-years")[3].innerHTML = sumHoursPerYear;
    }
    /* **************************************************** */
    var tab = document.getElementsByClassName("table-entry")[4].getElementsByTagName("TR");
    var sumWeektab = 0;
    var sumHoursPerYear = 0;
    for (var a = 1; tab.length > a; a++) {
        //console.log(tab[a].getElementsByTagName("TD")[2].innerHTML + "Hej");

        if (tab[a].getElementsByTagName("TD")[2].innerHTML == "") {

        } else {
            sumWeektab = sumWeektab + Number(tab[a].getElementsByTagName("TD")[2].innerHTML);
        }
        document.getElementsByClassName("weeks")[4].innerHTML = sumWeektab.toFixed(2);

        if (tab[a].getElementsByTagName("TD")[4].innerHTML == "") {

        } else {
            sumHoursPerYear = sumHoursPerYear + Number(tab[a].getElementsByTagName("TD")[4].innerHTML);
        }
        document.getElementsByClassName("hours-years-extra")[0].innerHTML = sumHoursPerYear.toFixed(2);
    }


    /* Summary */
    document.getElementById("end-report").getElementsByTagName("span")[1].textContent = Math.round(document.getElementsByClassName("weeks")[0].innerHTML) + Math.round(document.getElementsByClassName("weeks")[1].innerHTML) //+ Math.round(document.getElementsByClassName("weeks")[2].innerHTML) + Math.round(document.getElementsByClassName("weeks")[3].innerHTML); // + Math.round(document.getElementsByClassName("weeks")[4].innerHTML)

    document.getElementById("end-report").getElementsByTagName("span")[3].textContent = Math.round(document.getElementsByClassName("hours-years")[0].innerHTML) + Math.round(document.getElementsByClassName("hours-years")[1].innerHTML) //+ Math.round(document.getElementsByClassName("hours-years")[2].innerHTML) + Math.round(document.getElementsByClassName("hours-years")[3].innerHTML);// + Math.round(document.getElementsByClassName("hours-years")[4].innerHTML)

    document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[2].innerHTML = document.getElementById("end-report").getElementsByTagName("span")[1].textContent;
    document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[2].getElementsByTagName("TD")[2].innerHTML = document.getElementById("end-report").getElementsByTagName("span")[1].textContent;

    /*Calc for vacation*/
    var numOfWeeksVacation = document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[3].innerHTML;
    var numOfWorkPerWeek = document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[2].innerHTML
    document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[4].innerHTML = Math.round(numOfWeeksVacation) * Math.round(numOfWorkPerWeek);

    document.getElementById("vacation-per-year").textContent = Math.round(numOfWeeksVacation) * Math.round(numOfWorkPerWeek);

    /*Calc for break */
    var numOfBreak = document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[2].getElementsByTagName("TD")[3].innerHTML;
    document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[2].getElementsByTagName("TD")[4].innerHTML = Math.round(numOfWorkPerWeek) * Math.round(numOfBreak);

    document.getElementById("break-per-year").textContent = Math.round(numOfWorkPerWeek) * Math.round(numOfBreak);
    /* *************************************** */
    document.getElementById("no-students-per-week").textContent = Math.round(document.getElementsByClassName("weeks")[2].textContent);
    document.getElementById("no-students-per-year").textContent = Math.round(document.getElementsByClassName("hours-years")[2].textContent);

    document.getElementById("work-above-per-week").textContent = Math.round(document.getElementsByClassName("weeks")[4].textContent);
    document.getElementById("work-above-per-year").textContent = Math.round(document.getElementsByClassName("hours-years-extra")[0].textContent);

    /* Calc for vacation section */
    var numOfWeeksVacation = document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[3].innerHTML;
    var numOfWorkPerWeek = document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[1].getElementsByTagName("TD")[2].innerHTML
    var numOfBreak = document.getElementsByClassName("table-vacation")[0].getElementsByTagName("TR")[2].getElementsByTagName("TD")[3].innerHTML;

    document.getElementsByClassName("days-per-vacation")[0].innerHTML = Math.round(numOfWeeksVacation) * Math.round(numOfWorkPerWeek);
    document.getElementsByClassName("days-per-break")[0].innerHTML = Math.round(numOfWorkPerWeek) * Math.round(numOfBreak);
    /*  * * */

    /* Sveukpnost sati godišnje */
    var sumHoursPerYear = 0;
    for (vt = 0; document.getElementsByClassName("hours-years").length > vt; vt++) {
        sumHoursPerYear = Math.round(document.getElementsByClassName("hours-years")[vt].innerHTML) + sumHoursPerYear;
    }

    document.getElementById("sveukupnost").innerHTML = sumHoursPerYear + Math.round(document.getElementsByClassName("days-per-vacation")[0].textContent);

}

function applyChangesToTables() {
    document.getElementById("enter-changes").addEventListener("click", function () {
        var numRow = document.getElementById("name-of-row").textContent;
        var tableId = document.getElementById("name-of-table").textContent;
        var el = document.createElement("h4");
        el.className = "selected-option";
        numRow = numRow.replace(".", "");
        numRow = parseInt(numRow);
        if (document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByClassName("list-of-dutys").length > 0) {
            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByClassName("list-of-dutys")[0].remove();
            //this.parentElement.getElementsByClassName("num-subject-week")[0].remove();
        }
        var stringAll = "";

        var newList = document.createElement("DIV");

        if (document.getElementsByClassName("options")[0].value == "") {

        } else {
            var rOptions = " ";
            var x = document.getElementsByClassName("options")[0].selectedOptions;
            for (z = 0; x.length > z; z++) {
                if (document.getElementsByClassName("options")[0].value == "") {
                    rOptions += x[z].value + ", ";

                } else {
                    rOptions += x[z].value + ", ";
                }


            }

            stringAll += "Razred(i): " + rOptions+ "";
        }


        if (document.getElementsByClassName("options")[1].value == "") {

        } else {

            var sOptions = " ";
            var x = document.getElementsByClassName("options")[1].selectedOptions;
            for (z = 0; x.length > z; z++) {
                if (document.getElementsByClassName("options")[1].value == "") {
                    sOptions += x[z].value + ", ";

                } else {
                    sOptions += x[z].value + ", ";
                }


            }
            stringAll += sOptions + " ";
        }
/*
        if (document.getElementsByClassName("options")[1].value == "") {

        } else {

            var sOptions1 = " ";
            var x1 = document.getElementsByClassName("options")[1].selectedOptions;
            for (zt = 0; x1.length > zt; zt++) {
    
                    sOptions1 += x1[zt].value + ", ";

             


            }
            stringAll += sOptions1 + " ";

            //stringAll += document.getElementsByClassName("options")[2].value + ", "; //smjer
        }

        */

        if (document.getElementsByClassName("options")[2].value == "") {

        } else {
            var nazivPredmeta = document.getElementsByClassName("options")[2].options[document.getElementsByClassName("options")[2].selectedIndex].text;
            
            stringAll += "predmet " + nazivPredmeta /* document.getElementsByClassName("options")[3].value */ + ". ";
        }

        if (document.getElementsByClassName("options")[3].value == "") {

        } else {
            stringAll += "Broj sati: " + document.getElementsByClassName("options")[3].value;
        }

        if (document.getElementsByClassName("options")[4].value == "") {

        } else {
            stringAll += "<br>naziv/objašnjenje: " + document.getElementsByClassName("options")[4].value;
        }

        if (tableId == "logs3") {
            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[3].innerHTML = Podaci.Zaduzenja[0].TjedniKadaNemaUcenika;
        } else {

            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[3].innerHTML = document.getElementById("maturanti").value

        }



        newList.className = "list-of-dutys";
        newList.innerHTML = document.getElementById("name-of-option").textContent + " - " + stringAll;
        document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[1].appendChild(newList);

        document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[2].innerHTML = document.getElementsByClassName("options")[3].value;

        //console.log(document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[2].innerHTML);
        document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[4].innerHTML = Number(document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[2].innerHTML) * Number(document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[3].innerHTML);
        document.getElementById("sub-options").style.display = "none";

        /* Izuzetak */
        if (document.getElementById("maturanti").value == "3") {
            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[3].innerHTML = 3;
            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[2].innerHTML = 0;
            var testNum = Number(document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[4].innerHTML);
            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[4].innerHTML = testNum / 3;
        } else {
            document.getElementById(tableId).getElementsByTagName("TR")[numRow].getElementsByTagName("TD")[3].innerHTML = document.getElementById("maturanti").value

        }
        /* ******************************* */

        addAndCalculateRows();
        deleteAndCalculateRows();
        calcSum();
    });


}

function closeSubMenu() {
    document.getElementById("sub-title").getElementsByTagName("span")[0].onclick = function () {
        var tableId = document.getElementById("name-of-table").textContent
        var rowIndex = document.getElementById("name-of-row").textContent
        rowIndex = rowIndex.replace(".", "");
        rowIndex = parseInt(rowIndex);
        document.getElementById(tableId).getElementsByTagName("TR")[rowIndex].getElementsByTagName("select")[0].getElementsByTagName("option")[0].selected = true
        document.getElementById(tableId).getElementsByTagName("TR")[rowIndex].getElementsByTagName("TD")[2].innerHTML = "";
        document.getElementById(tableId).getElementsByTagName("TR")[rowIndex].getElementsByTagName("TD")[4].innerHTML = "";

        if (document.getElementById(tableId).getElementsByTagName("TR")[rowIndex].getElementsByClassName("list-of-dutys").length > 0) {
            document.getElementById(tableId).getElementsByTagName("TR")[rowIndex].getElementsByClassName("list-of-dutys")[0].remove();
            //document.getElementById(tableId).getElementsByTagName("TR")[rowIndex].getElementsByTagName("TD")[2].getElementsByClassName("num-subject-week")[0].remove();
        }

        document.getElementById("sub-title").parentElement.style.display = "none";
        calcSum();
    }
}
function openSubMenu() {

    for (var c = 0; document.getElementsByTagName("TABLE").length > c; c++) {
        for (var d = 0; document.getElementsByTagName("TABLE")[c].getElementsByTagName("select").length > d; d++) {
            var optionEntry = document.getElementsByTagName("TABLE")[c].getElementsByTagName("select")[d];
            optionEntry.addEventListener('change', function (e) {
                this.options[this.selectedIndex].setAttribute("selected", true);
                document.getElementById("main-box").scrollTo(0, 0);
                console.log(e.target.tagName);
                var tableId = e.target.parentElement.parentElement.parentElement.parentElement.id
                if (this.value == "") {
                    this.parentElement.parentElement.getElementsByTagName("TD")[2].innerHTML = "";
                    this.parentElement.parentElement.getElementsByTagName("TD")[4].innerHTML = "";
                    //console.log(e.target.parentElement);
                    if (e.target.parentElement.getElementsByClassName("sugestija-priprema").length > 0) {
                        e.target.parentElement.getElementsByClassName("sugestija-priprema")[0].remove();
                    }
                    if (e.target.parentElement.getElementsByClassName("list-of-dutys").length > 0) {
                        e.target.parentElement.getElementsByClassName("list-of-dutys")[0].remove();
                        //this.parentElement.getElementsByClassName("num-subject-week")[0].remove();
                    }

                } else {


                    document.getElementById("sub-options").style.display = "block";
                    // document.getElementById("name-of-option-hidden").textContent = 
                    document.getElementById("name-of-option").textContent = this.options[this.selectedIndex].value;
                    document.getElementById("name-of-row").textContent = this.parentElement.parentElement.getElementsByTagName("TD")[0].innerHTML;
                    document.getElementById("name-of-table").textContent = this.parentElement.parentElement.parentElement.parentElement.id

                }
                calcSum();
            });

        }
    }
}

function calculateHoursForeOneWeek() {

    for (var c = 0; document.getElementsByTagName("TABLE").length > c; c++) {
        for (var d = 0; document.getElementsByTagName("TABLE")[c].getElementsByTagName("TR").length > d; d++) {
            var rows = document.getElementsByTagName("TABLE")[c].getElementsByTagName("TR")[d];
            var allHoursPerWeekForOneTable = [0]
            var calcAllHoursPerWeekForOneTable = 0;
            if (rows.getElementsByTagName("th")[0]) {

            } else {
                if (rows.getElementsByTagName("TD")[2] == "") {

                } else {
                    allHoursPerWeekForOneTable.push(rows.getElementsByTagName("TD")[2].innerHTML);

                }
                for (z = 0; allHoursPerWeekForOneTable.length > z; z++) {
                    calcAllHoursPerWeekForOneTable = calcAllHoursPerWeekForOneTable + allHoursPerWeekForOneTable[z]
                }
                //console.log(allHoursPerWeekForOneTable);
            }

        }

    }

}


function addAndCalculateRows() {
    for (var c = 0; document.getElementsByClassName("properties").length > c; c++) {

        document.getElementsByClassName("properties")[c].getElementsByTagName("SPAN")[0].addEventListener("click", function (e) {
            e.stopImmediatePropagation();
            var tableId = e.target.parentElement.parentElement.parentElement.parentElement.id;
            var selectClass = e.target.parentElement.parentElement.getElementsByTagName("TD")[1].getElementsByTagName("select")[0].className;
            var kloneOptions = document.getElementById(tableId).getElementsByClassName(selectClass)[0].cloneNode(true);
            var kloneControles1 = document.getElementById(tableId).getElementsByClassName("properties")[0].getElementsByTagName("SPAN")[0].cloneNode(true);
            var kloneControles2 = document.getElementById(tableId).getElementsByClassName("properties")[0].getElementsByTagName("SPAN")[1].cloneNode(true);
            var tableRef = document.getElementById(tableId).getElementsByTagName('tbody')[0];
            var strNum = e.target.parentElement.parentElement.getElementsByTagName("TD")[0].textContent;

            strNum = strNum.replace(".", "");
            strNum = parseInt(strNum);
            // Insert a row in the table at the last row
            var newRow = tableRef.insertRow(strNum + 1);
            //console.log(strNum + 1);
            var td1 = newRow.insertCell(0);
            var td2 = newRow.insertCell(1);
            var td3 = newRow.insertCell(2);
            var td4 = newRow.insertCell(3);
            var td5 = newRow.insertCell(4);
            var td6 = newRow.insertCell(5);
            td2.appendChild(kloneOptions);
            if (tableId == "logs3") {
                td4.innerHTML = Podaci.Zaduzenja[0].TjedniKadaNemaUcenika;
            } else {
                td4.innerHTML = Podaci.Zaduzenja[0].RadniTjedan;
            }

            td6.appendChild(kloneControles1);
            td6.appendChild(kloneControles2);
            td6.className = "properties";

            for (x = 0; document.getElementById(tableId).getElementsByClassName("properties").length > x; x++) {
                document.getElementById(tableId).getElementsByTagName("TR")[x + 1].getElementsByTagName("TD")[0].textContent = x + 1 + ".";
            }

            addAndCalculateRows();
            deleteAndCalculateRows();
            calculateHoursForeOneWeek();
            openSubMenu();
            calcSum();
        });
    }

}

function deleteAndCalculateRows() {
    for (var c = 0; document.getElementsByClassName("properties").length > c; c++) {

        document.getElementsByClassName("properties")[c].getElementsByTagName("SPAN")[1].addEventListener("click", function (e) {
            e.stopImmediatePropagation()
            var tableId = e.target.parentElement.parentElement.parentElement.parentElement.id;
            var selectClass = e.target.parentElement.parentElement.getElementsByTagName("TD")[1].getElementsByTagName("select")[0].className;
            if (document.getElementById(tableId).getElementsByClassName("properties").length == 1) {
                alert("Postoji samo jedan red. Njega nije moguće izbrisati.");

            } else {
                this.parentElement.parentElement.remove();
                for (x = 0; document.getElementById(tableId).getElementsByClassName("properties").length > x; x++) {
                    document.getElementById(tableId).getElementsByTagName("TR")[x + 1].getElementsByTagName("TD")[0].textContent = x + 1 + ".";
                }
                addAndCalculateRows();
                deleteAndCalculateRows();
                openSubMenu();
                calcSum();
            }
        });
    }
}






addAndCalculateRows();
deleteAndCalculateRows();
openSubMenu();
closeSubMenu();
applyChangesToTables();
addNumberToName();
}
function insertDataInTables() {
    //Prva tablica
    function firstTable() {
        for (var b = 0; document.getElementsByClassName("direct-teaching").length > b; b++) {

            for (var i = 0; Podaci.NeposredniRad.length > i; i++) {

                document.getElementById("box-create").innerHTML = "<option value='" + Podaci.NeposredniRad[i].Stavka + "'>" + Podaci.NeposredniRad[i].Stavka + "</option>";
                document.getElementsByClassName("direct-teaching")[b].appendChild(document.getElementById("box-create").getElementsByTagName("option")[0]);
            }

        }
    }


    // Kraj Prve tablice

    // Druga tablica
    function secondTable() {
        for (var b = 0; document.getElementsByClassName("rest-of-teaching").length > b; b++) {

            for (var i = 0; Podaci.NesporedniRadPriprema.length > i; i++) {
                document.getElementById("box-create").innerHTML = "<option value='" + Podaci.NesporedniRadPriprema[i].Stavka + "'>" + Podaci.NesporedniRadPriprema[i].Stavka + "</option>";
                document.getElementsByClassName("rest-of-teaching")[b].appendChild(document.getElementById("box-create").getElementsByTagName("option")[0]);
            }

        }

    }

    // Kraj Druge tablice

    //Treća tablica
    function thirdTable() {
        for (var b = 0; document.getElementsByClassName("during-break").length > b; b++) {

            for (var i = 0; Podaci.KadaNemaNastave.length > i; i++) {
                document.getElementById("box-create").innerHTML = "<option value='" + Podaci.KadaNemaNastave[i].Stavka + "'>" + Podaci.KadaNemaNastave[i].Stavka + "</option>";
                document.getElementsByClassName("during-break")[b].appendChild(document.getElementById("box-create").getElementsByTagName("option")[0]);
            }

        }
    }

    //Kraj treće tablice

    //Četvrta tablica
    function fourthTable() {

        for (var b = 0; document.getElementsByClassName("vacation").length > b; b++) {

            for (var i = 0; podaci.Odmor.length > i; i++) {

                document.getElementById("box-create").innerHTML = "<option value='" + podaci.Odmor[i] + "'>" + podaci.Odmor[i] + "</option>";
                document.getElementsByClassName("vacation")[b].appendChild(document.getElementById("box-create").getElementsByTagName("option")[0]);
            }

        }
    }

    //Kraj četvrte tablice

    //Peta tablica

    function fifthTable() {
        for (var b = 0; document.getElementsByClassName("extra").length > b; b++) {

            for (var i = 0; Podaci.IznadNorme.length > i; i++) {

                document.getElementById("box-create").innerHTML = "<option value='" +  Podaci.IznadNorme[i].Stavka + "'>" + Podaci.IznadNorme[i].Stavka + "</option>";
                document.getElementsByClassName("extra")[b].appendChild(document.getElementById("box-create").getElementsByTagName("option")[0]);
            }

        }

    }
    //Kraj pete tablice

    firstTable();
    secondTable();
    thirdTable();
    fourthTable()
    fifthTable();

}

insertDataInTables();

initial3();