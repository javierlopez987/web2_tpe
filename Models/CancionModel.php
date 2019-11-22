<?php 
require_once("DB/Database.php");

class CancionModel {
    private $db;

    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "canciones";
    }

    public function get(){
        $query = $this->db->prepare('SELECT * FROM canciones'); 
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($values) {
        $sentencia = $this->db->prepare('INSERT INTO canciones (nombre, duracion, genero, album, id_artista, ranking) VALUES (?, ?, ?, ?, ?, ?)');
        $sentencia->execute($values);
    }

    public function update($values) {
        $sentencia = $this->db->prepare('UPDATE canciones SET nombre = ?, duracion = ?, genero = ?, album = ?, id_artista = ?, ranking = ? WHERE id = ?');
        $sentencia->execute($values);
    }

    public function delete($id) {
        $sentencia = $this->db->prepare('DELETE FROM canciones WHERE id=?');
        $sentencia->execute(array($id));
    }

    public function getCanciones($artista) {
        $sentencia = $this->db->prepare('SELECT *, canciones.nombre AS cancion, artistas.nombre AS artista FROM canciones JOIN artistas ON canciones.id_artista = artistas.id WHERE artistas.id = ?');
        $sentencia->execute(array($artista));
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllCancionesConArtistas() {
        $sentencia = $this->db->prepare('SELECT *, canciones.nombre AS cancion, artistas.nombre AS artista, canciones.id AS cancion_id, canciones.ranking AS ranking_cancion FROM canciones JOIN artistas ON canciones.id_artista = artistas.id');
        $sentencia->execute();
        $result = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getCancionPorId($id) {
        $sentencia = $this->db->prepare('SELECT *, canciones.nombre AS cancion, artistas.nombre AS artista, canciones.id AS cancion_id, canciones.ranking AS ranking_cancion FROM canciones JOIN artistas ON canciones.id_artista = artistas.id WHERE canciones.id = ?');
        $sentencia->execute(array($id));
        $result = $sentencia->fetch(PDO::FETCH_OBJ);
        //var_dump($result);die();
        return $result;
    }
}