<?php
require_once("Router.php");
require_once("app/controllers/HotelController.php");
require_once("app/controllers/ViajeController.php");

define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$action = $_GET["action"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo displayCargarVuelo
$router->addRoute("viajes", "GET", "ViajesController", "displayViajes");
$router->addRoute("formulario", "GET", "ViajesController", "displayCargarViajes");
$router->addRoute("detalleViaje", "GET", "ViajesController", "displayDetalleViaje");
$router->addRoute("detalleVuelo", "GET", "ViajesController", "detalleVuelo");
$router->addRoute("agregarVuelo", "GET", "ViajesController", "displayCargarVuelo");
$router->addRoute("info", "GET", "HotelController", "displayInfo");
$router->addRoute("hotel", "POST", "HotelController", "create");
$router->addRoute("agregarHotel", "GET", "HotelController", "displayForm");
$router->addRoute("hotel/:ID", "GET", "HotelController", "displayHotel");



// rutea
$router->route($action, $method);