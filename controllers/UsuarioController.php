<?php

namespace Controllers;

use Models\Usuario;

class UsuarioController
{
    /**
     * Obtener lista de usuarios del modelo
     *
     * @return array
     */
    public static function listarUsuarios(): array
    {
        return Usuario::usuarios();
    }

    public static function registrarUsuario()
    {
        if (
            isset($_POST['usuario']) && strlen($_POST['usuario']) > 0 &&
            isset($_POST['nombre']) && strlen($_POST['nombre']) > 0 &&
            isset($_POST['clave']) && strlen($_POST['clave']) > 0 &&
            isset($_POST['estado']) && strlen($_POST['estado']) > 0
        ) {
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $clave = $_POST['clave'];
            $estado = $_POST['estado'];

            # PROCESO DE ENCRYPTAR LA CLAVE
            $claveHash = password_hash($clave, PASSWORD_DEFAULT);

            $datos = [
                'usuario' => $usuario,
                'nombre' => $nombre,
                'clave' => $claveHash,
                'activo' => $estado,
            ];

            $registrar = Usuario::crearUsuario($datos);
            // var_dump($registrar);
            if ($registrar > 0) {
                echo "Usuario registrado correctamente";
                echo "
                    <script>
                        setTimeout(() => {
                            window.location = 'usuarios'
                        }, 3000);
                    </script>
                ";
            } else {
                echo "Problemas al registrar el usuario";
            }
        }
    }

    public static function login()
    {

        if (
            isset($_POST['usuario'])  && strlen($_POST['usuario']) > 0 &&
            isset($_POST['clave']) && strlen($_POST['clave']) > 0
        ) {
            // OBTENEMOS LA INFORMACIÓN DEL USUARIO DE LA DB
            $datos = [
                'usuario' => $_POST['usuario']
            ];
            $info = Usuario::infoUsuario($datos);
            // echo count($info);
            // var_dump($info);
            if (count($info) > 0) {

                $passInfoHash = $info['clave']; // CLAVE HASH DE LA BASE DE DATOS

                if (password_verify($_POST['clave'], $passInfoHash)) {
                    $_SESSION['iniciarSesion'] = 'ok';
                    $_SESSION['usuario'] = $_POST['usuario'];
                    $_SESSION['nombre'] = $info['nombre'];
                    echo "
                        <script>
                                window.location = 'paises'                   
                        </script>
                    ";
                } else {
                    echo "El usuario y la clave no coinciden";
                }
            } else {
                echo "El usuario y la clave no coinciden";
            }
        }
    }
}
