<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="
        <?php  
            if($data["admin"]){
                print RUTA.'admin';
            }else{
                print RUTA."tienda";
            }
        ?>"><?php print $data["tituloMenu"]; ?></a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if($data["menu"]){
                print "<ul class='navbar-nav me-auto mt-2 mt-lg-0'>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."tipoProducto/cursos' class='nav-link ";
                if(isset($data["activo"]) && $data["activo"]=="cursos") print "active";
                print "'>Cursos</a>";
                print "</li>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."tipoProducto/libros' class='nav-link ";
                if(isset($data["activo"]) && $data["activo"]=="libros") print "active";
                print "'>Libros</a>";
                print "</li>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."sobreNosotros' class='nav-link ";
                if(isset($data["activo"]) && $data["activo"]=="sobreNosotros") print "active";
                print "'>Sobre Nosotros</a>";
                print "</li>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."contacto' class='nav-link ";
                if(isset($data["activo"]) && $data["activo"]=="contacto") print "active";
                print "'>Contacto</a>";
                print "</li>";
                print "</ul>";
                print "<ul class='navbar-nav navbar-right'>";
                print "<li class='nav-item'>";
                print "<a href='".RUTA."tienda/logout' class='nav-link ";
                if(isset($data["activo"]) && $data["activo"]=="logout") print "active";
                print "'>Cerrar Sesion</a>";
                print "</li>";
                print "</ul>";
            }
            if(isset($data["adminMenu"])){
                if($data["adminMenu"]){
                    print "<ul class='navbar-nav me-auto mt-2 mt-lg-0'>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."adminUsuarios' class='nav-link'>Usuarios</a>";
                    print "</li>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."productosAdmin' class='nav-link'>Productos</a>";
                    print "</li>";
                    print "<li class='nav-item'>";
                    print "<a href='".RUTA."carro/ventas' class='nav-link'>Gestor de ventas</a>";
                    print "</li>";
                    print "</ul>";
                }
            }
            ?>
        <!-- Fin Links -->
        </div>
        <?php if($data["menu"]){
            print "<a class='icon ion-md-cart fs-2 text-white mx-1' href='".RUTA."carro'>";
            if(isset($_SESSION["carro"])&&$_SESSION["carro"]>0){
                print "<small class='text-danger'>".number_format($_SESSION["carro"],0)."</small>";
            }
            print "</a>";
            print "<div class='mx-lg-0 mx-xl-5'>";
            print "<form method='POST' action='".RUTA."buscar/producto' class='d-flex'>";
            print " <input type='search' name='buscar' id='buscar' class='form-control me-2 fw-bold' placeholder='buscar producto' aria-label='buscar producto'>";
            print "<button type='submit' class='btn btn-success'><i class='icon ion-md-search fs-5'></i></button>";
            print "</form>";
            print "</div>";
        }?>
    </div>
</nav>
<!-- Fin NavBar -->