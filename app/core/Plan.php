<?php

abstract class Plan {
    protected $nombre;
    protected $fecha_inicio;
    protected $fecha_fin;
    protected $destino;
    protected $descripcion;
    
    public function __construct($nombre, $fecha_inicio, $fecha_fin, $destino, $descripcion) {
        $this->nombre = $nombre;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->destino = $destino;
        $this->descripcion = $descripcion;
    }

    public abstract function getNombre();

    public abstract function getFechaInicio();

    public abstract function getFechaFin();

    public abstract function getDestino();

    public abstract function getDescripcion();

}