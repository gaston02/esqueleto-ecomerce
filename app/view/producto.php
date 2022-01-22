<?php include_once("base.php");

print "<h2 class='text-center my-3'>".$data["subtitulo"]."</h2>";
print "<div class='container mt-5'".">";
print "<img src='".RUTA."img/".$data["datas"]["imagen"]."' class='rounded float-end'/>";
if($data["datas"]["tipo"]==1){
    print "<h4>Descripcion:</h4>";
    print "<p>".html_entity_decode($data["datas"]["descripcion"])."</p>";
    print "<h4>Precio (CLP):</h4>";
    print "<p>$".number_format($data["datas"]["precio"],0)."</p>";
    print "<h4>a quien va dirigido:</h4>";
    print "<p>".$data["datas"]["publico"]."</p>";
    print "<h4>Objetivos:</h4>";
    print "<p>".$data["datas"]["objetivo"]."</p>";
    print "<h4>Requisitos:</h4>";
    print "<p>".$data["datas"]["necesario"]."</p>";
}else if($data["datas"]["tipo"]==2){
    print "<h4>Autor:</h4>";
    print "<p>".$data["datas"]["autor"]."</p>";
    print "<h4>Descripcion:</h4>";
    print "<p>".html_entity_decode($data["datas"]["descripcion"])."</p>";
    print "<h4>Precio (CLP):</h4>";
    print "<p>$".number_format($data["datas"]["precio"],0)."</p>";
    print "<h4>Editorial:</h4>";
    print "<p>".$data["datas"]["editorial"]."</p>";
    print "<h4>paginas:</h4>";
    print "<p>".$data["datas"]["pagina"]."</p>";
}
$regresa = ($data["regresa"]=="")?"tienda":"tipoProducto/".$data["regresa"];
print "<a href='".RUTA."carro/agregarProducto/";
print $data["datas"]["id"]."/";
print $data["idUsuario"]."' ";
print "class='btn btn-success fw-bold px-5 py-2 me-2'/>Agregar al carro</a>";
print "<a href='".RUTA.$regresa."' class='btn btn-primary fw-bold px-5 py-2'/>Regresar</a>";
print "</div>";

include_once("errores.php");?>