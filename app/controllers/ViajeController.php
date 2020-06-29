<?php
require_once 'app\views\ViajeView.php';


class ViajesController extends Controller{

    public function __construct() {
        parent::__construct();
        $this->view = new ViajeView();
    }

    public function displayViajes() {
        $this->view->displayViajes();
    }
    public function displayCargarViajes() {
        $this->view->displayCargarViajes();
    }
    public function displayDetalleViaje() {
        $this->view->displayDetalleViaje();
    }
    public function detalleVuelo() {
        $this->view->detalleVuelo();
    }
    public function displayCargarVuelo() {
        $this->view->displayCargarVuelo();
    }
}