"use strict";
document.addEventListener("DOMContentLoaded", cargar);

function cargar() {
  let id;
  if (localStorage.getItem("idV")) {
    id = localStorage.getItem("idV");
  } else {
    console.log("no guardo los datos");
  }
  console.log(id);

  traerVuelo(id);
}

function traerVuelo(id) {
  let url = "api/vuelo/" + id;
  fetch(url)
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      let vuelo = json;
      mostrarVuelo(vuelo);
    })
    .catch(function (e) {
      console.log(e);
    });
}

function mostrarVuelo(objeto) {
  let container = document.querySelector(".datosVuelo");
  console.log(objeto);
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
  row1.innerHTML = "<b> Aerolinea: </b>" + objeto[0].aerolinea + ".";
  row2.innerHTML = "<b> Cantidad de pasajeros: </b>" + objeto[0].cant_pasajeros + ".";
  row3.innerHTML = "<b> Codigo de Reserva: </b>" + objeto[0].cod_reserva + ".";
  row4.innerHTML = "<b> Fecha de Salida: </b>" + objeto[0].fecha_salida + ".";
  row5.innerHTML = "<b> Horario de Salida: </b>" + objeto[0].hora_salida + ".";
  row6.innerHTML = "<b> Duracion del vuelo: </b>" + objeto[0].duracion_vuelo + ".";
  row7.innerHTML = "<b> Fecha de Llegada: </b>" + objeto[0].fecha_llegada + ".";
  row8.innerHTML = "<b> Horario de Llegada: </b>" + objeto[0].hora_llegada + ".";
  row9.innerHTML = "<b> Huella de carbono:  </b>" + objeto[0].huella_carbono + ".";
  row10.innerHTML = "<b> Tipo de avion: </b>" + objeto[0].tipo_avion + ".";
  row11.innerHTML = "<b> Codigo de vuelo: </b>" + objeto[0].cod_vuelo + ".";
}

