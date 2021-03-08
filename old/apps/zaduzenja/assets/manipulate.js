function initial2() {
function createElementAndAppendToTable(vri) {
    console.log(2)
    var studentWeek = document.querySelectorAll("input[type='number']")[0].value;
    var tabName = document.getElementById("name-of-table").textContent;
    if(("32" == document.getElementById("maturanti").value) && (tabName == "logs")) {
        el = document.createElement("P");
        el.className = "sugestija-priprema";
        var dodatak = (Number(studentWeek) * 3) / Podaci.Zaduzenja[0].RadniTjedan;
        el.innerHTML = "Preporučeni broj sati za ostale poslove vezane za redovitu nastavu: " + vri + " sat. (Upisuje se u tablicu ispod).<br> U ovu tablicu treba dodati one sate kojih je manje zbog odsutnosti maturanata. Broj sati za dodati: " + Number(studentWeek) * 3 + ". Dodati broj sati po tjednu: " + dodatak.toFixed(2) + "<br>(Ovaj zapis neće biti vidljiv prilikom ispisa)";
        var rowNum = document.getElementById("name-of-row").textContent;
        rowNum = parseInt(rowNum);
        var tab = document.getElementById(tabName);
        if(tab.getElementsByTagName("TR")[rowNum].getElementsByClassName("sugestija-priprema")[0]) {
            tab.getElementsByTagName("TR")[rowNum].getElementsByClassName("sugestija-priprema")[0].remove();
            tab.getElementsByTagName("TR")[rowNum].getElementsByTagName("TD")[1].appendChild(el);
        } else {
            tab.getElementsByTagName("TR")[rowNum].getElementsByTagName("TD")[1].appendChild(el);
        }
        
    } if(("32" == document.getElementById("maturanti").value) && (tabName == "logs2")) {
        el = document.createElement("P");
        el.className = "sugestija-priprema";
        var dodatak = (Number(studentWeek) * 3) / Podaci.Zaduzenja[0].RadniTjedan;
        el.innerHTML = "U ovu tablicu treba dodati one sate kojih je manje zbog odsutnosti maturanata. Broj sati za dodati: " + Number(studentWeek) * 3 + "<br>(Ovaj zapis neće biti vidljiv prilikom ispisa)";
        var rowNum = document.getElementById("name-of-row").textContent;
        rowNum = parseInt(rowNum);
        var tab = document.getElementById(tabName);
        if(tab.getElementsByTagName("TR")[rowNum].getElementsByClassName("sugestija-priprema")[0]) {
            tab.getElementsByTagName("TR")[rowNum].getElementsByClassName("sugestija-priprema")[0].remove();
            tab.getElementsByTagName("TR")[rowNum].getElementsByTagName("TD")[1].appendChild(el);
        } else {
            tab.getElementsByTagName("TR")[rowNum].getElementsByTagName("TD")[1].appendChild(el);
        }
        

    } if(("32" != document.getElementById("maturanti").value) && (tabName == "logs")) {
        el = document.createElement("P");
        el.className = "sugestija-priprema";
        el.innerHTML = "Preporučeni broj sati za ostale poslove vezane za redovitu nastavu: " + vri + "  (Upisuje se u tablicu ispod. Ovaj zapis neće biti vidljiv prilikom ispisa)";
        var rowNum = document.getElementById("name-of-row").textContent;
        rowNum = parseInt(rowNum);
        var tab = document.getElementById(tabName);
        if(tab.getElementsByTagName("TR")[rowNum].getElementsByClassName("sugestija-priprema")[0]) {
            tab.getElementsByTagName("TR")[rowNum].getElementsByClassName("sugestija-priprema")[0].remove();
            tab.getElementsByTagName("TR")[rowNum].getElementsByTagName("TD")[1].appendChild(el);
        } else {
            tab.getElementsByTagName("TR")[rowNum].getElementsByTagName("TD")[1].appendChild(el);
        }
        
    }

}
/*
function suggestion(val) {
    var tabId = document.getElementById("name-of-table").textContent;
    if(tabId =="logs" || tabId == "logs2") {
        var vrijednost = document.getElementById("subjects").value;
        val = Number(val);
        if(vrijednost == "20"){
            var vri =  12/20 * val; // 0.6 sat pripreme
            createElementAndAppendToTable(vri);
        } else if(vrijednost =="21") {
            var vri = 11/20 * val; // 11/21 0.52 pripreme
            createElementAndAppendToTable(vri);
        }
        else if (vrijednost =="22") {
            var vri =  10/20 * document.getElementsByClassName("options")[4].value; // 10/22 0.47
            createElementAndAppendToTable(vri);
        }
    }

}
*/

function suggestion(val) {
    var tabId = document.getElementById("name-of-table").textContent;
    if(tabId =="logs" || tabId == "logs2") {
        var vrijednost = document.getElementById("subjects").value;
        val = Number(val);
        if(vrijednost == "20"){
            var vri =  12/20 * val; // 0.6 sat pripreme
            createElementAndAppendToTable(vri);
        } else if(vrijednost =="21") {
            var vri = 11/21 * val; // 11/21 0.52 pripreme
            createElementAndAppendToTable(vri);
        }
        else if (vrijednost =="22") {
            var vri =  10/22 * document.getElementsByClassName("options")[3].value; // 10/22 0.47
            createElementAndAppendToTable(vri);
        }
    }

}

document.getElementsByClassName("options")[0].addEventListener("change", function(e) {
    var maturantskiRazred = "4.";
    var val = e.target.value;
    if(val == maturantskiRazred) {
        document.getElementById("maturanti").options[1].selected = true;
    } else {
        document.getElementById("maturanti").options[0].selected = true;
    }

});


document.getElementById("enter-changes").addEventListener("click", function() {
    val = document.querySelectorAll(".options[type='number']")[0].value;
    suggestion(val)
    
})

}
initial2();
