"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  let id;
  if (localStorage.getItem("idH")) {
    id = localStorage.getItem("idH");
    console.log(id);
  } else {
    console.log("no guardo los datos");
  }
  traerHotel(id);
}

let reserva;

function traerHotel(id) {
  let url = "../api/alojamiento/" + id;

  fetch(url)
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      console.log(json);
      mostrarDatos(json);
    })
    .catch(function (e) {
      console.log(e);
    });
}

function mostrarDatos(objetos) {
  let container = document.querySelector("#datosReserva");
  container.innerHTML = "";

  for (let objeto of objetos) {
    let row1 = container.insertRow(0);
    let row2 = container.insertRow(1);
    let row3 = container.insertRow(2);
    let row4 = container.insertRow(3);
    let row5 = container.insertRow(4);
    let row6 = container.insertRow(5);
    let row7 = container.insertRow(6);
    let row8 = container.insertRow(7);
    let row9 = container.insertRow(8);
    let row10 = container.insertRow(9);
    let row11 = container.insertRow(10);

    row1.innerHTML = "Nombre: " + objeto.nombre;
    row2.innerHTML = "Direccion: " + objeto.direccion;
    row3.innerHTML = "Informacion de Contacto: " + objeto.contacto;
    row4.innerHTML = "Codigo de Confirmacion: " + objeto.codigoConfirmacion;
    row5.innerHTML = "Fecha de Entrada: " + objeto.fechaInicio;
    row6.innerHTML = "Horario de CheckIn: " + objeto.checkin;
    row7.innerHTML = "Fecha de Salida: " + objeto.fechaFin;
    row8.innerHTML = "Horario de CheckOut:" + objeto.checkout;
    row9.innerHTML = "Cantidad de Noches: " + objeto.cantNoches;
    row10.innerHTML = "Cantidad de Habitaciones: " + objeto.cantHab;
    row11.innerHTML =
      "Cantidad de Personas Asociadas a la Reserva: " +
      objeto.cantPersonasAsociadas;
  }
}

/* Merge con dudas   NO SE CUAL DEJAR POR ESO LO COMENTO*/
/*
"use strict";
document.addEventListener("DOMContentLoaded", getDataReserva());

function getDataReserva() {
  let objeto = {
    nombre: "Hyatt",
    direccion: "Bs As-San Martin 321",
    contacto: "Hyatt@gmail.com",
    codigoConfirmacion: "2234",
    fechaInicio: "22/05/20",
    checkin: "14:00",
    fechaFin: "03/06/20",
    checkout: "10:00",
    cantNoches: "12",
    cantHab: "3",
    cantPersonasAsociadas: "6",
  };
  mostrarDatos(objeto);
}

function mostrarDatos(objeto) {
  let container = document.querySelector("#datosReserva");

  container.innerHTML = "";
  let row1 = container.insertRow(0);
  let row2 = container.insertRow(1);
  let row3 = container.insertRow(2);
  let row4 = container.insertRow(3);
  let row5 = container.insertRow(4);
  let row6 = container.insertRow(5);
  let row7 = container.insertRow(6);
  let row8 = container.insertRow(7);
  let row9 = container.insertRow(8);
  let row10 = container.insertRow(9);
  let row11 = container.insertRow(10);

  row1.innerHTML = "Nombre: " + objeto.nombre;
  row2.innerHTML = "Direccion: " + objeto.direccion;
  row3.innerHTML = "Informacion de Contacto: " + objeto.contacto;
  row4.innerHTML = "Codigo de Confirmacion: " + objeto.codigoConfirmacion;
  row5.innerHTML = "Fecha de Entrada: " + objeto.fechaInicio;
  row6.innerHTML = "Horario de CheckIn: " + objeto.checkin;
  row7.innerHTML = "Fecha de Salida: " + objeto.fechaFin;
  row8.innerHTML = "Horario de CheckOut:" + objeto.checkout;
  row9.innerHTML = "Cantidad de Noches: " + objeto.cantNoches;
  row10.innerHTML = "Cantidad de Habitaciones: " + objeto.cantHab;
  row11.innerHTML =
    "Cantidad de Personas Asociadas a la Reserva: " +
    objeto.cantPersonasAsociadas;
}

*/
