<?php

class adminUsuariosModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    function insertarUsuarioAdmin($datas){
        $clave = hash_hmac('sha256', $datas["clave1"], "mimamamemima");
        $fechaVacia = "0000-00-00 00:00:00";
        $sql = "INSERT INTO admon VALUES (0,";
        $sql.= "'".$datas['nombre']."', ";
        $sql.= "'".$datas['email']."', ";
        $sql.= "'".$clave."', ";
        $sql.= "1, ";
        $sql.= "0, ";
        $sql.= "'".$fechaVacia."', ";
        $sql.= "'".$fechaVacia."', ";
        $sql.= "'".$fechaVacia."', ";
        $sql.= "(NOW()))";
        return $this->db->queryNoSelect($sql);
    }

    public function getUsers(){
        $sql = "SELECT * FROM admon WHERE baja=0";
        $datas = $this->db->querySelect($sql);
        return $datas;
    }

    public function getUsersID($id){
        $sql = "SELECT * FROM admon WHERE id=".$id;
        $datas = $this->db->query($sql);
        return $datas;
    }

    public function getLlaves($tipo){
        $sql = "SELECT * FROM llaves WHERE tipo='".$tipo. "' ORDER BY indice DESC";
        $datas = $this->db->querySelect($sql);
        return $datas;
    }

    public function editarUsuario($datas){
        $errores = array();
        $sql = "UPDATE admon SET ";
        $sql.= "nombre='".$datas["nombre"]."', ";
        $sql.= "email='".$datas["email"]."', ";
        $sql.= "modificado_dt=(NOW()), ";
        $sql.= "status=".$datas["status"];
        if(!empty($datas['clave1'])&&!empty($datas['clave2'])){
            $clave = hash_hmac('sha256', $datas["clave1"], "mimamamemima");
            $sql.= ", clave ='".$clave."'";
        }
        $sql.= " WHERE id=".$datas["id"];
        if(!$this->db->queryNoSelect($sql)){
            array_push($errores, "algo salio mal");
        }
        return $errores;
    }

    public function borrarLogico($id){
        $errores = array();
        $sql = "UPDATE admon SET baja=1, status=1, baja_dt=(NOW()) WHERE id=".$id;
        if(!$this->db->queryNoSelect($sql)){
            array_push($errores, "algo salio mal");
        }
        return $errores;
    }

    public function verificarEmail($datas){
        $errores = array();
        $sql = "SELECT * FROM admon WHERE email='".$datas["email"]."'";
        $datas = $this->db->query($sql);
        if(!empty($datas)){
            array_push($errores,"el e-mail ya existe en el sistema");
        }
        return $errores;
    }
}
?>