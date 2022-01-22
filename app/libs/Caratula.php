<?php

class Caratula{
    function __construct() {}

    public static function caratula($titulo="", $menu=false, $admin=false, $adminMenu=false, $tituloMenu="", $datas=[], $errores=[]){
        $data = [
            "titulo" => $titulo,
            "menu" => $menu,
            "admin" => $admin,
            "adminMenu" => $adminMenu,
            "tituloMenu" => $tituloMenu,
            "datas" => $datas,
            "errores" => $errores,
        ];
        return $data;
    }

    public static function caratulaError($data=[], $subtitulo="", $texto="", $color="", $url="", $colorBtn="", $textoBtn=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "subtitulo" => $subtitulo,
            "texto" => $texto,
            "color" => $color,
            "url" => $url,
            "colorBtn" => $colorBtn,
            "textoBtn" => $textoBtn
        ];
        return $data;
    }

    public static function caratulaLlaves($data=[], $llaves=[], $subtitulo=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "status" => $llaves,
            "subtitulo" => $subtitulo
        ];
        return $data;
    }

    public static function caratulaId($data=[], $idUsuario=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "idUsuario" => $idUsuario
        ];
        return $data;
    }

    public static function caratulaCarro($data=[], $pago="", $carro=[]){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "pago" => $pago,
            "carro" => $carro
        ];
        return $data;
    }

    public static function caratulaActivo($data=[], $activo="", $subtitulo=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "activo" => $activo,
            "subtitulo" => $subtitulo
        ];
        return $data;
    }

    public static function caratulaSubtitulo($data=[], $subtitulo=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "subtitulo" => $subtitulo,
        ];
        return $data;
    }

    public static function caratulaTipoProducto($data=[], $tipoProducto=[]){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "tipoProducto" => $tipoProducto
        ];
        return $data;
    }

    public static function caratulaConTodo($data=[], $tipoProducto=[], $status=[], $catalogo=[], $subtitulo=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "tipoProducto" => $tipoProducto,
            "status" => $status,
            "catalogo" => $catalogo,
            "subtitulo" => $subtitulo
        ];
        return $data;
    }

    public static function caratulaConTodoMas($data=[], $tipoProducto=[], $status=[], $catalogo=[], $subtitulo="", $baja=false){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "tipoProducto" => $tipoProducto,
            "status" => $status,
            "catalogo" => $catalogo,
            "subtitulo" => $subtitulo,
            "baja" => $baja
        ];
        return $data;
    }

    public static function caratulaIdMas($data=[], $idUsuario="", $subtitulo="", $regresa=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "idUsuario" => $idUsuario,
            "subtitulo" => $subtitulo,
            "regresa" => $regresa
        ];
        return $data;
    }

    public static function caratulaNuevos($data=[], $nuevos=[]){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "nuevos" => $nuevos
        ];
        return $data;
    }

    public static function caratulaStatus($data=[], $status, $baja=false, $subtitulo=""){
        $data = [
            "titulo" => $data["titulo"],
            "menu" => $data["menu"],
            "admin" => $data["admin"],
            "adminMenu" => $data["adminMenu"],
            "tituloMenu" => $data["tituloMenu"],
            "datas" => $data["datas"],
            "errores" => $data["errores"],
            "status" => $status,
            "baja" => $baja,
            "subtitulo" => $subtitulo
        ];
        return $data;
    }
}
?>