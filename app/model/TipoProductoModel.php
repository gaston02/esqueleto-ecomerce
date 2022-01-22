<?php

class TipoProductoModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    public function getCursos(){
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=1";
        $datas = $this->db->querySelect($sql);
        return $datas;
    }

    public function getLibros(){
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=2";
        $datas = $this->db->querySelect($sql);
        return $datas;
    }
}
?>