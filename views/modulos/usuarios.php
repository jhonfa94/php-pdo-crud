<?php 

// use Controllers\UsuarioController;
// $usuarios = UsuarioController::listarUsuarios();
$usuarios = \Controllers\UsuarioController::listarUsuarios();

?>
<div class="row justify-content-center">
    <div class="col-12 text-center">
        <h3>Lista de usuarios</h3>
    </div>
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
        <a href="registrar-usuario" class="btn btn-primary mb-2">Registrar usuario</a>
        <table class="table table-sm table-bordered table-striped table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if(sizeof($usuarios)>0):  ?>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario['id']; ?></td>
                            <td><?= $usuario['usuario']; ?></td>
                            <td><?= $usuario['nombre']; ?></td>
                            <td><?= $usuario['activo'] == 1 ? 'Activo' : 'Inactivo'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else:?>
                    <tr class="text-center">
                        <td colspan="4">No hay usuarios registrados</td>
                    </tr>
                <?php endif;?>
                
            </tbody>
        </table>
    </div>

</div>