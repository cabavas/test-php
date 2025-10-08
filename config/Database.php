<?php

class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = 'root';
    const DATABASE = 'db';

    public static $connection;
    public static function getConnection() {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DATABASE;
        try {
            self::$connection = new PDO($dsn, self::USER, self::PASSWORD);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$connection;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}