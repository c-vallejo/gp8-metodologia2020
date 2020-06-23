document.addEventListener("DOMContentLoaded", load);
("use strict");
function load() {
  document.querySelector("#form_alta").addEventListener("submit", cargarViaje);
  // carga el formulario a la BD
  function cargarViaje(e) {
    e.preventDefault();

    //toma los datos de los campos del formulario
    let nombre = document.querySelector("#inputNombreReserva").value;
    let ciudad = document.querySelector("#inputCiudadDestino").value;
    let fechaInicio = document.querySelector("#fechaInicio").value;
    let fechaFinalizacion = document.querySelector("#fechaFinalizacion").value;
    let InputDescripcion = document.querySelector("#InputDescripcion").value;

    //verifica que los compos nombre, ciudad, fecha inicio y fecha fin esten completos
    if (
      nombre != "" &&
      ciudad != "" &&
      fechaInicio != "" &&
      fechaFinalizacion != ""
    ) {
      //carga los datos para ser enviads via API
      let data = {
        titulo: nombre,
        destino: ciudad,
        fecha_inicio: fechaInicio,
        fecha_fin: fechaFinalizacion,
        descripcion: InputDescripcion,
      };
      console.log(data);
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
            return response.json();
          }
        })
        .catch((error) => console.log(error));
    } else {
      alert("Por favor complete los campos obligatorios");
    }
  }
}
