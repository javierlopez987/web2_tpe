<?php 
require_once("Models/Modelo.php");

class ArtistaModel extends Modelo
{
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = 'artistas';
    }

    public function create($values) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute($values);
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute($values);
    }
}