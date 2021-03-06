<?php include_once("base.php"); ?>

<div class="card p-3 my-5 container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Iniciar sesion</a></li>
            <li class="breadcrumb-item fw-bold">Datos de envio</li>
            <li class="breadcrumb-item"><a href="#">Forma de pago</a></li>
            <li class="breadcrumb-item"><a href="#">Verificar datos</a></li>
        </ol>
    </nav>
    <h1 class="fw-bold">Datos de envio</h1>
    <form action="<?php print RUTA; ?>carro/formaPago/" method="POST">
        <div class="form-group">
            <label for="nombre" class="form-label text-dark fw-bold my-1">Nombre: *</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" 
            required value='<?php isset($data["datas"]["nombre"])? print $data["datas"]["nombre"]:""; ?>'/> 
        </div>
        <div class="form-group">
            <label for="apellidoPaterno" class="form-label text-dark fw-bold my-1">Apellido Paterno: *</label>
            <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" placeholder="Apellido paterno" required 
            value='<?php isset($data["datas"]["apellidoPaterno"])? print $data["datas"]["apellidoPaterno"]:""; ?>'>
        </div>
        <div class="form-group">
            <label for="apellidoMaterno" class="form-label text-dark fw-bold my-1">Apellido Materno:</label>
            <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" placeholder="Apellido materno" 
            value='<?php isset($data["datas"]["apellidoMaterno"])? print $data["datas"]["apellidoMaterno"]:""; ?>'>
        </div>
        <div class="form-group">
            <label for="email" class="form-label text-dark fw-bold my-1">Correo electronico: *</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required 
            value='<?php isset($data["datas"]["email"])? print $data["datas"]["email"]:""; ?>'>
        </div>
        <div class="form-group">
            <label for="direccion" class="form-label text-dark fw-bold my-1">Direccion:</label>
            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" 
            value='<?php isset($data["datas"]["direccion"])? print $data["datas"]["direccion"]:""; ?>'>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mx-auto px-5 py-2 fw-bold my-2 me-1">Continuar</button>
        </div>
    </form>
</div>