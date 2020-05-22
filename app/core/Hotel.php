<?php
require_once 'Plan.php';

class Hotel extends Plan {
    protected $check_in_horario;
    protected $check_out_horario;
    protected $codigo_confirm;
    protected $cant_noches;
    protected $cant_habitaciones;
    protected $cant_personas;
    
    public function __construct
        (
            $nombre, 
            $fecha_inicio, 
            $fecha_fin, 
            $destino, 
            $descripcion,
            $check_in_horario, 
            $check_out_horario, 
            $codigo_confirm,
            $cant_noches,
            $cant_habitaciones,
            $cant_personas
        ) 
    {
        parent::__construct($nombre, $fecha_inicio, $fecha_fin, $destino, $descripcion);
        $this->nombre = $nombre;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->destino = $destino;
        $this->descripcion = $descripcion;
    }

}