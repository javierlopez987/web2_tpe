<?php 
require_once("DB/Database.php");

class CommentModel {
    private $db;

    public function __construct () {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function getCommentsbyCancion($id_cancion){
        //$query = $this->db->prepare('SELECT comentarios.*, canciones.nombre as cancion FROM comentarios, canciones WHERE comentarios.fk_id_cancion = canciones.id AND canciones.id = ?'); 
        $query = $this->db->prepare('SELECT comentarios.*, canciones.nombre as cancion, usuarios.user as usuario 
                                    FROM comentarios 
                                    JOIN usuarios ON comentarios.fk_id_usuario = usuarios.id 
                                    JOIN canciones ON comentarios.fk_id_cancion = canciones.id 
                                    WHERE canciones.id = ?'); 
        $query->execute(array($id_cancion));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($values) {
        $sentencia = $this->db->prepare('INSERT INTO comentarios (mensaje, valoracion, fk_id_cancion, fk_id_usuario) VALUES (?, ?, ?, ?)');
        $sentencia->execute($values);
        return $values[2];
    }

    public function deleteComment($id) {
        $sentencia = $this->db->prepare('DELETE FROM comentarios WHERE id=?');
        $sentencia->execute(array($id));
    }

    public function update($values) {
        $sentencia = $this->db->prepare('UPDATE comentarios SET mensaje = ?, valoracion = ?, fk_id_cancion = ?, fk_id_usuario = ? WHERE id = ?');
        $sentencia->execute($values);
    }

    public function getComment($id) {
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id = ?'); 
        $query->execute(array($id));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

}