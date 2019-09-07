<?php include_once PATH_VIS . "includes/header.php"; ?>
<?php include_once PATH_VIS . "includes/nav.php"; ?>

    
    <h1 class="mt-4 text-center my-5">Editar cliente</h1>
    <hr class="w-50">
    <section class="container">
        <div class="row">
            <div class="col-12 text-right">
                <?php echo $this->msjAddCliente; ?>
                <a href="<?php echo PATH; ?>cliente" class="btn btn-primary text-white">Regresar</a>
            </div>
            <div class="col-12 m-auto">
                <p><b>Los datos que no quiera actualizar dejelos como lo muestra el formulario.</b></p>
            </div>

            <!-- Formulario -->
            <div class="col-12">
                <form method="POST" action="<?php echo PATH; ?>cliente/updateClient">
                    <!-- RFC y Razon Social -->
                    <div class="form-row">
                        <!-- Razon Social -->
                        <div class="form-group col-md-6">
                            <label for="razonSocial">Razon Social</label>
                            <input type="text" class="form-control" id="razonSocial" name="razonSocial" value="<?php echo str_replace('-', ' ', $this->clientes['razon_social']); ?>">
                        </div>
                        <!-- RFC -->
                        <div class="form-group col-md-6">
                            <label for="rfc">Registro Federal de Contribuyentes</label>
                            <input type="text" class="form-control" name="rfc" id="rfc" value="<?php echo $this->clientes['rfc']; ?>">
                        </div>
                    </div>
                    
                    <!-- correo y Telefono -->
                    <div class="form-row">
                        <!-- Razon Social -->
                        <div class="form-group col-md-6">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" name="correo" id="correo" value="<?php echo $this->clientes['correo']; ?>">
                        </div>
                        <!-- RFC -->
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono (Oficina o celular)</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $this->clientes['telefono']; ?>">
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="form-group mb-5">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo str_replace('-', ' ', $this->clientes['direccion']); ?>">
                    </div>

                    <!-- Representante legal -->
                    <p class="mt-5"><b>Datos del representante Legal de la empresa:</b></p>
                    <hr class="w-80 mx-0">
                    <div class="form-row">
                        <!-- Nombre -->
                        <div class="form-group col-md-4">
                            <label for="nombre_repre">Nombre</label>
                            <input type="text" class="form-control" id="nombre_repre" name="nombre_repre" value="<?php echo str_replace('-', ' ', $this->clientes['nombre']); ?>">
                        </div>
                        <!-- Apellidos -->
                        <div class="form-group col-md-4">
                            <label for="apaterno_repre">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apaterno_repre" name="apaterno_repre" value="<?php echo $this->clientes['apaterno']; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amaterno_repre">Apellido Materno</label>
                            <input type="text" class="form-control" id="amaterno_repre" name="amaterno_repre" value="<?php echo $this->clientes['amaterno']; ?>">
                        </div>
                    </div>
                    <!-- correo y Telefono -->
                    <div class="form-row">
                        <!-- Razon Social -->
                        <div class="form-group col-md-6">
                            <label for="correo_repre">Correo</label>
                            <input type="text" class="form-control" id="correo_repre" name="correo_repre" value="<?php echo $this->clientes['correo_repre']; ?>">
                        </div>
                        <!-- RFC -->
                        <div class="form-group col-md-6">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $this->clientes['celular_repre']; ?>">
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <input type="hidden" name="id_cliente" value="<?php echo $this->clientes['id_cliente'];?>">
                        <button type="submit" class="btn btn-success" name="sendEditClient">Agregar al nuevo cliente</button>
                    </div>
                </form>
            </div>
            
        </div>
    </section>


<?php include_once PATH_VIS . "includes/footer.php"; ?>