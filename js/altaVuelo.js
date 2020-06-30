document.addEventListener("DOMContentLoaded", load);
("use strict");
function load() {
  document
    .querySelector("#botonActualizar")
    .addEventListener("click", cargarVuelo);
}
// carga el formulario a la BD
function cargarVuelo(e) {
  e.preventDefault();

  let datosPrecargados = [
    {
      id_viaje: "1",
      salida: "Buenos Aires",
      fecha_salida: "10-10-2020",
      hora_salida: "20:20",
      llegada: "Miami",
      fecha_llegada: "11-10-2020",
      hora_llegada: "05:30",
      duracion_vuelo: "9:10",
      cod_salida: "123rt",
      cod_llegada: " 321tr",
      cod_reserva: "miamiAustralP3304",
      huella_carbono: "307",
      aerolinea: "Austral",
      cod_vuelo: "123rt321tr",
      tipo_avion: "Boing 777",
      cant_pasajeros: "280",
      notas: "Peso maximo valijas 40Kg ",
    },
    {
      id_viaje: "2",
      salida: "Buenos Aires",
      fecha_salida: "12-11-2022",
      hora_salida: "20:20",
      llegada: "Japon",
      fecha_llegada: "13-11-2022",
      hora_llegada: "05:30",
      duracion_vuelo: "9:10",
      cod_salida: "555jap",
      cod_llegada: "555paj",
      cod_reserva: "japonAustralP7777",
      huella_carbono: "607",
      aerolinea: "Austral",
      cod_vuelo: "555jap555paj",
      tipo_avion: "Arbus 380",
      cant_pasajeros: "380",
      notas: "Peso maximo valijas 60Kg ",
    },
    {
      id_viaje: "3",
      salida: "Buenos Aires",
      fecha_salida: "2030-11-15",
      hora_salida: "21:20",
      llegada: "Australia",
      fecha_llegada: "2030-11-16",
      hora_llegada: "06:30",
      duracion_vuelo: "9:10",
      cod_salida: "999PF",
      cod_llegada: "999FP",
      cod_reserva: "australiaAerolineasP7777",
      huella_carbono: "657",
      aerolinea: "Aerolineas",
      cod_vuelo: "999FP999PF",
      tipo_avion: "Arbus 380",
      cant_pasajeros: "380",
      notas: "Peso maximo valijas 60Kg ",
    },
  ];

  let indice = Math.floor(Math.random() * 3);
  console.log(indice);
  let data = datosPrecargados[indice];

  if (indice === 1 || indice === 2) {
    alert("Hay un viaje en esa Fecha se asigna el vuelo");
  } else {
    alert("Se creo un viaje por q no existe ninguno en esa Fecha");
    let data1 = {
      titulo: "Viaje Creado Automaticamente",
      destino: data.llegada,
      fecha_inicio: data.fecha_salida,
      fecha_fin: " ",
      descripcion: "Viaje creado Automaticamente por cargar un vuelo por Mail",
    };
    console.log(data1);
    let url = "api/viajes";

    //envia los datos a la API
    fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data1),
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

  //let data =  datosPrecargados[indice];

  console.log(data);
  let url = "api/vuelosAdd";

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
  /*} else {
      alert("Por favor complete los campos obligatorios");
    }*/
}
