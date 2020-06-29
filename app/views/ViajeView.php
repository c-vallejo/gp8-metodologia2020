<?php

class ViajeView {
    private $viajes;
    private $formularioCargar;
    private $detalle;
    private $vuelo;
    private $formularioVuelo;

    public function __construct() {

        // template viajes
        $this->viajes = 'html/Viajes.html';
        $this->formularioCargar = 'html/cargarViaje.html';
        $this->detalle = 'html/detalleViaje.html';
        $this->vuelo = 'html/InfodeVuelo.html';
        $this->formularioVuelo = 'html/formAltaVuelo.html';
    }

    public function mostrarTemplate($template) {
        $file = fopen($template, 'r');
        while(!feof($file)) {
            $linea = fgets($file);
            echo $linea . PHP_EOL;
        }
        fclose($file);
    }

    public function displayViajes() {
        $this->mostrarTemplate($this->viajes);
    }

    public function displayCargarViajes() {
        $this->mostrarTemplate($this->formularioCargar);
    }
    public function displayDetalleViaje() {
        $this->mostrarTemplate($this->detalle);
    }
    public function detalleVuelo(){
        $this->mostrarTemplate($this->vuelo);
    }
    public function displayCargarVuelo() {
        $this->mostrarTemplate($this->formularioVuelo);
    }
}