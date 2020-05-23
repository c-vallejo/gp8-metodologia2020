<?php
require_once 'Controller.php';
require_once 'app\core\Hotel.php';
// require_once 'app\models\HotelModel.php';
// require_once 'app\views\HotelView.php';

//require_once 'ViajeController.php'; //TO-DO

class HotelController extends Controller{
    protected $viajeController;

    public function __construct() {
        parent::__construct();
        // $this->model = new HotelModel();
        // $this->view = new HotelView();
        //$this->viajeController = new ViajeController(); //TO-DO
    }

    public function create() {
        //var_dump($_POST);die();
        if($this->session->checkLogin()) {
            if(
                isset($_POST) && 
                isset($_POST['nombre']) && 
                isset($_POST['fecha_inicio']) && 
                isset($_POST['fecha_fin']) && 
                isset($_POST['destino']) && 
                isset($_POST['descripcion']) &&
                isset($_POST['check_in_horario']) &&
                isset($_POST['check_out_horario']) &&
                isset($_POST['codigo_confirm']) &&
                isset($_POST['cant_noches']) &&
                isset($_POST['cant_habitaciones']) &&
                isset($_POST['cant_personas'])
                ) 
                
            {
                //var_dump($_POST);die();
                $hotel = new Hotel($_POST);
                var_dump($hotel);die();

                //Verifica si existe un viaje en esa fecha
                $viaje = $this->getViaje($hotel);
                
                if($viaje != null) {
                    $viaje->addPlan($hotel);
                } else {
                    //$this->viajeController->create($viaje); //TO-DO
                }
                //$this->model->create($hotel);
            }
            header("Location: " . BASE_HOTEL);
        }
    }

    private function getViaje($hotel) {
        $viaje = $this->model->getViaje($hotel->getFechaInicio(), $hotel->getFechaFin()); // Se espera que el modelo devuelva información del viaje o null si no existe
        if($viaje =! null) {
            $viaje = new Viaje($hotel);
        }
        return $viaje;
    }
}