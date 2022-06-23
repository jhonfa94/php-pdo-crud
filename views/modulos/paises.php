<?php

$paises = \Controllers\PaisController::listarPaises();
// var_dump($paises);
?>
<div class="row justify-content-center">
    <div class="col-12 text-center">
        <h3>Lista de paises</h3>
    </div>
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">
        <table class="table table-sm table-bordered table-striped table-hover" id="tblPaises">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Pais</th>
                    <th>CodigoAlfa2</th>
                    <th>CodigoAlfa3</th>
                    <th>Moneda</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                <?php if (sizeof($paises) > 0) :  ?>
                    <?php foreach ($paises as $key =>  $pais) : ?>
                        <tr>
                            <td><?= $key += 1; ?></td>
                            <td><?= $pais['Pais']; ?></td>
                            <td><?= $pais['CodigoAlfa2']; ?></td>
                            <td><?= $pais['CodigoAlfa3']; ?></td>
                            <td><?= $pais['Moneda']; ?></td>
                            <td><?= $pais['Sigla']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr class="text-center">
                        <td colspan="5">No hay paises disponibles para la consulta</td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>

</div>

<script defer>
    $(document).ready(function() {
        $('#tblPaises').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },

        });
    });
</script>