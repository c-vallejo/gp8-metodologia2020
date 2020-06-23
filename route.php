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

// arma la tabla de ruteo
$router->addRoute("viajes", "GET", "ViajesController", "displayViajes");
$router->addRoute(":", "GET", "ViajesController", "displayCargarViajes");
//$router->addRoute("agregarViaje", "POST", "ViajesController", "displayCargarViajes");
$router->addRoute("info", "GET", "HotelController", "displayInfo");
$router->addRoute("hotel", "POST", "HotelController", "create");
$router->addRoute("hotel", "GET", "HotelController", "displayForm");
$router->addRoute("hotel/:ID", "GET", "HotelController", "displayHotel");



// rutea
$router->route($action, $method);