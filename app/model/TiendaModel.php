<?php

class TiendaModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }
}
?>