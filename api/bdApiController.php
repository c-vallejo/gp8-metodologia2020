<?php
require_once("model/bdModel.php");
require_once("jsonView.php");

class bdApiController {

    private $model;
    private $view;

    private $data;

    public function __construct() {
        $this->model = new bdModel();
        $this->view = new JSONView();
        $this->data = file_get_contents("php://input");
    }

    private function getData() {
        return json_decode($this->data);
    }

     public function  getViajesId($params = null) {

        $id = $params[':ID'];
        $viajes = $this->model->getViajesId($id);
        $this->view->response($viajes, 200);
    }

    public function  getViajes() {

        $viajes = $this->model->getViajes();
        $this->view->response($viajes, 200);
    }

    public function  getAlojamientosId($params = null) {

        $id = $params[':ID'];
        $alojamiento = $this->model->getAlojamientoId($id);
        $this->view->response($alojamiento, 200);
    }

    public function  getAlojamientos() {

        $alojamiento = $this->model->getAlojamientos();
        $this->view->response($alojamiento, 200);
    }

    
     public function insertarViajes($params = null) {
        $data = $this->getData();

        $id = $this->model->insertarViajes($data->titulo, $data->destino, $data->fecha_inicio, $data->fecha_fin, $data->descripcion);
        
        $viajes = $this->model->get($id);
        if ($viajes)
            $this->view->response($viajes, 200);
        else
            $this->view->response("El Viaje no fue creado", 500);
    }

    public function finalizarViaje($params = null){
        $data = $this->getData();

        $id = $this->model->finalizarViaje($data->id_viaje, $data->finalizado);
        
        $viajes = $this->model->getViajesId($id);
        if ($viajes)
            $this->view->response($viajes, 200);
        else
            $this->view->response("El Viaje no fue actualizado", 500);
    }

    public function insertarAlojamiento($params = null) {
        $data = $this->getData();

        var_dump($data);

        $id = $this->model->insertarAlojamientos($data->nombre, $data->ciudad, $data->fecha_inicio, $data->fecha_fin,$data->descripcion, $data->contacto,$data->cod_confirmacion,$data->checkin,$data->checkout,$data->cant_noches,$data->cant_habitacion,$data->cant_pasajeros);
        
        $alojamiento = $this->model->get($id);
        if ($alojamiento)
            $this->view->response($alojamiento, 200);
        else
            $this->view->response("El Alojamiento no fue creado", 500);

    }

}
