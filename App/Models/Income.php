<?php

namespace App\Models;

use PDO;
use Core\Database;

class Income
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM incomes ORDER BY date DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): void
    {
        $stmt = $this->db->prepare("
            INSERT INTO incomes 
                (account, category, subcategory, quantity, unit, amount, date)
            VALUES 
                (:account, :category, :subcategory, :quantity, :unit, :amount, :date)
        ");

        $stmt->execute([
            ':account' => $data['account'],
            ':category' => $data['category'],
            ':subcategory' => $data['subcategory'] ?? null, // если может быть null
            ':quantity' => $data['quantity'] ?? 1.0, // значение по умолчанию
            ':unit' => $data['unit'],
            ':amount' => $data['amount'],
            ':date' => $data['date'],
        ]);
    }
    
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM incomes WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

}