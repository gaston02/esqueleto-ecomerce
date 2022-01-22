<?php include("base.php");?>

<h1 class="text-center my-4 fw-bold"><?php
        if(isset($data["subtitulo"])) {
            print $data["subtitulo"];
        }
    ?></h1>
<div class="container">
    <div class="card border-0 p-4 bg-light">
    <?php
        $ren = 0;
        for($i=0;$i<count($data["datas"]); $i++) {
            if($ren==0){
                print "<div class='row'>";
            }
            print "<div class='card pt-2 border-0 col-sm-3'>";
            print "<img src='".RUTA."img/".$data['datas'][$i]["imagen"]."' ";
            print "class='img-responsive' style='width: 100%; height:240px;' ";
            print "alt='".$data['datas'][$i]["nombre"]."'/>";
            print "<p><a href='".RUTA."productosAdmin/producto/";
            print $data['datas'][$i]["id"]."/".$data['activo']."'>";
            print $data['datas'][$i]["nombre"]."</a>"."</p>";
            print "</div>";
            $ren++;
            if($ren==4){
                $ren = 0;
                print "</div>";
            }
        }
    ?>
    </div>
</div>

<?php include("errores.php");?>