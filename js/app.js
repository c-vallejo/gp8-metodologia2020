"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  cargarTabla();
}
let objeto = {
  nombre: "Hotel American",
  direccion: "Direccion 1234",
  contacto: "ejemplo@gmail.com",
  codigoConfirmacion: "1234",
  fechaInicio: "3/6/2020",
  checkin: "10.30hs",
  fechaFin: "7/6/2020",
  checkout: "17.00hs",
  cantNoches: "4",
  cantHab: "1",
  cantPersonasAsociadas: "1",
};

function cargarTabla() {
  let container = document.querySelector(".datosReserva");
  mostrarDatosTabla(container);
}

function mostrarDatosTabla(container) {
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

function mostrarReservas() {
  let hotel = document.querySelector("#hotel");
  hotel.innerHTML = "";
  for (let reserva of reservas) {
    const myList = document.createElement("ul");
    const listItem = document.createElement("li");
    listItem.textContent = reserva.nombre;
    myList.appendChild(listItem);
  }
}
