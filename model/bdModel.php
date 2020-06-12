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
         //cuando se agregue la tabla de vuelo agregar al join
            $sentencia = $this->db->prepare('SELECT v.titulo, v.fecha_inicio, v.fecha_fin, v.finalizado, v.descripcion, h.id_alojamiento, h.nombre, h.ciudad, h.fecha_inicio "reserva", h.fecha_fin "fin reserva", h.checkin, h.descripcion "nota hotel" from viajes v INNER JOIN alojamientos h ON v.id_viaje = h.id_viaje WHERE v.id_viaje = ?');
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
    public function getAlojamientosId($id){
        $sentencia = $this->db->prepare("SELECT * from alojamientos  WHERE id_alojamientos = ?");
        $sentencia->execute(array($id));
        $alojamientos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $alojamientos;
}
//funcion GET trae todos los alojamientos
    public function getAlojamientos(){
        $sentencia = $this->db->prepare("SELECT * from alojamientos");
        $sentencia->execute();
        $alojamientos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $alojamientos;
}
//funcion POST inserta un viaje
     public function insertarViaje($titulo,$destino,$fecha_inicio,$fecha_fin,$descripcion){

        $sentencia = $this->db->prepare("INSERT INTO viajes (titulo, destino, fecha_inicio, fecha_fin, descripcion ) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($titulo,$destino,$fecha_inicio,$fecha_fin,$descripcion));
    }
    public function finalizarViaje($id_viaje, $finalizado){
        $sentencia = $this->db->prepare("UPDATE 'viajes' SET 'finalizado' = '?' WHERE 'viajes'.'id_viaje' = '?'");
        $sentencia->execute(array($id_viaje,$finalizado));

    }
//funcion POST inserta un alojamiento
    public function insertarAlojamientos($id_viaje,$nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros){

        $sentencia = $this->db->prepare("INSERT INTO alojamientos (id_viaje,nombre,ciudad,fecha_inicio,fecha_fin,descripcion,contacto,cod_confirmacion,checkin,checkout,cant_noches,cant_habitacion,cant_pasajeros) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($id_viaje,$nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros));
    }
    
    public function getVuelos(){

        $sentencia = $this->db->prepare("SELECT * from vuelo");
        $sentencia->execute();
        $vuelos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vuelos;
    }

    public function getVueloId($id){

        $sentencia = $this->db->prepare("SELECT * from vuelo  WHERE id_vuelo = ?");
        $sentencia->execute(array($id));
        $vuelo = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $vuelo;
    }

    public function insertarVuelo($id_viaje, $salida, $fecha_salida,$hora_salida,$llegada, $fecha_llegada,$hora_llegada, $duracion_vuelo,$cod_salida,$cod_llegada,$cod_reserva,$huella_carbono,$aerolinea,$cod_vuelo,$tipo_avion,$cant_pasajeros,$notas){
        
       $sentencia = $this->db->prepare("INSERT INTO vuelo (id_viaje, salida, fecha_salida,hora_salida,llegada,
        fecha_llegada,hora_llegada, duracion_vuelo, cod_salida,cod_llegada,cod_reserva,huella_carbono,
        aerolinea,cod_vuelo,tipo_avion,cant_pasajeros,notas) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       
       $sentencia->execute(array($id_viaje, $salida, $fecha_salida,$hora_salida,$llegada, $fecha_llegada,$hora_llegada, 
        $duracion_vuelo,$cod_salida,$cod_llegada,$cod_reserva,$huella_carbono,$aerolinea,$cod_vuelo,$tipo_avion,$cant_pasajeros,$notas));
    }

}
