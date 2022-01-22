<?php include("base.php");?>

<h1 class="text-center my-4 fw-bold">Productos Nuevos</h1>
<div class="container">
    <div class="card border-0 p-4 bg-light">
    <?php
        $reglon = 0;
        for($i=0;$i<count($data["nuevos"]); $i++) {
            if($reglon==0){
                print "<div class='row'>";
            }
            print "<div class='card pt-2 border-0 col-sm-3'>";
            print "<img src='img/".$data['nuevos'][$i]["imagen"]."' ";
            print "class='img-responsive' style='width: 100%; height:240px;' ";
            print "alt='".$data['nuevos'][$i]["nombre"]."'/>";
            print "<p><a href='".RUTA."productosAdmin/producto/";
            print $data['nuevos'][$i]["id"]."'>";
            print $data['nuevos'][$i]["nombre"]."</a>"."</p>";
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

<h1 class="text-center my-4 fw-bold">Productos mas vendidos</h1>
<div class="container">
    <div class="card border-0 p-4 bg-light">
    <?php
        $reglon = 0;
        for($i=0;$i<count($data["datas"]); $i++) {
            if($reglon==0){
                print "<div class='row'>";
            }
            print "<div class='card pt-2 border-0 col-sm-3'>";
            print "<img src='img/".$data['datas'][$i]["imagen"]."' ";
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