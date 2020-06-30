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
}

function verificarFormulario(e){
    e.preventDefault();

    //toma los datos de los campos del formulario
    let codReserva = document.querySelector("#codigoReserva").value;
    let compania = document.querySelector("#compania").value;
    let infoAeronave = document.querySelector("#infoAeronave").value;
    let nroVuelo = document.querySelector("#nroVuelo").value;
    let lugarSalida = document.querySelector("#lugarSalida").value;
    let dataSalida = document.querySelector("#dataSalida").value;
    let codSalida = document.querySelector("#codSalida").value;
    let lugarLlegada = document.querySelector("#lugarLlegada").value;
    let dataLlegada = document.querySelector("#dataLlegada").value;
    let codLlegada = document.querySelector("#codLlegada").value;
    let duracion = document.querySelector("#duracion").value;
    let huella = document.querySelector("#huella").value;
    let notas = document.querySelector("#notas").value;

    //verifica que los campos nombre, ciudad, fecha inicio y fecha fin esten completos
    if (
        codReserva != "" &&
        compania != "" &&
        infoAeronave != "" &&
        nroVuelo != "" &&
        lugarSalida != "" &&
        dataSalida != "" &&
        codSalida != "" &&
        lugarLlegada != "" &&
        dataLlegada != "" &&
        codLlegada != "" &&
        duracion != "" &&
        huella != "" &&
        notas != "" 

    ) {
      //carga los datos para ser enviados via API y se lo pasa a dicha funcion.
      let data = {
        : nombre,
        destino: ciudad,
        fecha_inicio: fechaInicio,
        fecha_fin: fechaFinalizacion,
        descripcion: InputDescripcion,
      }
      cargarViaje(data);
    }else {
        alert("Por favor complete los campos obligatorios");
      }
  }
function cargarVuelo() {
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
        return response.json();
      }
    })
    .catch((error) => console.log(error));
}
