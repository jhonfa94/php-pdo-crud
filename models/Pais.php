<?php 
namespace Models;

use DB\Conexion;

class Pais
{
    public static function paises():array
    {
        $stmt = Conexion::conectar()->prepare("CALL spListarPaises();");
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll() : [];
        $stmt->closeCursor();
        return $retorno;
       
    }
}

?>