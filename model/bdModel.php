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
/*     public function getViajes($id){
            $sentencia = $this->db->prepare("SELECT * from viajes  WHERE id_viajes = ?");
            $sentencia->execute(array($id));
            $viajes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $viajes;
    } */
//funcion GET trae todos los viajes
/*     public function getViajes(){
            $sentencia = $this->db->prepare("SELECT * from viajes");
            $sentencia->execute();
            $viajes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $viajes;
    } */
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
/*     public function insertarViajes($origen,$destino,$fecha_inicio,$fecha_fin){

        $sentencia = $this->db->prepare("INSERT INTO viajes (origen, destino, fecha_inicio, fecha_fin, ) VALUES(?,?,?,?)");
        $sentencia->execute(array($origen,$destino,$fecha_inicio,$fecha_fin));
    } */
//funcion POST inserta un alojamiento
    public function insertarAlojamientos($nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros){
        var_dump(array($nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros));
        $sentencia = $this->db->prepare("INSERT INTO alojamientos (nombre,ciudad,fecha_inicio,fecha_fin,descripcion,contacto,cod_confirmacion,checkin,checkout,cant_noches,cant_habitacion,cant_pasajeros) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
        $sentencia->execute(array($nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion,$contacto,$cod_confirmacion,$checkin,$checkout,$cant_noches,$cant_habitacion,$cant_pasajeros));
    }

            
}
?>