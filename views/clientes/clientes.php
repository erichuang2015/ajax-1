<?php 
    session_start();
    if( !$_SESSION['status'] ){
        header( 'Location: login' );
    }
?>
<?php include_once PATH_VIS . "includes/header.php"; ?>
<?php include_once PATH_VIS . "includes/nav.php"; ?>
  
    <h1 class="mt-4 text-center my-5">Clientes</h1>
    <hr class="w-50">
    <div class="container-fluid w-90 mt-5">
        <div class="row">
            <div class="col-11 m-auto">

                <div class="container-fluid my-3">
                    <div class="row">
                        <div class="col mx-auto align-self-center">
                            <form class="form-inline my-2 my-lg-0" id="buscarClienteBtn">
                                <input class="form-control mr-sm-2" type="search" placeholder="RFC o razon social" id="buscarCliente" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </div>
                        <div class="col">
                            <a href="<?php echo PATH; ?>cliente/nuevoCliente" class="btn btn-success float-right text-white">Agregar un nuevo cliente</a>
                        </div>
                    </div>
                </div>
        
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Razon Social</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Representante</th>
                            <th scope="col">Acciones</th>
                            <th scope="col">Ver mas</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-clientes">
                        <?php
                            foreach ($this->clientes as $cliente) {
                                echo '
                        <tr id="'.$cliente['RFC'].'">
                            <th scope="row">'.$cliente['ID_CLIENTE'].'</th>
                            <td>'.$cliente['RAZON_SOCIAL'].'</td>
                            <td>'.$cliente['RFC'].'</td>
                            <td>'.$cliente['CORREO'].'</td>
                            <td>'.$cliente['NOMBRE'].'</td>
                            <td>
                                <a href="'.PATH .'cliente/editarCliente/'
                                .$cliente['ID_CLIENTE'].'/'
                                .str_replace(' ', '-', $cliente['RAZON_SOCIAL']).'/'
                                .$cliente['RFC'].'/'
                                .$cliente['CORREO'].'/'
                                .$cliente['TELEFONO'].'/'
                                .str_replace(' ', '-', str_replace('#', 'Num.', $cliente['DIRECCION'])).'/'
                                
                                .str_replace(' ', '-', $cliente['NOMBRE']).'/'
                                .$cliente['APATERNO'].'/'
                                .$cliente['AMATERNO'].'/'
                                .$cliente['CORREO_REPRE'].'/'
                                .$cliente['CELULAR_REPRE'].
                                '" class="btn btn-info text-white">Editar</a>
                                <button class="btn btn-danger" id="btnEliminar">Eliminar</button>
                            </td>
                            <td><a href="'.PATH.'cliente/perfilCliente/'.$cliente['RFC'].'" class="btn btn-outline-dark">ver perfil</a></td>
                        </tr>
                                ';
                            }
                        ?>
                    </tbody>
                </table>    
            </div>
        </div>

    </div>
  

<?php include_once PATH_VIS . "includes/footer.php"; ?>