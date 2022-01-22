<?php

class AdminUsuarios extends Base{
    private $model;

    function __construct(){
        $this->model = $this->model("AdminUsuariosModel");
    }

    public function caratula(){
        $sesion = new Sesion();
        if($sesion->getLogin()){
            $datas = $this->model->getUsers();
            $data = Caratula::caratula("Usuarios", false, true, true, "Admin", $datas);
            $this->view("adminUsuarioVista", $data);
        }else{
            header("Location:".RUTA."loginAdmin");
        }
    }

    public function registroUsuario(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $errores = array();
            $datas = array();
            $id = isset($_POST['id'])?$_POST['id']:"";
            $nombre = Valida::cadena(isset($_POST["nombre"])?$_POST["nombre"]:"");
            $email = Valida::cadena(isset($_POST["email"])?$_POST["email"]:"");
            $clave1 = Valida::cadena(isset($_POST["clave1"])?$_POST["clave1"]:"");
            $clave2 = Valida::cadena(isset($_POST["clave2"])?$_POST["clave2"]:"");
            $status = isset($_POST["status"])?$_POST["status"]:"";
            if(empty($nombre)){
                array_push($errores,"El nombre es requerido");
            }
            if(empty($email)){
                array_push($errores,"El email es requerido");
            }
            if(empty($clave1)){
                array_push($errores,"La clave de acceso es requerida");
            }
            if(empty($clave2)){
                array_push($errores,"Debe verificar la clave de acceso");
            }
            if($clave1!==$clave2){
                array_push($errores,"Las claves no coinciden");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errores, "El correo electronico no es valido");
            }
            $datas = [
                "id" => $id,
                "nombre" => $nombre,
                "email" => $email,
                "clave1" => $clave1,
                "clave2" => $clave2,
                "status" => $status
            ];
            if(empty($errores)){
                if(empty($id)){
                    $errores = $this->model->verificarEmail($datas);
                    if(empty($errores)){
                        if($this->model->insertarUsuarioAdmin($datas)){
                            $datas = $this->model->getUsers();
                            $data = Caratula::caratula("Usuarios", false, true, true, "Admin", $datas);
                            $dataDos = Caratula::caratulaSubtitulo($data, "Registro Usuario Administrativo");
                            $this->view("adminUsuarioVista",$dataDos);
                        }else{
                            $data = Caratula::caratula("Error al registrar el Usuario Administrativo", false, true, true, "Admin");
                            $dataDos = Caratula::caratulaError($data, "Lo sentimos, algo salio mal", "Error. Algo salio mal al momento de su registro", "alert-danger", "admin/inicioAdmin", "btn-primary", "Regresar");
                            $this->view("mensaje", $dataDos);
                        }
                    }else{
                        $data = Caratula::caratula("Registro Usuario Administrativo", false, true, true, "Admin", $datas, $errores);
                        $dataDos = Caratula::caratulaSubtitulo($data, "Registro Usuario Administrativo");
                        $this->view("adminUsuarios",$dataDos);
                    }
                }else{
                    $errores = $this->model->editarUsuario($datas);
                    if(empty($errores)){
                        $datas = $this->model->getUsers();
                        $data = Caratula::caratula("Perfil Administrativo", false, true, true, "Admin", $datas);
                        $this->view("adminUsuarioVista",$data);
                    }else{
                        $data = Caratula::caratula("Error al registrar el Usuario Administrativo", false, true, true, "Admin");
                        $dataDos = Caratula::caratulaError($data, "Lo sentimos, algo salio mal", "Error. Algo salio mal al momento de modificar", "alert-danger", "admin/inicioAdmin", "btn-primary", "Regresar");
                        $this->view("mensaje", $dataDos);
                    }
                }
            }else{
                $llaves = $this->model->getLlaves("admonStatus");
                if(empty($id)){
                    $data = Caratula::caratula("Registro Usuario Administrativo", false, true, true, "Admin", $datas, $errores);
                    $dataDos = Caratula::caratulaLlaves($data, $llaves, "Registro Usuario Administrativo");
                    $this->view("adminUsuarios",$dataDos);
                }else{
                    $data = Caratula::caratula("Modificar Usuario Administrativo", false, true, true, "Admin", $datas, $errores);
                    $dataDos = Caratula::caratulaLlaves($data, $llaves, "Modificar Usuario Administrativo");
                    $this->view("adminUsuarios",$dataDos);
                }
            }
        }else{
            $llaves = $this->model->getLlaves("admonStatus");
            $data = Caratula::caratula("Registro Usuario Administrativo", false, true, true, "Admin");
            $dataDos = Caratula::caratulaLlaves($data, $llaves, "Registro Usuario Administrativo");
            $this->view("adminUsuarios",$dataDos);
        }
    }

    public function editarUsuario($id=""){
        $status = $this->model->getLlaves("admonStatus");
        $datas = $this->model->getUsersID($id);
        $data = Caratula::caratula("Modificar Usuario Administrativo", false, true, true, "Admin", $datas);
        $dataDos = Caratula::caratulaLlaves($data, $status, "Modificar Usuario Administrativo");
        $this->view("adminUsuarios", $dataDos);
    }

    public function borrarUsuario($id=""){
        $status = $this->model->getLlaves("admonStatus");
        $datas = $this->model->getUsersID($id);
        $data = Caratula::caratula("Borrar Usuario Administrativo", false, true, true, "Admin", $datas);
        $dataDos = Caratula::caratulaStatus($data, $status, true, "Borrar Usuario Administrativo");
        $this->view("adminUsuarios", $dataDos);
    }

    public function borrarLogico($id=""){
        if(!empty($id)){
            if(empty($this->model->borrarLogico($id))){
                $datas = $this->model->getUsers();
                $data = Caratula::caratula("Usuarios", false, true, true, "Admin", $datas);
                $this->view("adminUsuarioVista",$data);
            }
        }
    }
}
?>