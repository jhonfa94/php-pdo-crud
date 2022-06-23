<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="views/plugins/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="views/plugins/datatables/jquery.dataTables.min.css">

    <title>Monedas</title>

    <!-- JS -->
    <!-- <script src="views/plugins/bootstrap/jquery.slim.min.js"></script> -->
    <script src="views/plugins/jquery/jquery-3.6.0.min.js"></script>
    <script src="views/plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <!-- MENU DE NAVEGACION  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/monedas">
                <?= isset($_SESSION['nombre']) ? "Bievenido " .  $_SESSION['nombre'] : 'Monedas SAS'?>


            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_SESSION['iniciarSesion']) == 'ok') :
            ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="monedas">Monedas <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="paises">Paises</a>
                        <a class="nav-link" href="usuarios">Usuarios</a>
                        <a class="nav-link" href="salir">Salir</a>
                    </div>
                </div>
            <?php endif; ?>
        </nav>

        <?php
        // var_dump($_SESSION);
        ?>

        <!-- CONTENIDO DE LA PAGINA -->
        <?php
        if (isset($_SESSION['iniciarSesion']) == 'ok') {
            if (isset($_GET['ruta'])) {
                $rutas = explode('/', $_GET['ruta']);
                // var_dump($rutas);
                $ruta = $rutas[0];
                // echo "$ruta";
                if (
                    $ruta == 'monedas' ||
                    $ruta == 'usuarios' ||
                    $ruta == 'registrar-usuario' ||
                    $ruta == 'salir' ||
                    $ruta == 'paises'
                ) {
                    include "modulos/{$ruta}.php";
                } else {
                    include 'modulos/error/404.php';
                }
            } else {
                include "modulos/login.php";
            }
        } else if (isset($_GET['ruta']) && $_GET['ruta'] == 'salir') {
            include 'modulos/salir.php';
        } else {
            include "modulos/login.php";
        }

        ?>



    </div>










</body>

</html>