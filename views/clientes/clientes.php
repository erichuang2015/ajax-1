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
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" type="search" placeholder="RFC o razon social" aria-label="Search">
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
                        <tr id="'.$cliente['rfc'].'">
                            <th scope="row">'.$cliente['id_cliente'].'</th>
                            <td>'.$cliente['razon_social'].'</td>
                            <td>'.$cliente['rfc'].'</td>
                            <td>'.$cliente['correo'].'</td>
                            <td>'.$cliente['nombre'].'</td>
                            <td>
                                <button class="btn btn-info">Editar</button>
                                <button class="btn btn-danger" id="btnEliminar">Eliminar</button>
                            </td>
                            <td><button class="btn btn-outline-dark">ver perfil</button></td>
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