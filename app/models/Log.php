<?php

class Log {
    private $archivo;
    private $log;

    public function __construct() {
       
    }

    public function record($texto) {
        $archivo = fopen('app/data/log.txt', 'r+');
        fwrite($archivo, $texto);
        fclose($archivo);
    }

}