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
        if(!existePlan($plan)) {
            array($this->planes, $plan);
        }
    }

    /*
    * Devuelve un arreglo de planes
    */
    public function getPlanes() {
        return $this->planes;
    }

    public function existePlan($plan) {
        $existe = false;

        foreach ($this->planes as $e) {
            if($e == $plan) {
                $existe = true;
            }
        }

        return $existe;
    }
}