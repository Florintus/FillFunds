<?php
namespace Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $pdo;
    
    private function __construct() {

        $dsn = 'pgsql:host=127.127.126.13;port=5432;dbname=FinancyBD';
                $dbUser = 'florintus';
                $dbPass = '12345';
        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (PDOException $e) {
            die('Ошибка подключения к базе: ' . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}
