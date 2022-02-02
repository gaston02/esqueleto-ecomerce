<?php

class ProductosModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    function insertarProducto($datas){
        $sql = "INSERT INTO productos VALUES(0,";
        $sql.= "'".$datas['tipo']."', ";
        $sql.= "'".$datas['nombre']."', ";
        $sql.= "'".$datas['descripcion']."', ";
        $sql.= $datas['precio'].", ";
        $sql.= $datas['descuento'].", ";
        $sql.= $datas['envio'].", ";
        $sql.= "'".$datas['imagen']."', ";
        $sql.= "'".$datas['fecha']."', ";
        $sql.= "'".$datas['relacion1']."', ";
        $sql.= "'".$datas['relacion2']."', ";
        $sql.= "'".$datas['relacion3']."', ";
        $sql.= "'".$datas['masVendido']."', ";
        $sql.= "'".$datas['nuevos']."', ";
        $sql.= "'".$datas['status']."', ";
        $sql.= "0, ";
        $sql.= "(NOW()), ";
        $sql.= "'', ";
        $sql.= "'', ";
        $sql.= "'".$datas['autor']."', ";
        $sql.= "'".$datas['editorial']."', ";
        $sql.= $datas['pagina'].", ";
        $sql.= "'".$datas['publico']."', ";
        $sql.= "'".$datas['objetivo']."', ";
        $sql.= "'".$datas['necesario']."')";
        return $this->db->queryNoSelect($sql);
    }

    public function getProductos(){
        $sql = "SELECT * FROM productos WHERE baja=0";
        return $this->db->querySelect($sql);
    }

    public function getProductosID($id){
        $sql = "SELECT * FROM productos WHERE id=".$id; 
        return $this->db->query($sql);
    }

    public function getLlaves($tipo){
        $order = "";
        if($tipo=="admonStatus"){
            $order = "DESC";
        }else if($tipo=="tipoProducto"){
            $order = "ASC";
        }
        $sql = "SELECT * FROM llaves WHERE tipo='".$tipo. "' ORDER BY indice ".$order." ";
        return $this->db->querySelect($sql);
    }

    public function getCatalogos(){
        $sql = "SELECT id, nombre, tipo FROM productos WHERE baja=0 AND status!=1 ORDER BY tipo, nombre";
        return $this->db->querySelect($sql);
    }

    public function editarProducto($datas){
        $salida = false;
        if(!empty($datas["id"])){
            $sql = "UPDATE productos SET ";
            $sql.= "tipo='".$datas['tipo']."', ";
            $sql.= "nombre='".$datas['nombre']."', ";
            $sql.= "descripcion='".$datas['descripcion']."', ";
            $sql.= "precio=".$datas['precio'].", ";
            $sql.= "descuento=".$datas['descuento'].", ";
            $sql.= "envio=".$datas['envio'].", ";
            $sql.= "imagen='".$datas['imagen']."', ";
            $sql.= "fecha='".$datas['fecha']."', ";
            $sql.= "relacion1='".$datas['relacion1']."', ";
            $sql.= "relacion2='".$datas['relacion2']."', ";
            $sql.= "relacion3='".$datas['relacion3']."', ";
            $sql.= "masVendido='".$datas['masVendido']."', ";
            $sql.= "nuevos='".$datas['nuevos']."', ";
            $sql.= "status='".$datas['status']."', ";
            $sql.= "baja=0, ";
            $sql.= "modificado_dt=(NOW()), ";
            $sql.= "autor='".$datas['autor']."', ";
            $sql.= "editorial='".$datas['editorial']."', ";
            $sql.= "pagina=".$datas['pagina'].", ";
            $sql.= "publico='".$datas['publico']."', ";
            $sql.= "objetivo='".$datas['objetivo']."', ";
            $sql.= "necesario='".$datas['necesario']."' ";
            $sql.= "WHERE id =".$datas['id'];
            $salida =  $this->db->queryNoSelect($sql);
        }
        return $salida;
    }

    public function borrarLogico($id){
        $salida = true;
        $sql = "UPDATE productos SET baja=1, status=1, baja_dt=(NOW()) WHERE id=".$id;
        if(!$this->db->queryNoSelect($sql)){
            $salida = false;
        }
        return $salida;
    }

    public function getMasVendidos(){
        $sql = "SELECT * FROM productos WHERE masVendido=1 AND baja=0 LIMIT 8"; 
        return $this->db->querySelect($sql);
    }

    public function getNuevos(){
        $sql = "SELECT * FROM productos WHERE nuevos=1 AND baja=0 LIMIT 8"; 
        return $this->db->querySelect($sql);
    }
}
?>