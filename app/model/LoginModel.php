<?php

class LoginModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    function insertar($datas){
        $respuesta = false;
        if ($this->validaCorreo($datas["email"])) {
            $clave = hash_hmac("sha512", $datas["clave1"], "mimamamemima");
            $sql = "INSERT INTO usuarios VALUES(0,";
            $sql.= "'".$datas["nombre"]."', ";
            $sql.= "'".$datas["apellidoPaterno"]."', ";
            $sql.= "'".$datas["apellidoMaterno"]."', ";
            $sql.= "'".$datas["email"]."', ";
            $sql.= "'".$datas["direccion"]."', ";
            $sql.= "'".$clave."')";
            $respuesta = $this->db->queryNoSelect($sql);
        } 
        return $respuesta;
    }

    function validaCorreo($email){
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $datas = $this->db->query($sql);
        return (count($datas)==0)?true:false;
    }

    function getCorreo($email){
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $datas = $this->db->query($sql);
        return $datas;
    }

    function enviarCorreo($email){
        $datas = $this->getCorreo($email);
        $id = $datas["id"];
        $nombre = $datas["nombre"]." ".$datas["apellidoPaterno"];
        $msg = $nombre." entra al siguiente enlace para recuperar tu contraseña en la tienda virtual<br>";
        $msg.="<a href='".RUTA."/login/cambiaclave/".$id."'>cambia tu clave de acceso</a>";
        $headers = "MIME-Version: 1.0\r\n";
        $headers.= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers.= "From: ecomerce\r\n";
        $headers.= "Reply-To: tiendavirtual@gmail.com\r\n";
        $asunto = "Cambiar clave de acceso";

        return @mail($email, $asunto, $msg, $headers);
    }

    function cambiarClave($id, $clave){
        $respuesta = false;
        $clave = hash_hmac("sha512", $clave, "mimamamemima");
        $sql = "UPDATE usuarios SET ";
        $sql.= "clave ='".$clave."' ";
        $sql.= "WHERE id=".$id;
        $respuesta = $this->db->queryNoSelect($sql); 
        return $respuesta;
    }

    function verificar($email, $clave){
        $errores = array();
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $clave = hash_hmac("sha512", $clave, "mimamamemima");
        $clave = substr($clave, 0,200);
        $datas = $this->db->query($sql);
        if(empty($datas)){
            array_push($errores,"no existe el Email");
        }else if($clave!=$datas["clave"]){
            array_push($errores,"contraseña no valida");
        }
        return $errores;
    }
}
?>