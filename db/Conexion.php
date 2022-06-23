<?php

namespace DB;
use PDO;
use Exception;

class Conexion
{
    public static function conectar()
    {
        try {
            $conexion = new PDO('mysql:host=127.0.0.1;dbname=monedas', 'root', 'root', [
                PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ]);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $conexion;
    }
}
