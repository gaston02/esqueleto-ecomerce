<?php

class Carro extends Base{
    private $model;

    function __construct(){
        $this->model = $this->model("CarroModel");
    }

    function caratula($errores=[]){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            $idUsuario = $_SESSION["usuario"]["id"];
            $datas = $this->model->getCarro($idUsuario);
            $data = Caratula::caratula("Carro de compras", true, false, false, "Tienda Virtual", $datas, $errores);
            $dataDos = Caratula::caratulaId($data, $idUsuario);
            $this->view("carro", $dataDos);
        }else{
            header("Location:".RUTA);
        }
    }

    public function agregarProducto($id, $idUsuario){
        $errores = array();
        if($this->model->verificarProducto($id, $idUsuario)==false){
            if($this->model->agregarProducto($id, $idUsuario)==false){
                array_push($errores,"algo salio mal");
            }
        }
        $this->caratula($errores);
    }

    public function actualizar() {
        $errores = array();
        if(isset($_POST["num"]) && isset($_POST["idUsuario"])){
            $num = $_POST["num"];
            $idUsuario = $_POST["idUsuario"];
            for($i=0;$i<$num;$i++){
                $idProducto = $_POST["i".$i];
                $cantidad = $_POST["c".$i];
                if(!$this->model->actualizar($idUsuario, $idProducto, $cantidad)){
                    array_push($errores, "Error al recalcular la compra en el producto: ".$idProducto);
                }
            }
            $this->caratula($errores);
        }
    }

    public function borrar($idProducto, $idUsuario){
        $errores = array();
        if(!$this->model->borrar($idProducto, $idUsuario)){
            array_push($errores, "Error al borrar el producto");
        }
        $this->caratula($errores);
    }

    public function checkout(){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            $datas = $_SESSION["usuario"];
            $data = Caratula::caratula("Datos de envio", true, false, false, "Tienda Virtual", $datas);
            $this->view("datosEnvio", $data);
        }else{
            $data = Caratula::caratula("Checkout", true, false, false, "Tienda Virtual");
            $this->view("checkout", $data);
        }
    }

    public function formaPago(){
        $data = Caratula::caratula("Forma de pago", true, false, false, "Tienda Virtual");
        $this->view("formaPago", $data);
    }

    public function verificar(){
        $sesion = new Sesion();
        $datas = $_SESSION["usuario"];
        $pago = isset($_POST["pago"])?$_POST["pago"] :"";
        $idUsuario = $_SESSION["usuario"]["id"];
        $carro = $this->model->getCarro($idUsuario);
        $data = Caratula::caratula("Verificar datos", true, false, false, "Tienda Virtual", $datas);
        $dataDos = Caratula::caratulaCarro($data, $pago, $carro);
        $this->view("verificar", $dataDos);
    }

    public function gracias(){
        $sesion = new Sesion();
        $datas = $_SESSION["usuario"];
        $idUsuario = $_SESSION["usuario"]["id"];
        if($this->model->cierraCarro($idUsuario, 1)){
            $data = $data = Caratula::caratula("Gracias por su compra", true, false, false, "Tienda Virtual", $datas);
            $this->view("gracias", $data);
        }else{
            $data = Caratula::caratula("Error en el proceso de pago", true, false, false, "Tienda Virtual");
            $dataDos = Caratula::caratulaError($data, "Lo sentimos, algo salio mal", "Error. Existio un problema al momento de pagar. Pruebe mas tarde", "alert-danger", "tienda", "btn-primary", "Regresar");
            $this->view("mensaje", $dataDos);
        }
    }

    public function ventas(){
        $datas = $this->model->ventas();
        $data = Caratula::caratula("Gestor de ventas", false, true, true, "Admin", $datas);
        $this->view("ventas", $data);
    }

    public function detalle($fecha, $idUsuario){
        $datas = $this->model->detalle($fecha, $idUsuario);
        $data = Caratula::caratula("Detalle Ventas por dia", false, true, true, "Admin", $datas);
        $this->view("detalle", $data);
    }

    public function grafica(){
        $datas = $this->model->ventasPorDia();
        $data = Caratula::caratula("Grafica de ventas por dia", false, true, true, "Admin", $datas);
        $this->view("graficaVentas", $data);
    }
}
?>