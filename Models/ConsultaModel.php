<?php
require_once("Models/Modelo.php");

class ConsultaModel {
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getCanciones($artista) {
        $sentencia = $this->db->prepare('SELECT *, canciones.nombre AS cancion, artistas.nombre AS artista FROM canciones JOIN artistas ON canciones.id_artista = artistas.id WHERE artistas.id = ?');
        $sentencia->execute(array($artista));
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllCancionesConArtistas() {
        $sentencia = $this->db->prepare('SELECT *, canciones.nombre AS cancion, artistas.nombre AS artista, canciones.id AS cancion_id FROM canciones JOIN artistas ON canciones.id_artista = artistas.id');
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','duracion','genero','album','id_artista','ranking')));
        $sentencia->execute($values);
    }

    public function getCancionPorId($id) {
        $sentencia = $this->db->prepare('SELECT *, canciones.nombre AS cancion, artistas.nombre AS artista, canciones.id AS cancion_id FROM canciones JOIN artistas ON canciones.id_artista = artistas.id WHERE cancion_id = ?');
        $sentencia->execute(array($id));
        $result = $sentencia->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}