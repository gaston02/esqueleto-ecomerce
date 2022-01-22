<?php

class TipoProducto extends Base{
    private $model;

    function __construct(){
        $this->model = $this->model("TipoProductoModel");
    }

    function caratula($tipo){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            if($tipo=="cursos"){
                $datas = $this->getCursos();
                $data = Caratula::caratula("Cursos en linea", true, false, false, "Tienda Virtual", $datas);
                $dataDos = Caratula::caratulaActivo($data, "cursos", "Cursos en linea");
                $this->view("tipoProducto", $dataDos);
            }else if($tipo=="libros"){
                $datas = $this->getLibros();
                $data = Caratula::caratula("Libros", true, false, false, "Tienda Virtual", $datas);
                $dataDos = Caratula::caratulaActivo($data, "libros", "Libros");
                $this->view("tipoProducto", $dataDos);
            }
        }else{
            header("Location:".RUTA);
        }
    }

    function getCursos(){ 
        return $this->model->getCursos();
    }

    function getLibros(){
        return $this->model->getLibros();
    }
}
?>