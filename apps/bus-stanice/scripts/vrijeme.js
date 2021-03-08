document.getElementById('povratak').onclick = function () {
    //window.location.assign('../../index.html');
    //alert("povratak");
}

function clock() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var timeValue = h + ":" + m;
    var inputTime = document.getElementById("unosVrijeme");
    inputTime.value = timeValue.toString();
    console.log(timeValue.toString());
}

function startTime(a) {
    if (a == "true") {
        clearInterval(x);
    } else {
        x = setInterval(clock, 1000);
    }
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}



//startTime("false");
//var x = setInterval(clock, 1000);
//document.getElementById("unosVrijeme").addEventListener('input', startTime.bind(null, "true"));
//document.getElementById("localTime").addEventListener('click', startTime.bind(null, "false"));
//document.getElementById("unosVrijeme").addEventListener('input', function() {console.log(2);});