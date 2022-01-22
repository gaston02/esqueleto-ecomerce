<?php

class BuscarModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    function getProductosBuscar($buscar){
        $sql = "SELECT * FROM productos WHERE ";
        $sql.= "(nombre LIKE '%".$buscar."%' OR ";
        $sql.= "descripcion LIKE '%".$buscar."%' OR ";
        $sql.= "precio LIKE '%".$buscar."%' OR ";
        $sql.= "autor LIKE '%".$buscar."%' OR ";
        $sql.= "editorial LIKE '%".$buscar."%' OR ";
        $sql.= "publico LIKE '%".$buscar."%') AND baja=0";
        return $this->db->querySelect($sql);
    }
}
?>