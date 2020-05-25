<?php
require_once("Router.php");
require_once("app/controllers/HotelController.php");

define("BASE", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("BASE_HOTEL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/hotel');

// recurso solicitado
$action = $_GET["action"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("hotel/:ID", "GET", "HotelController", "getCommentsbyCancion");
$router->addRoute("hotel/:ID", "DELETE", "HotelController", "deleteComment");
$router->addRoute("hotel", "POST", "HotelController", "create");
$router->addRoute("hotel", "GET", "HotelController", "displayForm");
$router->addRoute("hotel/:ID", "PUT", "HotelController", "updateComment");
$router->addRoute(":", "GET", "HotelController", "displayForm");


// rutea
$router->route($action, $method);