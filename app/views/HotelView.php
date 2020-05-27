<?php

class HotelView {
    private $formularioAlta;
    private $hoteles;
    private $hotel;
    private $info;

    public function __construct() {

        // template reservas hoteles
        $this->hoteles = 'html/reservas.html';

        //template hotel
        $this->hotel = 'html/reservaHotel.html';

        //template formulario alta reserva hotel
        $this->formularioAlta = 'html/cargarReserva.html';

        //tempalte instructivo carga automatica
        $this->info = 'html/GP8-32-altaHotelMail.html';
    }

    public function displayHotel() {
        $this->mostrarTemplate($this->hotel);
    }

    public function displayForm() {
        $this->mostrarTemplate($this->formularioAlta);
    }

    public function displayHoteles() {
        $this->mostrarTemplate($this->hoteles);
    }

    public function displayInfo() {
        $this->mostrarTemplate($this->info);
    }

    public function mostrarTemplate($template) {
        $file = fopen($template, 'r');
        while(!feof($file)) {
            $linea = fgets($file);
            echo $linea . PHP_EOL;
        }
        fclose($file);
    }
}
