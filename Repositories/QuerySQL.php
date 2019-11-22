<?php
class QuerySQL
{
    public function __construct() {

    }

    public function selectAll($tabla) {
        return 'SELECT * FROM '. $tabla;
    }

    public function insert($tabla, $columns) {
        $sql = "INSERT INTO ";
        $sql .= $tabla . "(";
        for($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i];
            if($i < count($columns) - 1) {
                $sql .= ",";
            }
        }
        $sql .= ") VALUES (";
        for($i = 0; $i < count($columns); $i++) {
            $sql .= "?";
            if($i < count($columns) - 1) {
                $sql .= ",";
            }
        }
        $sql .=")";
        return $sql;
    }

    public function update($tabla, $columns) {
        $sql = "UPDATE ";
        $sql .= $tabla . " SET ";
        for($i = 0; $i < count($columns); $i++) {
            $sql .= $columns[$i] . " = ?";
            if($i < count($columns) - 1) {
                $sql .= ", ";
            }
        }
        $sql .= " WHERE id=?";
        return $sql;
    }
    
    public function selectByID($tabla) {
        $sql = 'SELECT * FROM '. $tabla . ' WHERE id = ?';
        return $sql;
    }

    public function selectByColumn($tabla,$column) {
        $query = 'SELECT * FROM '. $tabla . ' WHERE ' . $column . ' = ?';
        return $query;
    }
}
