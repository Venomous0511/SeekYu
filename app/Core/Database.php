<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $connection = null;

    public static function connect($host, $dbname, $user, $pass)
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                error_log($e->getMessage(), 3, __DIR__ . '/../../logs/db_errors.log');
                die("Database connection failed.");
            }
        }
        return self::$connection;
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}
