"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  traerReserva();
  let actualizar = document.querySelector("#btn1");
  actualizar.addEventListener("click", traerHotel);
}
let reservas;
function traerReserva() {
  fetch("api/alojamientos")
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      console.log(json);
      reservas = json;
      mostrarReservas();
    })
    .catch(function (e) {
      console.log(e);
    });
}

function mostrarReservas() {
  console.log(reservas);
  let hotel = document.querySelector(".listaReservas");
  hotel.innerHTML = " ";
  for (let reserva of reservas) {
    let newDiv = document.createElement("div");
    newDiv.className += "hotel";
    let newCont = document.createElement("ul");
    newCont.className += "list-group list-group-flush";
    const listItem = document.createElement("li");
    const title = document.createElement("h5");
    listItem.className += "list-group-item";
    title.textContent = reserva.nombre;
    listItem.appendChild(title);
    const listItem2 = document.createElement("li");
    listItem2.className += "list-group-item";
    listItem2.textContent = reserva.fecha_inicio;
    newCont.appendChild(listItem);
    newCont.appendChild(listItem2);
    newDiv.appendChild(newCont);
    hotel.appendChild(newDiv);
  }
}

function traerHotel() {
  let hotel = {
    nombre: "Hotel Plaza",
    ciudad: "Tandil",
  };
}
