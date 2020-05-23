<?php

abstract class Plan {
    protected $nombre;
    protected $fecha_inicio;
    protected $fecha_fin;
    protected $destino;
    protected $descripcion;
    
    public function __construct($plan) {
        $this->nombre = $plan['nombre'];
        $this->fecha_inicio = $plan['fecha_inicio'];
        $this->fecha_fin = $plan['fecha_fin'];
        $this->destino = $plan['destino'];
        $this->descripcion = $plan['descripcion'];
    }

    public abstract function getNombre();

    public abstract function getFechaInicio();

    public abstract function getFechaFin();

    public abstract function getDestino();

    public abstract function getDescripcion();

}