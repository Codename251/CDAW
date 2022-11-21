"use strict";

function modify(e)
{
    //alert(e.type +" on modify for "+ e.currentTarget.parentNode.id+" !");
    e.currentTarget.parentNode.getElementsByTagName("p")[0].innerHTML = "test";
   
}

function deleter(e)
{
    //alert(e.type +" on remove for "+ e.currentTarget.parentNode.id+" !");
    e.currentTarget.parentNode.style.display = "none";
}

function addNewElement(){
    let content = '<h4>Kazuma Kiryū</h4> <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <button class="modify">Modify Comment</button> <button class="remove">Remove Comment</button>';

  

    let users = document.getElementById("users");

    let newUSer = document.createElement('div');
    newUSer.innerHTML = content;
    newUSer.id = "user" + users.childNodes.length;
    users.append(newUSer);
    
    (newUSer.children[2]).addEventListener("click",modify);
    (newUSer.children[3]).addEventListener("click",deleter);
}

window.addEventListener('load', Onload);


function Onload(){
    document.getElementById("addNew").addEventListener("click", function(e){
        //alert(e.type +" on add !");
        addNewElement();
    })
    
    let modifiers = document.getElementsByClassName("modify");
    Array.from(modifiers).forEach(m => m.addEventListener("click",modify));
    
    let remover = document.getElementsByClassName("remove");
    Array.from(remover).forEach(m => m.addEventListener("click",deleter));
}
