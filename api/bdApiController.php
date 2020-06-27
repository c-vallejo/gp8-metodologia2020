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
    //Conecta con el model y trae los viejas de la bd
    public function  getViajes() {

        $viajes = $this->model->getViajes();
        $this->view->response($viajes, 200);
    }

    public function  getAlojamientosId($params = null) {
        $id = $params[':ID'];

        $alojamiento = $this->model->getAlojamientoId($id);
        $this->view->response($alojamiento, 200);
    }

    public function  getAlojamientos($params = null) {

        $id = $params[':ID'];
        $alojamiento = $this->model->getAlojamientos($id);
        $this->view->response($alojamiento, 200);
    }

    
     public function insertarViaje($params = null) {
        $data = $this->getData();
        
        $id = $this->model->insertarViaje($data->titulo, $data->destino, $data->fecha_inicio,
        $data->fecha_fin, $data->descripcion);
        $viajes = $this->model->get($id);
        var_dump($viajes); die;
        if ($viajes)
            $this->view->response($viajes, 200);
        else
            $this->view->response("El Viaje no fue creado", 500);
    }

    public function finalizarViaje($params = null){

        $id = $params[':ID'];
        $this->model->finalizarViaje($id);
        
        $viajes = $this->model->get($id);
        if ($viajes)
            $this->view->response($viajes, 200);
        else
            $this->view->response("El Viaje no fue actualizado", 500);
    }

    public function insertarAlojamiento($params = null) {
        $data = $this->getData();
        
        $id = $this->model->insertarAlojamientos($data->id_viaje, $data->nombre, $data->ciudad,
        $data->fecha_inicio, $data->fecha_fin,$data->descripcion, $data->contacto,$data->cod_confirmacion,
        $data->checkin,$data->checkout,$data->cant_noches,$data->cant_habitacion,$data->cant_pasajeros);
        
        $alojamiento = $this->model->get($id);
        if ($alojamiento)
            $this->view->response($alojamiento, 200);
        else
            $this->view->response("El Alojamiento no fue creado", 500);
    }

    public function  getVuelos($params = null) {
//agregar id viaje
        $id = $params[':ID'];
        $vuelo = $this->model->getVuelos($id);
        $this->view->response($vuelo, 200);
    }

    public function  getVueloId($params = null) {

        $id = $params[':ID'];
        $vuelo = $this->model->getVueloId($id);
        $this->view->response($vuelo, 200);
    }

    public function insertarVuelo($params = null) {
        $data = $this->getData();
        
        $id = $this->model->insertarVuelo($data->id_viaje, $data->salida, $data->fecha_salida,
        $data->hora_salida,$data->llegada, $data->fecha_llegada,$data->hora_llegada, $data->duracion_vuelo,
        $data->cod_salida,$data->cod_llegada,$data->cod_reserva,$data->huella_carbono,$data->aerolinea,
        $data->cod_vuelo,$data->tipo_avion,$data->cant_pasajeros,$data->notas);
        
        $vuelo = $this->model->getVueloId($id);
        if ($vuelo)
            $this->view->response($vuelo, 200);
        else
            $this->view->response("El vuelo no fue creado", 500);
    }

}
