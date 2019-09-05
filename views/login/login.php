<?php include_once PATH_VIS . "includes/header.php"; ?>

    <div class="body-login">
    <section class="container text-center">
        <form class="form-signin" method="POST" action="<?php echo PATH; ?>login/iniciar">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h1 class="h2 mb-3 font-weight-normal">Inicie sesión </h1>
            
            <!-- Correo electronico -->
            <label for="inputEmail" class="sr-only">Correo Electrónico</label>
            <input type="email" name="correo" id="inputEmail" class="form-control" placeholder="Correo Electrónico" autofocus>
            
            <!-- Contraseña -->
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña">
            
            <!-- Errores generados -->
            <?php echo (isset($this->errores[0])) ? $this->errores[0] : ""; ?>
            <?php echo (isset($this->errores[1])) ? $this->errores[1] : ""; ?>
            <?php echo (isset($this->errores[2])) ? $this->errores[2] : ""; ?>

            <!-- Boton de envio --><br>
            <button class="btn btn-lg btn-success btn-block" type="submit">Iniciar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2019-2019</p>
        </form>
    </section>
    </div>

<?php include_once PATH_VIS . "includes/footer.php"; ?>