<?php
require_once 'app\core\Viaje.php';
require_once 'app\core\Hotel.php';
require_once 'app\models\Log.php';

class Model {
    private $viaje;

    public function __construct() {
        $this->viaje = null;
    }

    public function createHotel($hotel) {
        $plan = new Hotel($hotel);
        if($this->existeViaje()) {
            $this->viaje->addPlan($plan);
        } else {
            $this->createViaje($hotel);
            $this->viaje->addPlan($plan);
        }
        //var_dump($this->viaje);die();
        $log = new Log();
        $log->record($this->viaje->__toString());
        $log->record($plan->__toString());
        var_dump($this->viaje->__toString());die();
    }

    public function createViaje($viaje) {
        $this->viaje = new Viaje($viaje);
        //var_dump($this->viaje);die();
    }

    public function getViaje($inicio) {
        $resultViaje = null;

        if($this->existeViaje()) {
            if(($inicio >= $this->viaje->getFechaInicio()[0]) && ($inicio <= $this->viaje->getFechaFin()[0])) {
                $resultViaje = $this->viaje;
            }
        }

        return $resultViaje;
    }

    public function existeViaje() {
        return $this->viaje != null;
    }
}