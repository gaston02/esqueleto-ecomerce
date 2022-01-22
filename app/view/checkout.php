<?php include("base.php");?>

<div class="card container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fw-bold">Iniciar sesion</li>
            <li class="breadcrumb-item"><a href="#">Datos de envio</a></li>
            <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
            <li class="breadcrumb-item"><a href="#">Verificar datos</a></li>
        </ol>
    </nav>
    <h2 class="fw-bold">Checkout</h2>
    <form action="" class="text-left">
        <div class="form-group">
            <label for="correo" class="fw-bold">E-mail</label>
            <input type="email" name="correo" id="correo" class="form-control fw-bold" placeholder="Correo">
        </div>
        <div class="form-group">
            <label for="clave" class="fw-bold">Clave</label>
            <input type="text" name="clave" id="clave" class="form-control fw-bold" placeholder="Clave de acceso">
        </div>
        <a href="<?php print RUTA;?>carro/direccion" class="btn btn-primary px-5 py-2 my-2 fw-bold">Enviar</a>
    </form> 
</div>