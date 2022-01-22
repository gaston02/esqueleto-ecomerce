<?php

class Tienda extends Base{
    private $model;

    function __construct(){
        $this->model = $this->model("TiendaModel");
    }

    function caratula(){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            $datas = $this->getMasVendidos();
            $nuevos = $this->getNuevos();
            $data = Caratula::caratula("Tienda Virtual", true, false, false, "Tienda Virtual", $datas);
            $dataDos = Caratula::caratulaNuevos($data, $nuevos);
            $this->view("tienda", $dataDos);
        }else{
            header("Location:".RUTA);
        }
    }

    function logout() {
        session_start();
        if(isset($_SESSION["usuario"])){
            $sesion = new Sesion();
            $sesion->finalizarSesion();
        }
        header("Location:".RUTA);
    }

    function getMasVendidos(){
        $datas = array();
        require_once("ProductosAdmin.php");
        $productos = new ProductosAdmin();
        $datas = $productos->getMasVendidos();
        unset($productos);
        return $datas;
    }

    function getNuevos(){
        $datas = array();
        require_once("ProductosAdmin.php");
        $productos = new ProductosAdmin();
        $datas = $productos->getNuevos();
        unset($productos);
        return $datas;
    }
}
?>