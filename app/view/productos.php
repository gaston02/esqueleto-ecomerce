<?php include_once("base.php"); ?>
<h1 class="text-center my-5">Lista de Productos</h1>
<div class="container-sm">
  <div class="card bg-light m-lg-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Tipo</th>
          <th>Descripcion</th>
          <th>Modificar</th>
          <th>Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          for($i =0; $i < count($data['datas']); $i++){
            $tipo = $data["datas"][$i]["tipo"]-1;
            print "<tr>";
            print "<td>".$data["datas"][$i]["id"]."</td>";
            print "<td class='text-left'>".$data["datas"][$i]["nombre"]."</td>";
            print "<td class='text-left'>".$data["tipoProducto"][$tipo]["cadena"]."</td>";
            print "<td class='text-left'>".substr(html_entity_decode($data["datas"][$i]["descripcion"]),0,240)."...</td>";
            print "<td><a href='".RUTA."productosAdmin/editarProducto/".$data["datas"][$i]["id"]."' class='btn btn-warning text-white fw-bold px-3 py-2'>Modificar</a></td>";
            print "<td><a href='".RUTA."productosAdmin/borrarProducto/".$data["datas"][$i]["id"]."' class='btn btn-danger fw-bold px-3 py-2'>Borrar</a></td>";
            print "</tr>";
          }
        ?>
      </tbody>
    </table>
    <a href="<?php print RUTA; ?>productosAdmin/insertarProducto" class="btn btn-primary mx-auto my-3 py-2 fw-bold">
      Registrar Producto</a>
  </div>
  <?php include_once("errores.php"); ?>
</div>