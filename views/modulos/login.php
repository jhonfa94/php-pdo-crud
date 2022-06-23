<?php
    // var_dump($_SESSION);
 ?>
<div class="row justify-content-center">
    <div class="col-12 text-center">
        <h3>Incio de sesión</h3>
    </div>
    <div class="col-12 col-md-6 col-lg-4">       

        <form method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input id="usuario" class="form-control" type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="clave">Clave</label>
                <input id="clave" class="form-control" type="password" name="clave" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Iniciar sesión
                </button>
            </div>
        </form>
            <?php 
                // var_dump($_POST);
            \Controllers\UsuarioController::login();?>

    </div>
</div>