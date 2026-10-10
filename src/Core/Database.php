<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null; // Aqui a variavel só pode ser do tipo objeto PDO ou null

    public static function getConnection()
    {
        try {
            if (!self::$instance) {
                self::$instance = new PDO(
                    $_ENV['DB_CONNECTION'] . ":host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS']
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo 'Não foi possivel conectar ao banco!: ',  $e->getMessage(), "\n";
        }

        return self::$instance;
    }
}
