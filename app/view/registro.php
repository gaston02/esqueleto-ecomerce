<?php include_once("base.php"); ?>

<div class="container-lg">
    <h1 class="mx-5 my-4 fw-bold">Registro</h1>
    <div class="mx-5">
        <form action="<?php print RUTA; ?>login/registro/" method="POST">
            <div class="col-lg-4">
                <label for="nombre" class="form-label text-dark fw-bold my-1">Nombre: *</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Gastón" 
                required value='<?php isset($data["datas"]["nombre"])? print $data["datas"]["nombre"]:""; ?>'/> 
            </div>
            <div class="col-lg-4">
                <label for="apellidoPaterno" class="form-label text-dark fw-bold my-1">Apellido Paterno: *</label>
                <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" placeholder="Fuentes" required 
                value='<?php isset($data["datas"]["apellidoPaterno"])? print $data["datas"]["apellidoPaterno"]:""; ?>'>
            </div>
            <div class="col-lg-4">
                <label for="apellidoMaterno" class="form-label text-dark fw-bold my-1">Apellido Materno:</label>
                <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" placeholder="Mazuela" 
                value='<?php isset($data["datas"]["apellidoMaterno"])? print $data["datas"]["apellidoMaterno"]:""; ?>'>
            </div>
            <div class="col-lg-4">
                <label for="email" class="form-label text-dark fw-bold my-1">Correo electronico: *</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="gastonandres.fuentes@gmail.com" required 
                value='<?php isset($data["datas"]["email"])? print $data["datas"]["email"]:""; ?>'>
            </div>
            <div class="col-lg-4">
                <label for="clave1" class="form-label text-dark fw-bold my-1">Clave de acceso: *</label>
                <input type="password" class="form-control" name="clave1" id="clave1" placeholder="********" required>
            </div>
            <div class="col-lg-4">
                <label for="clave2" class="form-label text-dark fw-bold my-1">Confirme su clave de acceso: *</label>
                <input type="password" class="form-control" name="clave2" id="clave2" placeholder="********" required>
            </div>
            <div class="col-lg-4">
                <label for="direccion" class="form-label text-dark fw-bold my-1">Direccion:</label>
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Roman Diaz 300 depto 403" 
                value='<?php isset($data["datas"]["direccion"])? print $data["datas"]["direccion"]:""; ?>'>
            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary mx-auto px-5 py-2 fw-bold my-2 me-1">Enviar Datos</button>
            </div>
        </form>
    </div>
    <?php include_once("errores.php"); ?>
</div>