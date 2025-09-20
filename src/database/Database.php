<?php

require_once __DIR__ . '/../config/config.php';

class Database
{

    private static $connection;

    private static $host = DB_HOST;
    private static $banco = DB_NAME;
    private static $user = DB_USER;
    private static $pass = DB_PASSWORD;

    public static function getConnection(): PDO
    {
        if (!isset(self::$connection)) {

            try {
                $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$banco;
                self::$connection = new PDO($dsn, self::$user, self::$pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                self::$connection->exec("set names utf8");
            } catch (PDOException $exception) {
                throw $exception;
            }
        }

        return self::$connection;
    }
}