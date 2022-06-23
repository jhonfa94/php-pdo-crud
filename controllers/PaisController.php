<?php 

namespace Controllers;

use Models\Pais;

class PaisController
{
    /**
     * Listar paises
     *
     * @return array
     */
    public static function listarPaises():array
    {
        return Pais::paises();
    }
}
