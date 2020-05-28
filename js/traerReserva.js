"use strict";
document.addEventListener("DOMContentLoaded", load);
function load() {
  mostrarReservas();
  let actualizar = document.querySelector("#btn1");
  actualizar.addEventListener("click", traerHotel);
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
    title.textContent = reserva.datos.nombre;
    listItem.appendChild(title);
    const listItem2 = document.createElement("li");
    listItem2.className += "list-group-item";
    listItem2.textContent = reserva.datos.ciudad;
    newCont.appendChild(listItem);
    newCont.appendChild(listItem2);
    newDiv.appendChild(newCont);
    hotel.appendChild(newDiv);
  }
}

let reservas = [
  {
    id: "1",
    datos: {
      nombre: "Hotel Alto Pehuajo",
      ciudad: "Pehuajo",
    },
  },
  {
    id: "2",
    datos: {
      nombre: "Hotel Mar Verde",
      ciudad: "Mar Azul",
    },
  },
];

let hotelAdds = [
  {id: "3",
    datos: {
            nombre: "Plaza",
            ciudad: "Tandil",
  }},
  {id: "4",
    datos: {
            nombre: "Libertador",
            ciudad: "Tandil",
  }},
  {id: "5",
  datos: {
          nombre: "Roma",
          ciudad: "Tandil",
  }},
  { id: "6",
    datos: {
        nombre: "De la Sierra",
        ciudad: "Tandil",
  }},
  { id: "7",
    datos: {
        nombre: "Mulen",
        ciudad: "Tandil",
  }},


];


function traerHotel() {
  
  

  let random = Math.floor(Math.random() * hotelAdds.length)
  let hotel = hotelAdds[random];
  hotelAdds.splice(random,random);

  reservas.push(hotel);
  mostrarReservas();

}
