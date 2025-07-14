<?php

namespace Core;

use PDO;
use PDOException;
use Config\Config;

class Database {
    private static ?Database $instance = null;
    private PDO $pdo;
    
    private function __construct() {
        $host = Config::get('db.host');
        $port = Config::get('db.port');
        $dbname = Config::get('db.dbname');
        $user = Config::get('db.user');
        $password = Config::get('db.password');

        $dsn = "pgsql:host={$host};port={$port};dbname={$dbname}";

        try {
            $this->pdo = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            die('Ошибка подключения к базе: ' . $e->getMessage());
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
