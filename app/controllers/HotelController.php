<?php
require_once 'Controller.php';
require_once 'app\core\Hotel.php';
// require_once 'app\models\HotelModel.php';
// require_once 'app\views\HotelView.php';

class HotelController extends Controller{

    public function __construct() {
        parent::__construct();
        // $this->model = new HotelModel();
        // $this->view = new HotelView();
    }

    public function create() {
        if($this->session->checkLogin()) {
            if(isset($_POST) && 
                isset($_POST['nombre']) && 
                isset($_POST['fecha_inicio']) && 
                isset($_POST['fecha_fin']) && 
                isset($_POST['destino']) && 
                isset($_POST['descripcion'])) {
                    $hotel = new Hotel();
                    $this->model->create($hotel);
            }
            header("Location: " . BASE_HOTEL);
        }
    }

}