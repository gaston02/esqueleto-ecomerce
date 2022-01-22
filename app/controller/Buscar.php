<?php

class Buscar extends Base{
    private $model;

    function __construct(){
        $this->model = $this->model("BuscarModel");
    }

    public function producto(){
        $datas = array();
        $buscar = Valida::cadena(isset($_POST["buscar"])?$_POST["buscar"]:"");
        if(!empty($buscar)){
            $datas = $this->model->getProductosBuscar($buscar);
            if(!empty($datas)){
                $data = Caratula::caratula("Productos Buscados", true, false, false, "Tienda Virtual", $datas);
                $this->view("productosBuscar", $data);
            }else{
                $data = Caratula::caratula("Productos Buscados", true, false, false, "Tienda Virtual", $datas);
                $this->view("productosBuscar", $data);
            }
        }else{
            $data = Caratula::caratula("Productos Buscados", true, false, false, "Tienda Virtual", $datas);
            $this->view("productosBuscar", $data);
        }
    }
}
?>