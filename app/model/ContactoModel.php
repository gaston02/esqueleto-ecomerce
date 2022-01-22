<?php

class ContactoModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    function enviarCorreo($datas){
        $nombre = $datas["nombre"];
        $email = $datas["email"];
        $telefono = $datas["telefono"];
        $mensaje = $datas["mensaje"];
        $msg = $nombre;
        $msg.=" ".$email;
        $msg.=" ".$telefono;
        $msg.=" ".$mensaje;
        $headers = "MIME-Version: 1.0\r\n";
        $headers.= "Content-Type: text/html; charset=UTF-8\r\n";
        $headers.= "From: ".$email."\r\n";
        $headers.= "Reply-To: ".$email."\r\n";
        $asunto = "Contacto: ".$nombre;

        return @mail("tiendavirtual@gmail.com", $asunto, $msg, $headers);
    }
}
?>