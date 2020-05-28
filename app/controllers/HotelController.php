<?php
require_once 'Controller.php';
require_once 'app\core\Hotel.php';
require_once 'app\models\Model.php';
require_once 'app\views\HotelView.php';
//require_once 'ViajeController.php'; //TO-DO

class HotelController extends Controller{
    protected $viajeController;

    public function __construct() {
        parent::__construct();
        $this->model = new Model();
        $this->view = new HotelView();
        //$this->viajeController = new ViajeController(); //TO-DO
    }

    public function displayForm() {
        $this->view->displayForm();
    }

    public function displayHoteles() {
        $this->view->displayHoteles();
    }

    public function displayHotel() {
        $this->view->displayHotel();
    }

    public function displayInfo() {
        $this->view->displayInfo();
    }

    public function create() {
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
                $hotel = $_POST;

                //Verifica si existe un viaje en esa fecha
                if(!$this->existeViaje($hotel)) {
                    $this->model->createViaje($viaje);
                }
                $this->model->createHotel($hotel);
            }
            header("Location: " . BASE_HOTEL);
        }
    }

    private function existeViaje($hotel) {
        $existeViaje = false;

        $viaje = $this->model->getViaje($hotel['fecha_inicio']); // Se espera que el modelo devuelva información del viaje o null si no existe
        if($viaje =! null) {
            $existeViaje = true;
        }
        return $existeViaje;
    }
}