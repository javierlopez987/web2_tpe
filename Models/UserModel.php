<?php
require_once('./Models/Modelo.php');

class UserModel extends Modelo {

    function __construct(){
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

    public function getUser($value) {
        $query = $this->db->prepare($this->query->selectByColumn($this->tabla,"user")); 
        $query->execute(array($value));
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($values) {
        $query = $this->db->prepare($this->query->insert($this->tabla, array("user", "password")));
        $query->execute($values);
    }

    public function update($values) {
        return null;
    }
}