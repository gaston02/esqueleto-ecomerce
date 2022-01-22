<?php include_once("base.php"); ?>
<h1 class="text-center my-5">Lista de Usuarios</h1>
<div class="container-md">
  <div class="card bg-light m-lg-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>E-mail</th>
          <th>Modificar</th>
          <th>Borrar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          for($i =0; $i < count($data['datas']); $i++){
            print "<tr>";
            print "<td>".$data["datas"][$i]["id"]."</td>";
            print "<td class='text-left'>".$data["datas"][$i]["nombre"]."</td>";
            print "<td class='text-left'>".$data["datas"][$i]["email"]."</td>";
            print "<td><a href='".RUTA."adminUsuarios/editarUsuario/".$data["datas"][$i]["id"]."' class='btn btn-warning text-white fw-bold px-3 py-2'>Modificar</a></td>";
            print "<td><a href='".RUTA."adminUsuarios/borrarUsuario/".$data["datas"][$i]["id"]."' class='btn btn-danger fw-bold px-3 py-2'>Borrar</a></td>";
            print "</tr>";
          }
        ?>
      </tbody>
    </table>
    <a href="<?php print RUTA; ?>adminUsuarios/registroUsuario" class="btn btn-primary mx-auto my-3 py-2 fw-bold">
      Registrar Usuario Administrativo</a>
  </div>
  <?php include_once("errores.php"); ?>
</div>