<?php
require_once 'Plan.php';

class Hotel extends Plan {
    protected $check_in_horario;
    protected $check_out_horario;
    protected $codigo_confirm;
    protected $cant_noches;
    protected $cant_habitaciones;
    protected $cant_personas;
    
    public function __construct($nombre, $fecha_inicio, $fecha_fin, $destino, $descripcion) {
        parent::__construct($nombre, $fecha_inicio, $fecha_fin, $destino, $descripcion);
    }
}