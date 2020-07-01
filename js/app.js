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
    row2.innerHTML = "Dirección: " + objeto.ciudad;
    row3.innerHTML = "Información de Contacto: mirar la web del hotel";
    row4.innerHTML = "Código de Confirmación: " + objeto.cod_confirmacion;
    row5.innerHTML = "Fecha de Entrada: " + objeto.fecha_inicio;
    row6.innerHTML = "Horario de CheckIn: " + objeto.checkin;
    row7.innerHTML = "Fecha de Salida: " + objeto.fecha_fin;
    row8.innerHTML = "Horario de CheckOut:" + objeto.checkout;
    row9.innerHTML = "Cantidad de Noches: " + objeto.cant_noches;
    row10.innerHTML = "Cantidad de Habitaciones: " + objeto.cant_habitacion;
    row11.innerHTML =
      "Cantidad de Personas Asociadas a la Reserva: " + objeto.cant_pasajeros;
  }
}
