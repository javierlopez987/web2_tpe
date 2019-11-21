<?php
require_once("Models/Modelo.php");

class ConsultaModel extends Modelo {
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getCanciones($artista) {
        $sentencia = $this->db->prepare('SELECT * FROM canciones JOIN artistas ON canciones.id_artista = artistas.id WHERE artistas.id = ?');
        $sentencia->execute(array($artista));
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','duracion','genero','album','id_artista','ranking')));
        $sentencia->execute($values);
    }
}