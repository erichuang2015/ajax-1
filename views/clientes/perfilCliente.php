<?php include_once PATH_VIS . "includes/header.php"; ?>
<?php include_once PATH_VIS . "includes/nav.php"; ?>


<h1 class="mt-4 text-center my-5">Perfil</h1>
<hr class="w-50">
<section class="container">
    <div class="row">
        <div class="col-12 text-right">
            <?php echo $this->msjAddCliente; ?>
            <a href="<?php echo PATH; ?>cliente" class="btn btn-primary text-white">Regresar</a>
        </div>
        <!-- Foto de perfil -->
        <div class="col-4">
            <h2 class="text-center">Foto de perfil</h2>
            <div class="col-11 m-auto">
                <img src="<?php echo PUBLIC_P; ?>images/profile_default.png" class="rounded-circle img-fluid">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Subir</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Selecciona un foto</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido de perfil -->
        <div class="col-8 ">
            <h2>Información</h2>
            <table class="table">
                
                <tbody>
                    <tr>
                        <th scope="row" class="table-secondary">Razón Social</td>
                        <td>La Giralda</td>
                    </tr>
                    <tr>
                        <th scope="row" class="table-secondary">Razón Social</td>
                        <td>La Giralda</td>
                    </tr>
                    <tr>
                        <th scope="row" class="table-secondary">Razón Social</td>
                        <td>La Giralda</td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </div>
</section>

<?php include_once PATH_VIS . "includes/footer.php"; ?>