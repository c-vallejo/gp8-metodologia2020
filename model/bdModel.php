<?php


class bdModel extends PDO{



    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=viajesApp;charset=utf8', 'root', '');
    }

    public function get($id) {
        $query = $this->db->prepare("SELECT * FROM viajes WHERE id = ?");
        $query->execute(array($id));

        return $query->fetch(PDO::FETCH_OBJ);
    }


    public function getViajes($id){
            $sentencia = $this->db->prepare("SELECT * from viajes  WHERE id_viajes = ?");
            $sentencia->execute(array($id));
            $viajes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $viajes;
    }

    public function getViajes(){
            $sentencia = $this->db->prepare("SELECT * from viajes");
            $sentencia->execute();
            $viajes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $viajes;
    }

    public function getAlojamientos($id){
        $sentencia = $this->db->prepare("SELECT * from viajes  WHERE id_alojamientos = ?");
        $sentencia->execute(array($id));
        $alojamientos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $alojamientos;
}

    public function getAlojamientos(){
        $sentencia = $this->db->prepare("SELECT * from alojamientos");
        $sentencia->execute();
        $alojamientos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $alojamientos;
}

    

    public function insertarViajes($origen,$destino,$fecha_inicio,$fecha_fin){

        $sentencia = $this->db->prepare("INSERT INTO viajes (origen, destino, fecha_inicio, fecha_fin, ) VALUES(?,?,?,?)");
        $sentencia->execute(array($origen,$destino,$fecha_inicio,$fecha_fin));
    }

    public function insertarAlojamientos($nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion){

        $sentencia = $this->db->prepare("INSERT INTO viajes (origen, destino, fecha_inicio, fecha_fin, descripcion) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($nombre,$ciudad,$fecha_inicio,$fecha_fin,$descripcion));
    }

            
}
?>