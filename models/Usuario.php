<?php

namespace Models;

use DB\Conexion;

class Usuario
{

    /**
     * Lista de usuarios
     *
     * @return array
     */
    public static function usuarios(): array
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, usuario, nombre, activo FROM usuario");
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll() : [];
        $stmt->closeCursor();
        return $retorno;
    }

    /**
     * INFORMACION DEL USUARIO
     *
     * @param array $datos
     * @return array
     */
    public static function infoUsuario(array $datos): array
    {
        $stmt = Conexion::conectar()->prepare("SELECT usuario, nombre, activo, clave 
            FROM usuario
            WHERE usuario = :usuario AND activo = 1
        ");
        $stmt->bindParam(":usuario", $datos['usuario']);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch() : [];
        $stmt->closeCursor();
        return $retorno;
    }

    
    public static function crearUsuario(array $datos)
    {
        $conexion = Conexion::conectar();
        $insert = $conexion->prepare("INSERT INTO usuario (Usuario, Nombre, Clave, Activo) 
            VALUES (:usuario, :nombre, :clave, :activo)
        ");
        $insert->bindParam(":usuario", $datos['usuario']);
        $insert->bindParam(":nombre", $datos['nombre']);
        $insert->bindParam(":clave", $datos['clave']);
        $insert->bindParam(":activo", $datos['activo']);
        $insert->execute();
        $idInsert = $conexion->lastInsertId();
        $retorno = $idInsert != 0 ? $idInsert : 0;
        $insert->closeCursor();
        return $retorno;
    }
}
