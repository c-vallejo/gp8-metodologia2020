<?php
    require_once("Router.php");
    require_once "api/bdApiController.php";
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    // recurso solicitado
    $resource = $_GET["resource"];

    // método utilizado
    $method = $_SERVER["REQUEST_METHOD"];
    
    $router = new Router();

    // rutas

    $router->addRoute("viajes", "GET", "bdApiController", "getViajes");
    $router->addRoute("viajes/:ID", "GET", "bdApiController", "getViajesId");
    $router->addRoute("alojamientos", "GET", "bdApiController", "getAlojamientos");
    $router->addRoute("alojamientos/:ID", "GET", "bdApiController", "getAlojamientosId");
    $router->addRoute("insertar_viaje", "POST", "bdApiController", "insertarViaje");
    $router->addRoute("insertar_alojamiento", "POST", "bdApiController", "insertarAlojamiento");
    $router->addRoute("vuelos", "GET", "bdApiController", "getVuelos");
    $router->addRoute("vuelos/:ID", "GET", "bdApiController", "getVueloId");


    //run
    $router->route($resource, $method); 
