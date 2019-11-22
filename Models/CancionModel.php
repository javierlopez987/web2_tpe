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

    public function getByID($id) {
        $query = $this->db->prepare($this->query->selectByID($this->tabla)); 
        $query->execute(array($id));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($values) {
        $sentencia = $this->db->prepare('INSERT INTO canciones (nombre, duracion, genero, album, id_artista, ranking) VALUES (?, ?, ?, ?, ?, ?)');
        $sentencia->execute($values);
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','duracion','genero','album','id_artista','ranking')));
        $sentencia->execute($values);
    }

    public function delete($id) {
        $sentencia = $this->db->prepare('DELETE FROM canciones WHERE id=?');
        $sentencia->execute(array($id));
    }
}