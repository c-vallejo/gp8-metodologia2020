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

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function getDestino() {
        return $this->destino;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

}