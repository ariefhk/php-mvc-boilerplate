<?php

namespace App\Config;

use \PDO;

class Database
{
    private static ?PDO $pdo = null;

    private static function getDatabaseConfig(): array
    {
        return [
            "database" => [
                "test" => [
                    "url" => 'mysql:host=localhost;dbname=user_management',
                    "username" => "root",
                    "password" => ""
                ],
                "prod" => []
            ]
        ];
    }

    public static function getConnection(string $env = "test"): ?PDO
    {
        if (self::$pdo == null) {
            $config = self::getDatabaseConfig();

            self::$pdo = new PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password'],
            );
        }
        return self::$pdo;
    }

    public static function beginTransaction()
    {
        self::$pdo->beginTransaction();
    }

    public static function commitTransaction()
    {
        self::$pdo->commit();
    }

    public static function rollbackTransaction()
    {
        self::$pdo->rollBack();
    }
}
