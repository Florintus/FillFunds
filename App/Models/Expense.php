<?php

namespace App\Models;

use Core\Database;
use PDO;
use PDOException;
use Exception;


class Expense {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query('SELECT * FROM expenses ORDER BY date DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($amount, $category, $description, $date) {
    try {
        $stmt = $this->db->prepare('INSERT INTO expenses (amount, category, description, date) 
                                    VALUES (:amount, :category, :description, :date)');
        $success = $stmt->execute([
            ':amount' => $amount,
            ':category' => $category,
            ':description' => $description,
            ':date' => $date,
        ]);
        
        if (!$success) {
            $errorInfo = $stmt->errorInfo();
            die('Ошибка выполнения запроса: ' . $errorInfo[2]);
        }

        return true;

    } catch (PDOException $e) {
        die('Ошибка при добавлении расхода: ' . $e->getMessage());
    }
}

public function showeditform($id) {
    $stmt = $this->db->prepare('SELECT * FROM expenses WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $expense = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$expense) {
        throw new Exception('Расход не найден');
    }

    return $expense;
}
public function handleEdit($id) {
    $amount = $_POST['amount'] ?? null;
    $category = $_POST['category'] ?? null;
    $description = $_POST['description'] ?? '';
    $date = $_POST['date'] ?? null;

    if (!$amount || !$category || !$date) {
        throw new Exception("Пожалуйста, заполните все обязательные поля.");
    }

    $stmt = $this->db->prepare('UPDATE expenses SET amount = :amount, category = :category, 
                                description = :description, date = :date WHERE id = :id');
    $success = $stmt->execute([
        ':amount' => $amount,
        ':category' => $category,
        ':description' => $description,
        ':date' => $date,
        ':id' => $id,
    ]);

    if (!$success) {
        throw new Exception('Ошибка при обновлении расхода.');
    }

    return true;
}


public function getLogs() {
    $stmt = $this->db->query('SELECT * FROM expenses_log ORDER BY changed_at DESC');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}