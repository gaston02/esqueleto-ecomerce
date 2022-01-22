<?php include("base.php");?>

<h1 class="text-center my-4 fw-bold">Productos Encontrados</h1>
<div class="alert-succes text-center fw-bold mt-3">
    <?php if(count($data["datas"])==0){
                print "<p class='lead'>No se encontraron resultados</p>";
            }else{
                print "<p class='lead'>se han encontrado ".count($data["datas"])." resultados</p>";
            }
    ?>
</div>
<div class="container">
    <div class="card border-0 p-4 bg-light">
    <?php
        $reglon = 0;
        for($i=0;$i<count($data["datas"]); $i++) {
            if($reglon==0){
                print "<div class='row'>";
            }
            print "<div class='card pt-2 border-0 col-sm-3'>";
            print "<img src='".RUTA."img/".$data['datas'][$i]["imagen"]."' ";
            print "class='img-responsive' style='width: 100%; height:240px;' ";
            print "alt='".$data['datas'][$i]["nombre"]."'/>";
            print "<p><a href='".RUTA."productosAdmin/producto/";
            print $data['datas'][$i]["id"]."'>";
            print $data['datas'][$i]["nombre"]."</a>"."</p>";
            print "</div>";
            $reglon++;
            if($reglon==4){
                $reglon = 0;
                print "</div>";
            }
        }
    ?>
    </div>
</div>

<?php include("errores.php");?>