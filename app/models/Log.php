<?php

class Log {
    private $archivo;
    private $log;

    public function __construct() {
       
    }

    public function record($texto) {
        $archivo = fopen('app/data/log.txt', 'a');
        fwrite($archivo, $texto . PHP_EOL);
        fclose($archivo);
    }

}