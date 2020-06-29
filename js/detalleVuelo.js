"use strict";
document.addEventListener("DOMContentLoaded", cargar);
function cargar() {
  let id;
  if (localStorage.getItem("idV")) {
    id = localStorage.getItem("idV");
  } else {
    console.log("no guardo los datos");
  }
  console.log(id);

  traerVuelo(id);
}

function traerVuelo(id) {
  console.log(id);
}
