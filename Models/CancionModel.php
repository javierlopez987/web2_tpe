<?php 
require_once("Models/Modelo.php");

class CancionModel extends Modelo 
{
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "canciones";
    }

    public function create($values) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','duracion','genero','album','id_artista','ranking')));
        $sentencia->execute($values);
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','duracion','genero','album','id_artista','ranking')));
        $sentencia->execute($values);
    }
}