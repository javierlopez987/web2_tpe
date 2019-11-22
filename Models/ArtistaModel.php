<?php 
require_once("DB/Database.php");
require_once("Repositories/QuerySQL.php");

class ArtistaModel  {
    private $db;
    private $query;
    private $tabla;

    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = 'artistas';
    }

    public function get(){
        $query = $this->db->prepare($this->query->selectAll($this->tabla)); 
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
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute($values);
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute($values);
    }

    public function delete($id) {
        $sentencia = $this->db->prepare('DELETE FROM artistas WHERE id=?');
        $sentencia->execute(array($id));
    }

    public function setImg($path, $id) {
        $sentencia = $this->db->prepare('UPDATE artistas SET imagen = ? WHERE id = ?');
        $sentencia->execute(array($path, $id));
    }
}