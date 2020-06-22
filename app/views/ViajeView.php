<?php

class ViajeView {
    private $viajes;
    private $formularioCargar;

    public function __construct() {

        // template viajes
        $this->viajes = 'html/Viajes.html';
        $this->formularioCargar = 'html/cargarViaje.html' ;
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
    
}