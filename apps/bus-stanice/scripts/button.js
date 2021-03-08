function mapAppear(){
    document.getElementById("map-div").className = "mapdiv-active";
    document.getElementById("map-switch").className= "switch-active";
    document.getElementById("map-switch").removeEventListener("click", mapAppear);
    document.getElementById("map-switch").addEventListener("click", mapDisappear);
    document.getElementById("map-exit").addEventListener("click", mapDisappear);
}

function mapDisappear(){
    document.getElementById("map-div").className = "mapdiv-inactive";
    document.getElementById("map-switch").className= "switch-inactive";
    document.getElementById("map-switch").removeEventListener("click", mapDisappear);
    document.getElementById("map-switch").addEventListener("click", mapAppear);
    document.getElementById("map-exit").removeEventListener("click", mapDisappear);
}

document.getElementById("map-switch").addEventListener("click", mapAppear);