<?php
require_once("DB/Database.php");

class UserModel {
    private $db;

    function __construct() {
        $this->db = Database::getInstance()->getConnection();
        $this->query = new QuerySQL();
        $this->tabla = "usuarios";
    }

    public function getPassword($user){
        $query = $this->db->prepare($this->query->selectByColumn($this->tabla,"user"));
        $query->execute(array($user));
        $password = $sentencia->fetch(PDO::FETCH_OBJ);
        return $password;
    }

    public function getByUser($value) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE user = ?'); 
        $query->execute(array($value));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($values) {
        $query = $this->db->prepare("INSERT INTO usuarios (user, password) VALUES (?, ?)");
        $query->execute($values);
    }

    public function update($values) {
        return null;
    }
}