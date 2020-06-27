"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  traerReserva();
  let actualizar = document.querySelector(".act");
  actualizar.addEventListener("click", mostrarDatosViajeNR());
}
let objetos = [];

function traerReserva() {
  fetch("api/viajes")
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      console.log(json);
      objetos = json;
      mostrarDatosViajeNR();
    })
    .catch(function (e) {
      console.log(e);
    });
}

let objetoFiltro = [];

const filtroDefault = { option: "viajesTodos", value: "Viajes" };

document.querySelector("#filtros").addEventListener("change", filtrar);

function filtrar() {
  objetoFiltro = [];
  let valor = this.value;
  //for (let elem of document.querySelector(".vueloNR").childNodes) {
  for (let elem of objetos) {
    //elem.className = "";
    if (valor == filtroDefault.option) {
      let finalizado = elem.finalizado;
      if (finalizado != undefined && finalizado.innerHTML != valor) {
        objetoFiltro.push(elem);
        console.log("1");
      }
    }
    if (valor === "viajesNoRealizados") {
      let finalizado = elem.finalizado;
      if (finalizado != undefined && finalizado === "0") {
        objetoFiltro.push(elem);
        console.log("2");
      }
    }
    if (valor === "viajesRealizados") {
      let finalizado = elem.finalizado;
      if (finalizado != undefined && finalizado === "1") {
        objetoFiltro.push(elem);
        console.log("3");
      }
    }
  }

  console.log(objetoFiltro);
  mostrarDatosViajeNR(objetoFiltro);
}

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
