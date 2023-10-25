<?php

namespace app\models\domain\repository;

use app\models\domain\repository\ProductoDAO;
use app\models\domain\repository\EsterilizacionDAO;
class DAOFactory {

    // Productos

    public static function getProductoDAO() : ProductoDAO{
        return new ProductoDAO();
    }

    //Usuarios

    public static function getUsuarioDAO() : UsuarioDAO{
        return new UsuarioDAO();
    }

    // Esterilizacion

    public static $esterilizacionDAO = EsterilizacionDAO::class;

    public static function getEsterilizacionDAO() : EsterilizacionDAO{
        return new self::$esterilizacionDAO();
    }



}