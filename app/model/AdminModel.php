<?php

class AdminModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    function verificaClave($datas){
        $errores = array();
        $clave = hash_hmac('sha256', $datas["clave"], "mimamamemima");
        $sql = "SELECT id, clave, status, baja FROM admon WHERE email='".$datas["email"]."'";
        $datas = $this->db->query($sql);
        if(empty($datas)){
            array_push($errores,"no existe el Email en el sistema");
        }else if($clave!=$datas["clave"]){
            array_push($errores,"contraseña no valida");
        }else if(count($datas)>4){
            array_push($errores,"el email esta duplicado en el sistema");
        }else if($datas["status"]==0){
            array_push($errores,"ese Usuario Administrativo esta desactivado");
        }else if($datas["baja"]==1){
            array_push($errores,"el Usuario Administrativo esta dado de baja");
        }else{
            $sql = "UPDATE admon set login_dt=NOW() WHERE id=".$datas['id'];
            if(!$this->db->queryNoSelect($sql)){
                array_push($errores,"algo salio mal");
            }
        }
        return $errores;
    }
}
?>