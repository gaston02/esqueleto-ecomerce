<?php include("base.php");?>

<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>

<script src="<?php print RUTA; ?>js/registroProducto.js"></script>

<div class="container-md">
    <h1 class="text-center my-4 fw-bold">
    <?php
        if(isset($data["subtitulo"])) {
            print $data["subtitulo"];
        }
    ?>
    </h1>
    <div class="card bg-light items-align-center">
        <div class="mx-5 my-3">
            <form action="<?php print RUTA; ?>productosAdmin/insertarProducto/" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre" class="form-label text-dark fw-bold my-1">Nombre Producto: *</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto" 
                    required value='<?php isset($data["datas"]["nombre"])? print $data["datas"]["nombre"]:""; ?>'
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                </div>

                <div class="form-group">
                    <label for="tipoProducto" class="form-label text-dark fw-bold my-1">Seleccione el tipo del producto: *</label>
                    <select name="tipoProducto" id="tipoProducto" class="form-control" required 
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <option value="void">Selecciona el tipo de Producto</option>
                    <?php
                        for($i=0;$i<count($data["tipoProducto"]);$i++){
                            print " <option value='".$data["tipoProducto"][$i]["indice"]."'";
                            if(isset($data["datas"]["tipo"])){
                                if($data["datas"]["tipo"]==$data["tipoProducto"][$i]["indice"]){
                                    print " selected ";
                                }
                            }
                            print ">".$data["tipoProducto"][$i]["cadena"]."</option>";
                        } 
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="content" class="form-label text-dark fw-bold my-1">Descripcion Producto: </label>
                    <textarea name="content" id="editor" cols="30" rows="10">
                    <?php
                        if(isset($data['datas']['descripcion'])){
                            print $data['datas']['descripcion']; 
                        }
                    ?>
                    </textarea>
                </div>

                <input type="hidden"
                <?php 
                    if(isset($data['baja'])){
                        print "id ='"."desc"."'";
                    }else{
                        print "id ='"."hola"."'";
                    }
                ?>>

                <div id="libro">
                    <div class="form-group">
                        <label for="autor" class="form-label text-dark fw-bold my-1">Nombre Autor Libro: *</label>
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="Autor del libro" 
                        value='<?php isset($data["datas"]["autor"])? print $data["datas"]["autor"]:""; ?>'
                        <?php
                            if(isset($data['baja'])){
                                print "disabled";
                            } 
                        ?>/>
                    </div>

                    <div class="form-group">
                        <label for="editorial" class="form-label text-dark fw-bold my-1">Editorial Libro: </label>
                        <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Editorial del libro" 
                        value='<?php isset($data["datas"]["editorial"])? print $data["datas"]["editorial"]:""; ?>'
                        <?php
                            if(isset($data['baja'])){
                                print "disabled";
                            } 
                        ?>/>
                    </div>

                    <div class="form-group">
                        <label for="pagina" class="form-label text-dark fw-bold my-1">Paginas Libro: </label>
                        <input type="text" class="form-control" name="pagina" id="pagina" placeholder="Numero de paginas del libro" pattern="^(\d|-)?(\d|,)*\.?\d*$" 
                        value='<?php isset($data["datas"]["pagina"])? print $data["datas"]["pagina"]:""; ?>'
                        <?php
                            if(isset($data['baja'])){
                                print "disabled";
                            } 
                        ?>/>
                    </div>
                </div>

                <div id="curso">
                    <div class="form-group">
                        <label for="publico" class="form-label text-dark fw-bold my-1">Publico objetivo del curso: </label>
                        <input type="text" class="form-control" name="publico" id="publico" placeholder="publico objetivo del curso" 
                        value='<?php isset($data["datas"]["publico"])? print $data["datas"]["publico"]:""; ?>'
                        <?php
                            if(isset($data['baja'])){
                                print "disabled";
                            } 
                        ?>/>
                    </div>

                    <div class="form-group">
                        <label for="objetivo" class="form-label text-dark fw-bold my-1">Objetivo del curso: </label>
                        <input type="text" class="form-control" name="objetivo" id="objetivo" placeholder="Objetivo del curso" 
                        value='<?php isset($data["datas"]["objetivo"])? print $data["datas"]["objetivo"]:""; ?>'
                        <?php
                            if(isset($data['baja'])){
                                print "disabled";
                            } 
                        ?>/>
                    </div>

                    <div class="form-group">
                        <label for="necesario" class="form-label text-dark fw-bold my-1">Requisitos minimos del curso: </label>
                        <input type="text" class="form-control" name="necesario" id="necesario" placeholder="Requisitos del curso" 
                        value='<?php isset($data["datas"]["necesario"])? print $data["datas"]["necesario"]:""; ?>'
                        <?php
                            if(isset($data['baja'])){
                                print "disabled";
                            } 
                        ?>/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="precio" class="form-label text-dark fw-bold my-1">Precio Producto (sin comas, ni puntos. Tampoco utilice simbolo de peso, o dolar): *</label>
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio del curso" pattern = "^(\d|-)?(\d|,)*\.?\d*$" 
                    required value='<?php isset($data["datas"]["precio"])? print $data["datas"]["precio"]:""; ?>'
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>/>
                </div>

                <div class="form-group">
                    <label for="descuento" class="form-label text-dark fw-bold my-1">Descuento Producto (sin comas, ni puntos. Tampoco utilice simbolo de porcentaje): </label>
                    <input type="text" class="form-control" name="descuento" id="descuento" placeholder="Descuento del precio" pattern = "^(\d|-)?(\d|,)*\.?\d*$"  
                    value='<?php isset($data["datas"]["descuento"])? print $data["datas"]["descuento"]:""; ?>'
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>/>
                </div>

                <div class="form-group">
                    <label for="envio" class="form-label text-dark fw-bold my-1">Costo envio del producto (sin comas, ni puntos. Tampoco utilice simbolo de peso, o dolar): </label>
                    <input type="text" class="form-control" name="envio" id="envio" placeholder="Costo de envio" pattern = "^(\d|-)?(\d|,)*\.?\d*$"  
                    value='<?php isset($data["datas"]["envio"])? print $data["datas"]["envio"]:""; ?>'
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>/>
                </div>

                <div class="form-group">
                    <label for="imagen" class="form-label text-dark fw-bold my-1">Subir imagen del producto: </label>
                    <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpeg" required
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                </div>

                <div class="form-group">
                    <label for="fecha" class="form-label text-dark fw-bold my-1">Fecha Producto: </label>
                    <input type="date" class="form-control" name="fecha" id="fecha" 
                    value='<?php isset($data["datas"]["fecha"])? print $data["datas"]["fecha"]:""; ?>'
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>/>
                </div>
                
                <div class="form-group">
                    <label for="relacion1" class="form-label text-dark fw-bold my-1">Producto relacionado: </label>
                    <select name="relacion1" id="relacion1" class="form-control"
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <option value="void">Selecciona el Producto relacionado</option>
                    <?php
                        for($i=0;$i<count($data["catalogo"]);$i++){
                            print " <option value='".$data["catalogo"][$i]["id"]."'";
                            if(isset($data["datas"]["relacion1"])){
                                if($data["datas"]["relacion1"]==$data["catalogo"][$i]["id"]){
                                    print " selected ";
                                }
                            }
                            print ">".$data["catalogo"][$i]["nombre"]."</option>";
                        } 
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="relacion2" class="form-label text-dark fw-bold my-1">Producto relacionado: </label>
                    <select name="relacion2" id="relacion2" class="form-control"
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <option value="void">Selecciona el Producto relacionado</option>
                    <?php
                        for($i=0;$i<count($data["catalogo"]);$i++){
                            print " <option value='".$data["catalogo"][$i]["id"]."'";
                            if(isset($data["datas"]["relacion2"])){
                                if($data["datas"]["relacion2"]==$data["catalogo"][$i]["id"]){
                                    print " selected ";
                                }
                            }
                            print ">".$data["catalogo"][$i]["nombre"]."</option>";
                        } 
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="relacion3" class="form-label text-dark fw-bold my-1">Producto relacionado: </label>
                    <select name="relacion3" id="relacion3" class="form-control"
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <option value="void">Selecciona el Producto relacionado</option>
                    <?php
                        for($i=0;$i<count($data["catalogo"]);$i++){
                            print " <option value='".$data["catalogo"][$i]["id"]."'";
                            if(isset($data["datas"]["relacion3"])){
                                if($data["datas"]["relacion3"]==$data["catalogo"][$i]["id"]){
                                    print " selected ";
                                }
                            }
                            print ">".$data["catalogo"][$i]["nombre"]."</option>";
                        } 
                    ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="form-label text-dark fw-bold my-1">Seleccione el status: *</label>
                    <select name="status" id="status" class="form-control" required
                    <?php
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <option value="void">Selecciona el status del producto</option>
                    <?php
                        for($i=0;$i<count($data["status"]);$i++){
                            print " <option value='".$data["status"][$i]["indice"]."'";
                            if(isset($data["datas"]["status"])){
                                if($data["datas"]["status"]==$data["status"][$i]["indice"]){
                                    print " selected ";
                                }
                            }
                            print ">".$data["status"][$i]["cadena"]."</option>";
                        } 
                    ?>
                    </select>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="masVendido" id="masVendido" class="form-check-input" 
                    <?php
                        if(isset($data['datas']['masVendido'])){
                            if($data['datas']['masVendido']=="1") print " checked ";
                        }
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <label for="masVendido" class="form-check-label text-dark fw-bold my-1">Producto mas vendido: </label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="nuevos" id="nuevos" class="form-check-input" 
                    <?php
                        if(isset($data['datas']['nuevos'])){
                            if($data['datas']['nuevos']=="1") print " checked ";
                        } 
                        if(isset($data['baja'])){
                            print "disabled";
                        } 
                    ?>>
                    <label for="nuevos" class="form-check-label text-dark fw-bold my-1" >Producto nuevo: </label>
                </div>

                <input type="hidden" name="id" id="id" value='<?php isset($data["datas"]["id"])? print $data["datas"]["id"]:""; ?>'/>
                
                <?php
                if (isset($data["baja"])) { ?>
                    <p class="my-2 fw-bold">¿esta seguro de borrar este Usuario?</p>
                    <a href="<?php print RUTA; ?>productosAdmin/borrarLogico/<?php print $data['datas']['id']; ?>" class="btn btn-danger px-5 py-2 fw-bold">Si</a>
                    <a href="<?php print RUTA; ?>productosAdmin" class="btn btn-success px-5 py-2 fw-bold">No</a>
                <?php } else { ?> 
                <input type="submit" value="Enviar" class="btn btn-primary px-5 py-2 fw-bold">
                <?php } ?> 
            </form>
        </div>
    </div>
    <?php include_once("errores.php"); ?>
</div>

<script>
    if(document.getElementById("desc")){
        ClassicEditor.create( document.querySelector('#editor' ) )
        .then(editor => { 
            console.log( editor ); 
            editor.isReadOnly = true; 
        } ) .catch( error => { 
            console.error( error ); 
        } );
    }
    if(document.getElementById("hola")){
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    }
</script>