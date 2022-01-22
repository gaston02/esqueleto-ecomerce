<?php include_once("base.php"); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['bar']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(grafica);

    function grafica() {
        var data = google.visualization.arrayToDataTable([
            ["Fecha", "Ventas"],
        <?php
        $n = count($data["datas"]);
        for($i = 0; $i < $n; $i++) {
            print "['".$data["datas"][$i]["fecha"]."', ";
            print $data["datas"][$i]["total"]."]";
            if($i<$n) print ",";
        }
        ?>
        ]);
        var opciones = {
            chart: {
                title:"Ventas por dia",
                subtitle:"Tienda Virtual"
            },
            colors: ["orange"],
            fontSize: 25,
            fontName:"Times",
            bars:"horizontal",
            height:400,
            hAxis:{
                title:"Ventas $(CLP)",
                titleTextStyle:{color:"blue", fontSize:"30"},
                textPosition:"out",
                textStyle:{color:"red", fontSize:20, bold:true,italic:true}
            },
            vAxis: {
                title:"Fecha",
                titleTextStyle:{color:"blue", fontSize:30},
                textPosition:"out",
                textStyle:{color:"blue", fontSize:20, bold:true,italic:true},
                gridlines: {color:"gray"}
            }
        }

        var chart = new google.charts.Bar(document.getElementById("grafica"));
        chart.draw(data, google.charts.Bar.convertOptions(opciones));
    }
</script>

<div class="container mt-4"><div id="grafica"></div></div>

<?php include_once("errores.php"); ?>