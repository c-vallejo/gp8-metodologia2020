"use strict"
document.addEventListener("DOMContentLoaded",load);
function load(){
    cargarTabla();
}
let objeto = {
                "numeroVuelo" : "LA8009",
                "compania" : "LATAM Airlines Goup",
                "codigoReserva" : "KYTKEW",
                "fechaSalida" : "20/12/2020",
                "horarioSalida": "12:35hs",
                "aeropuertoSalida": "Aeropuerto Buenos Aires Ministro Pistarini, Ezeiza",
                "fechaLlegada":"22/12/2020",
                "horarioLlegada":"8:50hs",
                "aeropuertoLlegada":"Aeropuerto Internacional Suvarnabhumi, Bangkok",
                "tiempoEscalas":"8:30hs",
                "infoAeronave":"Airbus A321-100/200",
}

function cargarTabla(){
    let container = document.querySelector(".datosVuelo");
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
        let row10 = container.insertRow(9);
        let row11 = container.insertRow(10);   
        row1.innerHTML ="Numero de Vuelo: " + objeto.numeroVuelo;
        row2.innerHTML = "Compañia: " + objeto.compania;
        row3.innerHTML = "Codigo de Reserva: " + objeto.codigoReserva;
        row4.innerHTML = "Fecha de Salida: " + objeto.fechaSalida;
        row5.innerHTML = "Horario de Salida: " + objeto.horarioSalida;
        row6.innerHTML = "Aeropuerto de Salida: " + objeto.aeropuertoSalida;
        row7.innerHTML = "Fecha de Llegada: " + objeto.fechaLlegada;
        row8.innerHTML = "Horario de Llegada:" + objeto.horarioLlegada;
        row9.innerHTML = "Aeropuerto de Llegada: " + objeto.aeropuertoLlegada;
        row10.innerHTML = "Tiempo entre Escalas: " + objeto.tiempoEscalas; 
        row11.innerHTML ="Informacion de la Aeronave: " + objeto.infoAeronave;
    
}