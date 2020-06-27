"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  mostrarDatosViajeNR();
  let actualizar = document.querySelector(".act");
  actualizar.addEventListener("click", mostrarDatosViajeNR());
}
let objetos = [
  {
    nombreViaje: "Mexico 2021",
    destino: "Vuelo",
  },
  {
    nombreViaje: "Japon 2021",
    destino: "Vuelo",
  },
  {
    nombreViaje: "España 2021",
    destino: "Vuelo",
  },
];

function mostrarDatosViajeNR() {
  console.log(objetos);
  let vuelo = document.querySelector(".listaVuelosNR");
  vuelo.innerHTML = " ";
  for (let objeto of objetos) {
    let newDiv = document.createElement("div");
    newDiv.className += "vueloNR";
    let newCont = document.createElement("ul");
    newCont.className += "list-group list-group-flush";
    const listItem = document.createElement("li");
    const title = document.createElement("h5");
    listItem.className += "list-group-item";
    title.textContent = objeto.nombreViaje;
    listItem.appendChild(title);
    const listItem2 = document.createElement("li");
    listItem2.className += "list-group-item";
    listItem2.textContent = objeto.destino;
    newCont.appendChild(listItem);
    newCont.appendChild(listItem2);
    newDiv.appendChild(newCont);
    vuelo.appendChild(newDiv);
  }
}
