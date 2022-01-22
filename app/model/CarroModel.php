<?php

class CarroModel{
    private $db;

    function __construct(){
        $this->db = new MySQLdb();
    }

    public function verificarProducto($idProducto, $idUsuario){
        $sql = "SELECT * FROM carrito WHERE idUsuario=".$idUsuario." ";
        $sql.= "AND idProducto=".$idProducto." ";
        $sql.= "AND estado=0";
        $r = $this->db->querySelect($sql);
        return count($r);
    }

    public function agregarProducto($idProducto, $idUsuario){
        //estado 0 = carrito abierto
        $sql = "SELECT * FROM productos WHERE id=".$idProducto." ";
        $datas = $this->db->query($sql);
        $sql = "INSERT INTO carrito ";
        $sql.= "SET estado=0, ";
        $sql.= "idProducto=".$idProducto.", ";
        $sql.= "idUsuario=".$idUsuario.", ";
        $sql.= "descuento=".$datas["descuento"].", ";
        $sql.= "envio=".$datas["envio"].", ";
        $sql.= "cantidad=1, ";
        $sql.= "fecha=(NOW())";
        return $this->db->queryNoSelect($sql);
    }

    public function getCarro($idUsuario){
        $sql = "SELECT c.idUsuario as usuario, ";
        $sql.= "c.idProducto as producto, ";
        $sql.= "c.cantidad as cantidad, ";
        $sql.= "c.envio as envio, ";
        $sql.= "c.descuento as descuento, ";
        $sql.= "p.precio as precio, ";
        $sql.= "p.imagen as imagen, ";
        $sql.= "p.descripcion as descripcion, ";
        $sql.= "p.nombre as nombre ";
        $sql.= "FROM carrito as c, productos as p ";
        $sql.= "WHERE idUsuario ='".$idUsuario."' AND ";
        $sql.= "estado=0 AND ";
        $sql.= "c.idProducto =p.id";
        return $this->db->querySelect($sql);
    }

    public function actualizar($idUsuario, $idProducto, $cantidad){
        $sql = "UPDATE carrito ";
        $sql.= "SET cantidad=".$cantidad." ";
        $sql.= "WHERE idUsuario =".$idUsuario." AND ";
        $sql.= "idProducto=".$idProducto." AND ";
        $sql.= "estado=0";
        return $this->db->queryNoSelect($sql);
    }

    public function borrar($idProducto, $idUsuario){
        $sql = "DELETE FROM carrito WHERE idUsuario=".$idUsuario." AND idProducto=".$idProducto." AND estado=0";
        return $this->db->queryNoSelect($sql);
    }

    public function cierraCarro($idUsuario, $estado){
        //estado 0 carrito abierto
        //estado 1 carrito autorizado
        //estado 2 carrito cancelado
        //estado 3 carrito no autorizado
        $sql = "UPDATE carrito ";
        $sql.= "SET estado=".$estado.", ";
        $sql.= "fecha=(NOW()) ";
        $sql.= "WHERE idUsuario =".$idUsuario." AND ";
        $sql.= "estado=0";
        return $this->db->queryNoSelect($sql);
    }

    public function ventas(){
        $sql = "SELECT c.idUsuario, ";
        $sql.= "SUM(p.precio*c.cantidad) as subtotal, ";
        $sql.= "SUM(p.precio * (c.descuento/100) * c.cantidad) as descuento, ";
        $sql.= "SUM(c.envio) as envio, ";
        $sql.= "SUM(p.precio*c.cantidad) + SUM(c.envio) - SUM(p.precio * (c.descuento/100) * c.cantidad) as total, ";
        $sql.= "DATE(c.fecha) as fecha, c.idUsuario as usuario ";
        $sql.= "FROM carrito as c, productos as p ";
        $sql.= "WHERE c.idProducto=p.id AND ";
        $sql.= "c.estado=1 ";
        $sql.= "GROUP BY fecha, c.idUsuario";
        return $this->db->querySelect($sql);
    }

    public function detalle($fecha, $idUsuario){
        $sql = "SELECT c.idUsuario, ";
        $sql.= "p.precio as precio, c.cantidad as cantidad, ";
        $sql.= "(p.precio * (c.descuento/100) * c.cantidad) as descuento, ";
        $sql.= "c.envio as envio, ";
        $sql.= "((p.precio*c.cantidad) + c.envio) - (p.precio * (c.descuento/100) * c.cantidad) as total, ";
        $sql.= "p.nombre as nombre, ";
        $sql.= "DATE(c.fecha) as fecha ";
        $sql.= "FROM carrito as c, productos as p ";
        $sql.= "WHERE c.idProducto=p.id AND ";
        $sql.= "c.estado=1 AND ";
        $sql.= "DATE(c.fecha)='".$fecha."' AND ";
        $sql.= "c.idUsuario=".$idUsuario;
        return $this->db->querySelect($sql);
    }

    public function ventasPorDia(){
        $sql = "SELECT SUM(p.precio*c.cantidad) + SUM(c.envio) - SUM(p.precio * (c.descuento/100) * c.cantidad) as total, ";
        $sql.= "DATE(c.fecha) as fecha ";
        $sql.= "FROM carrito as c, productos as p ";
        $sql.= " WHERE c.idProducto=p.id AND c.estado=1 ";
        $sql.= " GROUP BY fecha";
        return $this->db->querySelect($sql);
    }
}
?>