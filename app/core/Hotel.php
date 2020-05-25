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
            $plan
        ) 
    {
        parent::__construct($plan);
        $this->check_in_horario = $plan['check_in_horario'];
        $this->check_out_horario = $plan['check_out_horario'];
        $this->codigo_confirm = $plan['codigo_confirm'];
        $this->cant_noches = $plan['cant_noches'];
        $this->cant_habitaciones = $plan['cant_habitaciones'];
        $this->cant_personas = $plan['cant_personas'];
    }

    public function getCheckIn() {
        return $this->check_in_horario;
    }

    public function getCheckOut() {
        return $this->check_out_horario;
    }

    public function getCodigoConfirm() {
        return $this->codigo_confirm;
    }

    public function getCantNoches() {
        return $this->cant_noches;
    }

    public function getCantHabitaciones() {
        return $this->cant_habitaciones;
    }

    public function getCantPersonas() {
        return $this->cant_personas;
    }
}