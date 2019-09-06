<?php include_once PATH_VIS . "includes/header.php"; ?>
<?php include_once PATH_VIS . "includes/nav.php"; ?>

    <h1 class="mt-4 text-center my-5">Nuevo cliente</h1>
    <hr class="w-50">
    <section class="container">
        <div class="row">
            <div class="col-12 text-right">
                <a href="<?php echo PATH; ?>cliente" class="btn btn-danger text-white">Cancelar</a>
            </div>
            <div class="col-12 m-auto">
                <p><b>Para crear un nuevo cliente llene el siguiente fomulario, los campos con <span class="text-danger">*</span> sin obligatorios.</b></p>
            </div>

            <!-- Formulario -->
            <div class="col-12">
                <form>
                    <!-- RFC y Razon Social -->
                    <div class="form-row">
                        <!-- Razon Social -->
                        <div class="form-group col-md-6">
                            <label for="razonSocial">Razon Social</label>
                            <input type="text" class="form-control" id="razonSocial" placeholder="Razon Social">
                        </div>
                        <!-- RFC -->
                        <div class="form-group col-md-6">
                            <label for="rfc">Registro Federal de Contribuyentes</label>
                            <input type="text" class="form-control" id="rfc" placeholder="RFC">
                        </div>
                    </div>
                    
                    <!-- correo y Telefono -->
                    <div class="form-row">
                        <!-- Razon Social -->
                        <div class="form-group col-md-6">
                            <label for="correo">Correo</label>
                            <input type="text" class="form-control" id="correo" placeholder="Correo electrónico">
                        </div>
                        <!-- RFC -->
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono (Oficina o celular)</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="form-group mb-5">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="calle jacobo watt">
                    </div>

                    <!-- Representante legal -->
                    <p class="mt-5"><b>Datos del representante Legal de la empresa:</b></p>
                    <hr class="w-80 mx-0">
                    <div class="form-row">
                        <!-- Nombre -->
                        <div class="form-group col-md-4">
                            <label for="nombre_repre">Nombre</label>
                            <input type="text" class="form-control" id="nombre_repre" placeholder="Nombre">
                        </div>
                        <!-- Apellidos -->
                        <div class="form-group col-md-4">
                            <label for="apaterno_repre">Apellido Paterno</label>
                            <input type="text" class="form-control" id="apaterno_repre" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="amaterno_repre">Aptellido Materno</label>
                            <input type="text" class="form-control" id="amaterno_repre" placeholder="Apellido Materno">
                        </div>
                    </div>
                    <!-- correo y Telefono -->
                    <div class="form-row">
                        <!-- Razon Social -->
                        <div class="form-group col-md-6">
                            <label for="correo_repre">Correo</label>
                            <input type="text" class="form-control" id="correo_repre" placeholder="Correo electrónico">
                        </div>
                        <!-- RFC -->
                        <div class="form-group col-md-6">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" placeholder="Celular">
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-success">Agregar al nuevo cliente</button>
                    </div>
                </form>
            </div>
            
        </div>
    </section>


<?php include_once PATH_VIS . "includes/footer.php"; ?>