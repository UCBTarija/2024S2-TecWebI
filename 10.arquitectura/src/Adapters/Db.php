<?php

namespace Ucb\Almacen\Adapters;

use PDO;

class Db{
    public static function getConnection()
    {
        // cadena de conexión. Se puede leer desde un archivo de configuración
        $dsn = "pgsql:host=localhost;port=5432;dbname=almacen";

        // objeto conexión
        $pdo = new PDO($dsn, 'ucb', 'Tarija2024');

        return $pdo;
    }
}