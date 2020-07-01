document.addEventListener("DOMContentLoaded", load);
("use strict");
function load() {
  document
    .querySelector("#botonActualizar")
    .addEventListener("click", cargarVuelo);
}
let alerta;
// carga el formulario a la BD
function cargarVuelo(e) {
  e.preventDefault();

  let datosPrecargados = [
    {
      id_viaje: "3",
      salida: "Buenos Aires",
      fecha_salida: "2020/02/25",
      hora_salida: "20:20",
      llegada: "Miami",
      fecha_llegada: "2020/03/10",
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
      notas: "Peso maximo de las valijas: 40Kg ",
    },
    {
      id_viaje: "2",
      salida: "Buenos Aires",
      fecha_salida: "2021/05/10",
      hora_salida: "20:20",
      llegada: "Japon",
      fecha_llegada: "2021/05/25",
      hora_llegada: "05:30",
      duracion_vuelo: "9:10",
      cod_salida: "555jap",
      cod_llegada: "555paj",
      cod_reserva: "japonAustralP7777",
      huella_carbono: "607",
      aerolinea: "Aerolineas Argentinas",
      cod_vuelo: "555jap555paj",
      tipo_avion: "Arbus 380",
      cant_pasajeros: "380",
      notas: "Peso maximo de las valijas: 60Kg ",
    },
    {
      id_viaje: "2",
      salida: "Buenos Aires",
      fecha_salida: "2022/08/14",
      hora_salida: "21:20",
      llegada: "Australia",
      fecha_llegada: "2022/08/30",
      hora_llegada: "06:30",
      duracion_vuelo: "9:10",
      cod_salida: "999PF",
      cod_llegada: "999FP",
      cod_reserva: "australiaAerolineasP7777",
      huella_carbono: "657",
      aerolinea: "Americar Airlines",
      cod_vuelo: "999FP999PF",
      tipo_avion: "Arbus 380",
      cant_pasajeros: "380",
      notas: "Peso maximo de las valijas: 60Kg ",
    },
  ];

  let indice = Math.floor(Math.random() * 3);
  console.log(indice);
  let data = datosPrecargados[indice];

  if (indice === 1 || indice === 2) {
    alerta =
      "Un viaje fue encontrado con la fecha del vuelo enviado por email. Se asingara al mismo.";
    cargarnuevovuelo(data);
  } else {
    alerta =
      "Se creo un viaje debido a que no hay existentes con la fecha del vuelo enviado por email.";
    let data1 = {
      titulo: "Viaje autogenerado",
      destino: data.llegada,
      fecha_inicio: data.fecha_salida,
      fecha_fin: data.fecha_fin,
      descripcion: "Viaje creado automaticamente por cargar un vuelo por Mail",
    };
    cargarviaje(data1);
    setTimeout(cargarnuevovuelo(data), 1500);
  }

  alert(alerta);
  location.replace("./viajes");
}

function cargarviaje(data1) {
  console.log(data1);
  let url = "api/viajes";

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

function cargarnuevovuelo(data) {
  console.log(data);
  let url = "api/vuelosAdd";

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
