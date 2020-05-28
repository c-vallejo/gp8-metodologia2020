"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  traerReserva();
  let actualizar = document.querySelector("#btn1");
  actualizar.addEventListener("click", cargarHotel);
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

function cargarHotel() {
  let data = {
    nombre: "Hotel Plaza",
    ciudad: "Tandil",
    fecha_inicio: "2021-07-24",
    fecha_fin: "2021-07-25",
    descripcion: " 5 estrellas ",
    contacto: "info@hotelPlaza.com",
    cod_confirmacion: "21312421",
    checkin: "17:06",
    checkout: "9:30",
    cant_noches: "1",
    cant_habitacion: "1",
    cant_pasajeros: "2",
  };

  let url = "api/insertar_alojamiento";

  //envia los datos a la API
  fetch(url, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
  })
    .then((response) => {
      if (!response.ok) {
        console.log("error");
      } else {
        return response.json();
      }
    })
    .then(() => {
      traerReserva();
    })
    .catch((error) => console.log(error));
}

/* let random = Math.floor(Math.random() * hotelAdds.length)
  let hotel = hotelAdds[random];
  
  if (random == 0){
    hotelAdds.shift();
  }
  else{
      hotelAdds.splice(random,random);
  } 
*/
