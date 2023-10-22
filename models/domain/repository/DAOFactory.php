<?php

namespace app\models\domain\repository;

use app\models\domain\repository\ProductoDAO;

class DAOFactory {

    public static function getProductoDAO() : ProductoDAO{
        return new ProductoDAO();
    }

    public static function getUsuarioDAO() : UsuarioDAO{
        return new UsuarioDAO();
    }

}