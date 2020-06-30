<?php


class bdModel extends PDO{

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=viajesapp;charset=utf8', 'root', '');
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id = ?");
        $query->execute(array($id));

        return $query->fetch(PDO::FETCH_OBJ);
    }

//funcion GET trae el viaje segun un ID
     public function getViajesId($id){
        //Para que funcione con los vuelos y alojamientos se tiene que hacer en llamados distintos
            $sentencia = $this->db->prepare('SELECT * FROM viajes WHERE id_viaje = ?');
            $sentencia->execute([$id]);
            $viaje = $sentencia->fetchAll(PDO::FETCH_OBJ);
            
            return $viaje;
    } 
//funcion GET trae todos los viajes
     public function getViajes(){
            $sentencia = $this->db->prepare("SELECT * from viajes");
            $sentencia->execute();
            $viajes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $viajes;
    }
//funcion GET trae un alojamiento segun su ID
    public function getAlojamientoId($id){
        $sentencia = $this->db->prepare("SELECT * from alojamientos  WHERE id_alojamiento = ?");
        $sentencia->execute([$id]);
        $alojamientos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $alojamientos;
}
//funcion GET trae todos los alojamientos con el id de un viaje
    public function getAlojamientos($id){
       
        $sentencia = $this->db->prepare("SELECT * from alojamientos WHERE id_viaje= ?");
        $sentencia->execute([$id]);
        $alojamientos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $alojamientos;
}
//funcion POST inserta un viaje
     public function insertarViaje($titulo,$destino,$fecha_inicio,$fecha_fin,$descripcion){

        $sentencia = $this->db->prepare("INSERT INTO viajes (titulo, destino, fecha_inicio, fecha_fin, descripcion ) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($titulo,$destino,$fecha_inicio,$fecha_fin,$descripcion));
    }

//Funcion UPDATE. Finaliza un viaje.
    public function finalizarViaje($id_viaje){

        $sentencia = $this->db->prepare("UPDATE 'viajes' SET 'finalizado' = 1 WHERE 'viajes'.'id_viaje' = '?'");
        $sentencia->execute(array($id_viaje));

    }
//funcion POST inserta un alojamiento
    public function insertarAlojamientos($id_viaje,$nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros){

        $sentencia = $this->db->prepare("INSERT INTO alojamientos (id_viaje,nombre,ciudad,fecha_inicio,fecha_fin,descripcion,contacto,cod_confirmacion,checkin,checkout,cant_noches,cant_habitacion,cant_pasajeros) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($id_viaje,$nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros));
    }
//Funcion GET. Trae los vuelos con un id de viaje    
    public function getVuelos($id){

        $sentencia = $this->db->prepare("SELECT * from vuelo WHERE id_viaje= ?");
        $sentencia->execute([$id]);
        $vuelos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vuelos;
    }
//Funcion GET. trae los vuelos por una Id de vuelo
    public function getVueloId($id){
        $sentencia = $this->db->prepare("SELECT * from vuelo  WHERE id_vuelo = ?");
        $sentencia->execute(array($id));
        $vuelo = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vuelo;
    }
    
//Funcion POST. carga datos de un vuelo en la base de datos
    public function insertarVuelo($id_viaje, $salida, $fecha_salida,$hora_salida,$llegada, $fecha_llegada,$hora_llegada, $duracion_vuelo,$cod_salida,$cod_llegada,$cod_reserva,$huella_carbono,$aerolinea,$cod_vuelo,$tipo_avion,$cant_pasajeros,$notas){
        
       $sentencia = $this->db->prepare("INSERT INTO vuelo (id_viaje, salida, fecha_salida,hora_salida,llegada,
        fecha_llegada,hora_llegada, duracion_vuelo, cod_salida,cod_llegada,cod_reserva,huella_carbono,
        aerolinea,cod_vuelo,tipo_avion,cant_pasajeros,notas) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       
       $sentencia->execute(array($id_viaje, $salida, $fecha_salida,$hora_salida,$llegada, $fecha_llegada,$hora_llegada, 
        $duracion_vuelo,$cod_salida,$cod_llegada,$cod_reserva,$huella_carbono,$aerolinea,$cod_vuelo,$tipo_avion,$cant_pasajeros,$notas));
        
    }

}
