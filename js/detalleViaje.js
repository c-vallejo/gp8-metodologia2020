"use strict";
document.addEventListener("DOMContentLoaded", cargar);
function cargar() {
  let id;
  if (localStorage.getItem("id")) {
    id = localStorage.getItem("id");
  } else {
    console.log("no guardo los datos");
  }
  console.log(id);
  traerDetalleViaje(id);
  traerVuelo(id);
  traerHotel(id);
}

let datelleViaje;
let detalleVuelo;
let detalleHotel;

function traerDetalleViaje(id) {
  let url = "api/viajes/" + id;
  fetch(url)
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      console.log(json);
      datelleViaje = json;
      mostrarDetallesViaje(datelleViaje);
    })
    .catch(function (e) {
      console.log(e);
    });
}

function traerVuelo(id) {
  let url = "api/vuelos/" + id;
  fetch(url)
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      console.log(json);
      detalleVuelo = json;
      mostrarDetallesVuelo(detalleVuelo);
    })
    .catch(function (e) {
      console.log(e);
    });
}

function traerHotel(id) {
  let url = "api/alojamientos/" + id;
  fetch(url)
    .then(function (r) {
      return r.json();
    })
    .then(function (json) {
      console.log(json);
      detalleHotel = json;
      mostrarDetallesHotel(detalleHotel);
    })
    .catch(function (e) {
      console.log(e);
    });
}

function mostrarDetallesViaje(objeto) {
  let titulo = document.querySelector("#titulo1");
  titulo.innerHTML = " ";
  let comienzo = document.querySelector("#comienzo");
  comienzo.innerHTML = " ";
  let fin = document.querySelector("#fin");
  fin.innerHTML = " ";
  let destino = document.querySelector("#destino");
  destino.innerHTML = " ";
  let descripcion = document.querySelector("#descripcion");
  descripcion.innerHTML = " ";

  for (let elem of objeto) {
    console.log(elem);
    titulo.innerHTML = elem.titulo;
    comienzo.innerHTML = elem.fecha_inicio;
    fin.innerHTML = elem.fecha_fin;
    destino.innerHTML = elem.destino;
    descripcion.innerHTML = elem.descripcion;
  }
}

function mostrarDetallesHotel(obj) {
  let hotel = document.querySelector("#hotelId");
  hotel.innerHTML = " ";

  for (let elem of obj) {
    let newDiv = document.createElement("div");
    newDiv.className += "hotel";
    let nombre = document.createElement("p");
    let inicio = document.createElement("p");
    let fin = document.createElement("p");
    let btn1 = document.createElement("button");

    console.log(elem);
    nombre.textContent = "Nombre: " + elem.nombre;
    inicio.textContent = "Inicio Reserva: " + elem.fecha_inicio;
    fin.textContent = "Fin Reserva: " + elem.fecha_fin;
    btn1.innerHTML = "Mostar Detalle";
    btn1.className += "btn btn-light";
    btn1.addEventListener("click", (event) => {
      let url = "./hotel/" + elem.id_alojamiento;
      localStorage.setItem("idH", elem.id_alojamiento);
      location.replace(url);
    });

    newDiv.appendChild(nombre);
    newDiv.appendChild(inicio);
    newDiv.appendChild(fin);
    newDiv.appendChild(btn1);
    hotel.appendChild(newDiv);
  }
}

function mostrarDetallesVuelo(obj) {
  console.log("vuelo");
  let vuelo = document.querySelector("#vueloId");
  vuelo.innerHTML = " ";

  for (let elem of obj) {
    let newDiv = document.createElement("div");
    newDiv.className += "hotel";
    let nombre = document.createElement("p");
    let inicio = document.createElement("p");
    let fin = document.createElement("p");
    let btn1 = document.createElement("button");

    console.log(elem);
    nombre.textContent = "Codigo Reserva: " + elem.cod_reserva;
    inicio.textContent = "Vuelo Salida: " + elem.fecha_salida;
    fin.textContent = "Vuelo Llegada: " + elem.fecha_llegada;
    btn1.innerHTML = "Mostar Detalle";
    btn1.className += "btn btn-light";
    btn1.addEventListener("click", (event) => {
      localStorage.setItem("idV", elem.id_vuelo);
      location.replace("./detalleVuelo");
    });

    newDiv.appendChild(nombre);
    newDiv.appendChild(inicio);
    newDiv.appendChild(fin);
    newDiv.appendChild(btn1);
    vuelo.appendChild(newDiv);
  }
}
