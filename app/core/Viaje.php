<?php

class Viaje extends Plan{
    protected $planes;

    public function __construct($nombre, $fecha_inicio, $fecha_fin, $destino, $descripcion) {
        parent::__construct($nombre, $fecha_inicio, $fecha_fin, $destino, $descripcion);
        $this->planes = array();
    }

    /*
    * Controla si existe el plan, si no existe lo agrega
    */
    public function addPlan($plan) {
        $added = false;

        if(!existePlan($plan)) {
            array_push($this->planes, $plan);
            $added = true;
        }

        return $added;
    }

    /*
    * Devuelve verdadero si encuentra el plan usando "==" verifica por atributos y puntero de objeto
    */
    public function existePlan($plan) {
        $existe = false;

        foreach ($this->planes as $e) {
            if($e == $plan) {
                $existe = true;
            }
        }

        return $existe;
    }

    public function getIndexOf($plan) {
        $result = -1;

        for ($i = 0; $i < $this->planes->count; $i++) {
            if($this->planes[i] == $plan) {
                $result = $i;
            }
        }

        return $result;
    }

    /*
    * Devuelve un plan determinado segun index
    */
    public function getPlan($indexOf) {
        $result = null;

        if($indexOf < $this->planes->count) {
            $result = $this->planes[$indexOf];
        }

        return $result;
    }

    /*
    * Devuelve un arreglo de nombres (no devuelve string)
    */
    public function getNombre() {
        $nombres = array();

        array_push($nombres, $this->nombre); // el primer elemento del arreglo será el dato de viaje

        foreach ($this->planes as $e) {
            array_push($nombres, $e->getNombre());
        }

        return $nombres;
    }

    public function getFechaInicio() {
        $inicios = array();

        array_push($inicios, $this->fecha_inicio);

        foreach ($this->planes as $e) {
            array_push($inicios, $e->getFechaInicio());
        }

        return $inicios;
    }

    public function getFechaFin() {
        $finales = array();

        array_push($finales, $this->fecha_fin);

        foreach ($this->planes as $e) {
            array_push($finales, $e->getFechaFin());
        }

        return $finales;
    }

    public function getDestino() {
        $destinos = array();

        array_push($destinos, $this->destino);

        foreach ($this->planes as $e) {
            array_push($destinos, $e->getDestino());
        }

        return $destinos;
    }

    public function getDescripcion() {
        $descripciones = array();

        array_push($descripciones, $this->descripcion);

        foreach ($this->planes as $e) {
            array_push($descripciones, $e->getDescripcion());
        }

        return $descripciones;
    }

}