<?php include_once("base.php"); ?>
<h1 class="text-center my-5">Gestor de ventas</h1>
<div class="container-sm">
  <div class="card bg-light m-lg-5">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Subtotal</th>
          <th>Descuento</th>
          <th>Envio</th>
          <th>Total</th>
          <th>Fecha</th>
          <th>Detalle</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $subtotal = 0;
          $des = 0;
          $envio = 0;
          $total = 0;
          for($i =0; $i < count($data['datas']); $i++){
            print "<tr>";
            print "<td>".$data["datas"][$i]["idUsuario"]."</td>";
            print "<td class='text-left'>$".number_format($data["datas"][$i]["subtotal"],0)."</td>";
            print "<td class='text-left'>$".number_format($data["datas"][$i]["descuento"],0)."</td>";
            print "<td class='text-left'>$".number_format($data["datas"][$i]["envio"],0)."</td>";
            print "<td class='text-left'>$".number_format($data["datas"][$i]["total"],0)."</td>";
            print "<td class='text-left'>".$data["datas"][$i]["fecha"]."</td>";
            print "<td><a href='".RUTA."carro/detalle/".$data["datas"][$i]["fecha"]."/".$data["datas"][$i]["idUsuario"]."' class='btn btn-primary fw-bold px-3 py-2'>Detalle</a></td>";
            print "</tr>";
            $subtotal += $data["datas"][$i]["subtotal"];
            $des += $data["datas"][$i]["descuento"];
            $envio += $data["datas"][$i]["envio"];
            $total += $data["datas"][$i]["total"];
          }
          print "<tr>";
          print "<td>totales</td>";
          print "<td class='text-right'>$".number_format($subtotal,0)."</td>";
          print "<td class='text-right'>$".number_format($des,0)."</td>";
          print "<td class='text-right'>$".number_format($envio,0)."</td>";
          print "<td class='text-right'>$".number_format($total,0)."</td>";
          print "<td></td>";
          print "<td></td>";
          print "</tr>";
        ?>
      </tbody>
    </table>
    <a href="<?php print RUTA; ?>carro/grafica" class="btn btn-primary mx-auto my-3 py-2 fw-bold">
      Grafica de ventas por dia</a>
  </div>
  <?php include_once("errores.php"); ?>
</div>