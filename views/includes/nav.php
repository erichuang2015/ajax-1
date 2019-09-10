
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-dark border-right" id="sidebar-wrapper" >
        <!-- Titulo sidebar -->
        <div class="sidebar-heading text-light">Dashboard</div>


        <!-- Elementos sidebar -->
        <div class="list-group list-group-flush">
            <a href="<?php echo PATH; ?>dashboard" class="list-group-item list-group-item-action bg-dark text-light">Inicio</a>
            <a href="<?php echo PATH; ?>cliente" class="list-group-item list-group-item-action bg-dark text-light">Clientes</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Dependencias</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Tramites</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Pendiente</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Cerrar</a>
        </div>
    </div>

    <!-- Contenido superior -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-outline-dark" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu superior -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <span class="nav-link" href="#"><?php echo $_SESSION['nombreCompleto']; ?> <span class="sr-only">(current)</span></span>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo PUBLIC_P; ?>images/profile_user.png" class="rounded-circle img-fluid" width="35" height="35">
                        </a>
                        <!-- Contenido drop -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Proximamente</a>
                            <a class="dropdown-item" href="#">Proximamente</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo PATH; ?>login/cerrar">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div> <!-- navbar-collapse -->

        </nav><!-- nav -->

      
    
    
    <!-- Contenido general -->
    <div class="container-fluid">
 

