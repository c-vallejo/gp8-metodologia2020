document.addEventListener("DOMContentLoaded", load);
("use strict");
function load() {
  document.querySelector("#form_alta").addEventListener("submit", verificarFormulario);
  // carga el formulario a la BD

  function verificarFormulario(e){
    e.preventDefault();

    //toma los datos de los campos del formulario
    let nombre = document.querySelector("#inputNombreReserva").value;
    let ciudad = document.querySelector("#inputCiudadDestino").value;
    let fechaInicio = document.querySelector("#fechaInicio").value;
    let fechaFinalizacion = document.querySelector("#fechaFinalizacion").value;
    let InputDescripcion = document.querySelector("#InputDescripcion").value;

    //verifica que los campos nombre, ciudad, fecha inicio y fecha fin esten completos
    if (
      nombre != "" &&
      ciudad != "" &&
      fechaInicio != "" &&
      fechaFinalizacion != ""
    ) {
      //carga los datos para ser enviados via API y se lo pasa a dicha funcion.
      let data = {
        titulo: nombre,
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
  function cargarViaje(data) {
    
      let url = "api/viajes";

      //envia los datos a la API
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
            location.replace("./viajes");
            return response.json();
          }
        })
        .catch((error) => console.log(error));
    } 
  }
