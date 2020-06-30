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
