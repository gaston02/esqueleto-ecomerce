<?php

class Sesion{
    private $login = false;
    private $usuario;

    function __construct(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->usuario = $_SESSION["usuario"];
            $this->login = true;
            if(isset($_SESSION["usuario"]["id"])){
                $idUsuario = $_SESSION["usuario"]["id"];
                if($this->cantidadProducto($idUsuario)!=null){
                    $_SESSION["carro"] = $this->cantidadProducto($idUsuario);
                }else{
                    $_SESSION["carro"] = 0;
                }
            }
        }else{
            unset($this->usuario);
            $this->login = false;
        }
    }

    public function iniciar($usuario){
        if($usuario){
            $this->usuario = $_SESSION["usuario"] = $usuario;
            $this->login = true;
        }else{
            $this->login = false;
        }        
    }

    public function finalizarSesion(){
        unset($_SESSION["usuario"]);
        unset($this->usuario);
        session_destroy();
        $this->login = false;
    }

    public function getLogin(){
        return $this->login;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function cantidadProducto($idUsuario){
        $db = new MySQLdb();
        $cantidad = 0;
        $sql = "SELECT SUM(c.cantidad) as cantidad FROM carrito as c, productos as p WHERE c.idUsuario=".$idUsuario." 
        AND c.idProducto=p.id AND c.estado=0";
        $datas = $db->query($sql);
        if($datas!=null){
            $cantidad = $datas["cantidad"];
        }
        $db->cerrar();
        return $cantidad;
    }
}
?>