"use strict"
document.addEventListener("DOMContentLoaded",load);
function load(){
    cargarTabla();
}
let objeto = {
                "nombre" : "Hotel Nom",
                "direccion" : "Direccion 1234",
                "contacto" : "ejemplo@gmail.com",
                "codigoConfirmacion": "1234",
                "fechaInicio":"",
                "checkin":"3/6/2020, 14.30hs",
                "fechaFin":"",
                "checkout":"7/6/2020, 17.00hs",
                "cantNoches":"4",
                "cantHab":"1",
                "cantPersonasAsociadas": "1",
}

function cargarTabla(){
    let container = document.querySelector(".datosReserva");
    mostrarDatosTabla(container);
}

function mostrarDatosTabla(container){
    container.innerHTML= "";
        let row1 = container.insertRow(0);
        let row2 = container.insertRow(1);
        let row3 = container.insertRow(2);
        let row4 = container.insertRow(3);
        let row5 = container.insertRow(4);
        let row6 = container.insertRow(5);
        let row7 = container.insertRow(6);
        let row8 = container.insertRow(7);
        let row9 = container.insertRow(8);       
        row1.innerHTML ="Nombre" + objeto.nombre;
        row2.innerHTML = "Direccion:" + objeto.direccion;
        row3.innerHTML = "Informacion de Contacto:" + objeto.contacto;
        row4.innerHTML = "Codigo de Confirmacion: " + objeto.codigoConfirmacion;
        row5.innerHTML = "Horario de CheckIn: " + objeto.checkin;
        row6.innerHTML = "Horario de CheckOut:" + objeto.checkout;
        row7.innerHTML = "Cantidad de Noches: " + objeto.cantNoches;
        row8.innerHTML = "Cantidad de Habitaciones: " + objeto.cantHab; 
        row9.innerHTML ="Cantidad de Personas Asociadas a la Reserva: " + objeto.cantPersonasAsociadas;
    
}


