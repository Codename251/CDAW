"use strict"



function changeColor(){
    let monCaroussel = document.getElementById("caroussel");
    monCaroussel.style.background  = "red";

    let pSelected = document.getElementsByClassName("descr");

    for(let i in pSelected){
        pSelected[i].style.color = 'blue';
    }
}

window.addEventListener('load', function () {
    changeColor();
});
