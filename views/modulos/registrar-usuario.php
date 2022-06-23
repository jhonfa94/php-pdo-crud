
<div class="row justify-content-center">
    <div class="col-12 text-center">
        <h3>Registrar Usuario</h3>
    </div>

    <div class="col-12 sm-10 col-md-8 col-lg-4">
        <form method="post" action="">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input id="usuario" class="form-control" type="text" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input id="nombre" class="form-control" type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input id="clave" class="form-control" type="password" name="clave" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="estado" class="form-control" name="estado" required>
                    <option value="1" selected>Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </div>
        </form>
        <?php 
            \Controllers\UsuarioController::registrarUsuario();
        ?>
    </div>



</div>