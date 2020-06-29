"use strict";
document.addEventListener("DOMContentLoaded", cargar);
function cargar() {
  cargarTabla();
  let id;
  if (localStorage.getItem("idV")) {
    id = localStorage.getItem("idV");
  } else {
    console.log("no guardo los datos");
  }
  console.log(id);

  traerVuelo(id);
}
let objeto = {
  numeroVuelo: "LA8009",
  compania: "LATAM Airlines Goup",
  codigoReserva: "KYTKEW",
  fechaSalida: "20/12/2020",
  horarioSalida: "12:35hs",
  aeropuertoSalida: "Aeropuerto Buenos Aires Ministro Pistarini, Ezeiza",
  fechaLlegada: "22/12/2020",
  horarioLlegada: "8:50hs",
  aeropuertoLlegada: "Aeropuerto Internacional Suvarnabhumi, Bangkok",
  tiempoEscalas: "8:30hs",
  infoAeronave: "Airbus A321-100/200",
};

function cargarTabla() {
  let container = document.querySelector(".datosVuelo");
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
  row1.innerHTML = "<b>Numero de Vuelo: </b>" + objeto.numeroVuelo + ".";
  row2.innerHTML = "<b>Compañia: </b>" + objeto.compania + ".";
  row3.innerHTML = "<b>Codigo de Reserva: </b>" + objeto.codigoReserva + ".";
  row4.innerHTML = "<b>Fecha de Salida: </b>" + objeto.fechaSalida + ".";
  row5.innerHTML = "<b>Horario de Salida: </b>" + objeto.horarioSalida + ".";
  row6.innerHTML =
    "<b>Aeropuerto de Salida: </b>" + objeto.aeropuertoSalida + ".";
  row7.innerHTML = "<b>Fecha de Llegada: </b>" + objeto.fechaLlegada + ".";
  row8.innerHTML = "<b>Horario de Llegada: </b>" + objeto.horarioLlegada + ".";
  row9.innerHTML =
    "<b>Aeropuerto de Llegada: </b>" + objeto.aeropuertoLlegada + ".";
  row10.innerHTML =
    "<b>Tiempo entre Escalas: </b>" + objeto.tiempoEscalas + ".";
  row11.innerHTML =
    "<b>Informacion de la Aeronave: </b>" + objeto.infoAeronave + ".";
}
