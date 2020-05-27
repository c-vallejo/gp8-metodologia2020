<?php
require_once 'Plan.php';

class Viaje extends Plan{
    protected $planes;

    public function __construct($plan) {
        parent::__construct($plan);
        $this->planes = array();
    }

    /*
    * Controla si existe el plan, si no existe lo agrega
    */
    public function addPlan($plan) {
        $added = false;

        if(!$this->existePlan($plan)) {
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

    public function __toString() {
        return "Viaje: " . $this->nombre . " Inicio: " . $this->fecha_inicio . " Fin: " . $this->fecha_fin;
    }
}