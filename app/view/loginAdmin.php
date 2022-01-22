<?php include("base.php");?>

<div class="container-lg">
    <h1 class="mx-5 my-4 fw-bold">Modulo Administrativo</h1>
    <div class="mx-5">
        <form action="<?php print RUTA; ?>admin/verifica/" method="POST">
            <div class="col-lg-4">
                <label for="email" class="form-label text-dark fw-bold my-1">Correo electronico:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="gastonandres.fuentes@gmail.com" value='<?php isset($data["datas"]["email"])? print $data["datas"]["email"]:""; ?>'> 
            </div>
            <div class="col-lg-4">
                <label for="clave" class="form-label text-dark fw-bold my-1">Clave acceso:</label>
                <input type="password" class="form-control" name="clave" id="clave" placeholder="********">
            </div>
            <div class="col-lg-4">
                <button type="submit" class="btn btn-primary mx-auto px-5 py-2 fw-bold my-2 me-1">Login</button>
            </div>
        </form>
    </div>
    <?php include_once("errores.php"); ?>
</div>