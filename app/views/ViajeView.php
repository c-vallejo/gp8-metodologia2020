<?php

class ViajeView {
    private $viajes;

    public function __construct() {

        // template viajes
        $this->viajes = 'html/Viajes.html';
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

}