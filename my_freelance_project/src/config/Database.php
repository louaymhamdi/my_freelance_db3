<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            $host = '127.0.0.1';
            $port = 5432;
            $dbname = 'my_freelance_db';
            $user = 'postgres';
            $pass = '1234';


            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
            try {
                self::$instance = new PDO($dsn, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("DB Connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}
