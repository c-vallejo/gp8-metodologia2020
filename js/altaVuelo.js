"use strict";
document.addEventListener("DOMContentLoaded", cargar);

function cargar() {
  console.log("entro")
  let id;
  if (localStorage.getItem("id")) {
    id = localStorage.getItem("id");
  } else {
    console.log("no guardo los datos");
  }
  console.log(id);
  document.addEventListener("submit", verificarFormulario);
}

function verificarFormulario(e){
    e.preventDefault();
    let  id = localStorage.getItem("id");

    //toma los datos de los campos del formulario
   let codReserva = document.querySelector("#codigoReserva").value;
   let compania = document.querySelector("#compania").value;
   let infoAeronave = "Boeing B737";
   let nroVuelo = document.querySelector("#nroVuelo").value;
   let lugarSalida = "Buenos Aires";
   let fechaSalida = document.querySelector("#fechaSalida").value;
   let horarioSalida = "20:00"
   let codSalida = "245d1c4d5s"
   let lugarLlegada = document.querySelector("#lugarLlegada").value;
   let fechaLlegada = document.querySelector("#fechaLlegada").value;
   let horarioLlegada = "10:00";
   let codLlegada = "s1d4s8wfdd";
   let duracion = "10:00:00";
   let huella = "701";
   let notas = document.querySelector("#notas").value;
   let cantPasajeros = 300;

    console.log(compania);
    //verifica que los campos nombre, ciudad, fecha inicio y fecha fin esten completos
    if (
        codReserva != "" &&
        compania != "" &&
        nroVuelo != "" &&
        fechaSalida != "" &&
        fechaLlegada != "" &&
        lugarLlegada != "" 
    ) {
      //carga los datos para ser enviados via API y se lo pasa a dicha funcion.
      let data = {
        id_viaje: id,
        salida: lugarSalida,
        fecha_salida: fechaSalida ,
        hora_salida: horarioSalida,
        llegada: lugarLlegada,
        fecha_llegada: fechaLlegada,
        hora_llegada: horarioLlegada,
        duracion_vuelo: duracion,
        cod_salida: codSalida,
        cod_llegada: codLlegada,
        cod_reserva: codReserva,
        huella_carbono: huella,
        aerolinea: compania,
        cod_vuelo: nroVuelo,
        tipo_avion: infoAeronave,
        cant_pasajeros: cantPasajeros,
        notas: notas
      }
      console.log(data);
      cargarVuelo(data);
    }else {
        alert("Por favor complete los campos obligatorios");
      }
  }

function cargarVuelo(data) {

    let url = "api/vuelosAdd"

    fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data),
    })
        .then((response) => {
        if (!response.ok) {
            console.log(response);
            console.log("error");
        } else {
            let url = "./detalleViaje";
            location.replace(url);
            return response.json();
        }
        })
        .catch((error) => console.log(error));
    }
