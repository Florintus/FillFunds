<?php

namespace App\Models;

use PDO;
use Core\Database;

class Account
{
    private PDO $db;

    public function __construct()
    {
         $this->db = Database::getInstance()->getConnection();
    }

    public function create(string $name, float $initial_balance, string $note = ''): void
    {
        $stmt = $this->db->prepare('
            INSERT INTO accounts (name, initial_balance, note)
            VALUES (:name, :initial_balance, :note)
        ');
        $stmt->execute([
            ':name' => $name,
            ':initial_balance' => $initial_balance,
            ':note' => $note
        ]);
    }

    public static function getAll(): array
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM accounts ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}