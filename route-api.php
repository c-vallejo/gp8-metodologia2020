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
    $router->addRoute("viajes", "POST", "bdApiController", "insertarViaje");
    $router->addRoute("finalizado/:ID", "GET", "bdApiController", "finalizarViaje");
    $router->addRoute("alojamientos/:ID", "GET", "bdApiController", "getAlojamientos");
    $router->addRoute("alojamiento/:ID", "GET", "bdApiController", "getAlojamientosId");
    $router->addRoute("insertar_alojamiento", "POST", "bdApiController", "insertarAlojamiento");
    $router->addRoute("vuelos/:ID", "GET", "bdApiController", "getVuelos");
    $router->addRoute("vuelo/:ID", "GET", "bdApiController", "getVueloId");
    $router->addRoute("vuelosAdd", "POST", "bdApiController", "insertarVuelo"); // probando

    //run
    $router->route($resource, $method); 
