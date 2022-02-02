<?php

class ProductosAdmin extends Base{
    private $model;

    function __construct(){
        $this->model = $this->model("ProductosModel");
    }

    public function caratula(){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            $datas = $this->model->getProductos();
            $tipoProducto = $this->model->getLlaves("tipoProducto");
            $data = Caratula::caratula("Productos", false, true, true, "Admin", $datas);
            $dataDos = Caratula::caratulaTipoProducto($data, $tipoProducto);
            $this->view("productos", $dataDos);
        }else{
           header("Location:".RUTA."admin");
        }
    }

    public function insertarProducto(){
        $datas = array();
        $errores = array();
        $tipoProducto = $this->model->getLlaves("tipoProducto");
        $status = $this->model->getLlaves("admonStatus");
        $catalogo = $this->model->getCatalogos();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = isset($_POST["id"])?$_POST["id"]:"";
            $nombre = Valida::cadena(isset($_POST["nombre"])?$_POST["nombre"]:"");
            $tipo = isset($_POST["tipoProducto"])?$_POST["tipoProducto"]:"";
            $descripcion = Valida::cadena(isset($_POST["content"])?$_POST["content"]:"");

            //libro
            $autor = Valida::cadena(isset($_POST["autor"])?$_POST["autor"]:"");
            $editorial = Valida::cadena(isset($_POST["editorial"])?$_POST["editorial"]:"");
            $pagina = Valida::validaNumeros(isset($_POST["pagina"])?$_POST["pagina"]:0);

            //curso
            $publico = Valida::cadena(isset($_POST["publico"])?$_POST["publico"]:"");
            $objetivo = Valida::cadena(isset($_POST["objetivo"])?$_POST["objetivo"]:"");
            $necesario = Valida::cadena(isset($_POST["necesario"])?$_POST["necesario"]:"");

            $precio = Valida::validaNumeros(isset($_POST["precio"])?$_POST["precio"]:"0");
            $descuento = Valida::validaNumeros(isset($_POST["descuento"])?$_POST["descuento"]:"0");
            $envio = Valida::validaNumeros(isset($_POST["envio"])?$_POST["envio"]:"0");
            $imagen = $_FILES['imagen']['name'];
            if(!empty($imagen)){
                $imagen = Valida::archivo($imagen);
                $imagen.= strtolower($imagen.".jpg");
            }
            $fecha = isset($_POST["fecha"])?$_POST["fecha"]:"";
            $relacion1 = isset($_POST["relacion1"])?$_POST["relacion1"]:"";
            $relacion2 = isset($_POST["relacion2"])?$_POST["relacion2"]:"";
            $relacion3 = isset($_POST["relacion3"])?$_POST["relacion3"]:"";
            $masVendido = isset($_POST["masVendido"])?$_POST["masVendido"]:"";
            $nuevos = isset($_POST["nuevos"])?$_POST["nuevos"]:"";
            $masVendido = ($masVendido=="")?"0":"1";
            $nuevos = ($nuevos=="")?"0":"1";
            $status = isset($_POST["status"])?$_POST["status"]:"";

            if(empty($nombre)){
                array_push($errores,"El nombre es requerido");
            }
            if(!empty($precio)){
                if(!is_numeric($precio)){
                    array_push($errores,"El precio debe ser un numero");
                }
            }else{
                array_push($errores,"El precio es requerido");
            }
            if(!empty($descuento)){
                if(!is_numeric($descuento)){
                    array_push($errores,"El descuento debe ser un numero");
                }
            }else{
                $descuento = "0";
            }
            if(!empty($envio)){
                if(!is_numeric($envio)){
                    array_push($errores,"El envio debe ser un numero");
                }
            }else{
                $envio = "0";
            }
            if($precio < $descuento){
                array_push($errores,"El precio no puede ser menor que el descuento");
            }
            if(!empty($imagen)){
                if(Valida::archivoImagen($_FILES['imagen']['tmp_name'])){
                    $imagen = Valida::archivo(html_entity_decode($nombre));
                    $imagen = strtolower($imagen.".jpg");
                    if(is_uploaded_file($_FILES['imagen']['tmp_name'])){
                        if(copy($_FILES['imagen']['tmp_name'],"img/".$imagen)){
                            Valida::esImagen($imagen,240);
                        }else{
                            array_push($errores, "nombre de imagen no valido (asegurese de ingresar un nombre de producto valido)");
                        }
                    }else{
                        array_push($errores,"Error al subir la imagen");
                    }
                }else{
                    array_push($errores,"Imagen no valida");
                }
            }else{
                array_push($errores,"la imagen es requerida");
            }
            if(!empty($fecha)){
                if(Valida::fecha($fecha)){
                    array_push($errores,"La fecha no es valida (AAAA-MM-DD)");
                }else if(Valida::fechaDia($fecha)){
                    array_push($errores,"La fecha de creacion no puede ser mayor a la del dia de hoy");
                }
            }
            if($tipo == 1){
                $nada = "";
            }else if($tipo == 2){
                if(empty($autor)){
                    array_push($errores,"El autor es requerido");
                }
                if(!empty($pagina)){
                    if(!is_numeric($pagina)){
                        array_push($errores,"Las paginas deben ser un numero");
                    }
                }
            }else{
                array_push($errores,"Debe escoger un tipo de producto");
            }
            if($relacion1=="void"){
                $relacion1 = 0;
            }
            if($relacion2=="void"){
                $relacion2 = 0;
            }
            if($relacion3=="void"){
                $relacion3 = 0;
            }
            if($status==1){
                $nada = "";
            }else if($status==2){
                $nada = "";
            }else{
                array_push($errores,"Debe escoger el status del producto");
            }
            if(empty($pagina)){
                $pagina = 0;
            }

            $datas = [
                "id" => $id,
                "nombre" => $nombre,
                "tipo" => $tipo,
                "descripcion" => $descripcion,
                "autor" => $autor,
                "editorial" => $editorial,
                "pagina" => $pagina,
                "publico" => $publico,
                "objetivo" => $objetivo,
                "necesario" => $necesario,
                "precio" => $precio,
                "descuento" => $descuento,
                "envio" => $envio,
                "imagen" => $imagen,
                "fecha" => $fecha,
                "relacion1" => $relacion1,
                "relacion2" => $relacion2,
                "relacion3" => $relacion3,
                "status" => $status,
                "masVendido" => $masVendido,
                "nuevos" => $nuevos
            ];

            if(empty($errores)){
                if(empty($id)){
                    if($this->model->insertarProducto($datas)){
                        header("Location:".RUTA."productosAdmin");
                    }else{
                        $data = Caratula::caratula("Error al registrar el Producto", false, true, true, "Admin");
                        $dataDos = Caratula::caratulaError($data, "Lo sentimos, algo salio mal", "Error. Algo salio mal al momento de su registro", "alert-danger", "productosAdmin", "btn-primary", "Regresar");
                        $this->view("mensaje", $dataDos);
                    }
                }else{
                    if($this->model->editarProducto($datas)){
                        header("Location:".RUTA."productosAdmin");
                    }else{
                        $data = Caratula::caratula("Eror al modificar el Producto", false, true, true, "Admin");
                        $dataDos = Caratula::caratulaError($data, "Lo sentimos, algo salio mal", "Error. Algo salio mal al momento de la modificacion", "alert-danger", "productosAdmin", "btn-primary", "Regresar");
                        $this->view("mensaje", $dataDos);
                    }
                }        
            }else{
                $tipoProducto = $this->model->getLlaves("tipoProducto");
                $status = $this->model->getLlaves("admonStatus");
                $catalogo = $this->model->getCatalogos();
                $data = Caratula::caratula("Registro Producto", false, true, true, "Admin", $datas, $errores);
                $dataDos = Caratula::caratulaConTodo($data, $tipoProducto, $status, $catalogo, "Registro Producto");
                $this->view("registroProducto", $dataDos);
            }
        }else{
            $data = Caratula::caratula("Registro Producto", false, true, true, "Admin", $datas);
            $dataDos = Caratula::caratulaConTodo($data, $tipoProducto, $status, $catalogo, "Registro Producto"); 
            $this->view("registroProducto", $dataDos);
        }
    }

    public function borrarProducto($id=""){
        $tipoProducto = $this->model->getLlaves("tipoProducto");
        $status = $this->model->getLlaves("admonStatus");
        $catalogo = $this->model->getCatalogos();
        $datas = $this->model->getProductosID($id);
        $data = Caratula::caratula("Borrar Producto", false, true, true, "Admin", $datas);
        $dataDos = Caratula::caratulaConTodoMas($data, $tipoProducto, $status, $catalogo, "Borrar Producto", true);
        $this->view("registroProducto", $dataDos);
    }

    public function borrarLogico($id=""){
        if(!empty($id)){
            if($this->model->borrarLogico($id)){
                header("Location:".RUTA."productosAdmin");
            }
        }
    }

    public function editarProducto($id=""){
        $tipoProducto = $this->model->getLlaves("tipoProducto");
        $status = $this->model->getLlaves("admonStatus");
        $catalogo = $this->model->getCatalogos();
        $datas = $this->model->getProductosID($id);
        $data = Caratula::caratula("Modificar Producto", false, true, true, "Admin", $datas);
        $dataDos = Caratula::caratulaConTodo($data, $tipoProducto, $status, $catalogo, "Modificar Producto");
        $this->view("registroProducto", $dataDos);
    }

    public function getMasVendidos(){
        return $this->model->getMasVendidos();
    }

    public function getNuevos(){
        return $this->model->getNuevos();
    }

    public function producto($id="", $regresa=""){
        $datas = $this->model->getProductosID($id);
        $sesion = new Sesion();
        $idUsuario = $_SESSION["usuario"]["id"];
        $data = Caratula::caratula("Detalle Producto", true, false, false, "Tienda Virtual", $datas);
        $dataDos = Caratula::caratulaIdMas($data, $idUsuario, $datas["nombre"], $regresa);
        $this->view("producto", $dataDos);
    }
}
?>