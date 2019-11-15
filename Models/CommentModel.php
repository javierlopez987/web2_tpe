<?php 
require_once("Models/Modelo.php");

class CommentModel extends Modelo
{
    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = 'comentarios';
    }

    public function create($values) {
        $sentencia = $this->db->prepare($this->query->insert($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute($values);
    }

    public function update($values) {
        $sentencia = $this->db->prepare($this->query->update($this->tabla, array('nombre','apellido','fechanac','ranking')));
        $sentencia->execute($values);
    }

    public function getCommentsbyCancion($id_cancion){
        //$query = $this->db->prepare('SELECT comentarios.*, canciones.nombre as cancion FROM comentarios, canciones WHERE comentarios.fk_id_cancion = canciones.id AND canciones.id = ?'); 
        $query = $this->db->prepare('SELECT comentarios.*, canciones.nombre as cancion FROM comentarios JOIN canciones ON comentarios.fk_id_cancion = canciones.id WHERE canciones.id = ?'); 
        $query->execute(array($id_cancion));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}