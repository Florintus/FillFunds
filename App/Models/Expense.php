<?php

namespace App\Models;

require_once __DIR__ . '/../../core/Database.php';

// Ensure the Database class is loaded before using it

use Core\Database;
use PDO;
use PDOException;
use Exception;


class Expense {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() 
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM expenses ORDER BY date DESC');
        $stmt->execute();
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


    public function getLogs() 
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM expenses_log ORDER BY changed_at DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $amount, $date, $note = ''): void {
        $stmt = $this->db->prepare('
            INSERT INTO expenses (name, amount, date, note)
            VALUES (:name, :amount, :date, :note)
        ');
        $stmt->execute([
            ':name' => $name,
            ':amount' => $amount,
            ':date' => $date,
            ':note' => $note
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM expenses WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
     public function getTotalAmount(): float
    {
        $stmt = $this->db->query("SELECT SUM(amount) FROM expenses");
        return $stmt->fetchColumn() ?: 0.0;
    }

    /**
     * Готовит данные по расходам для графика.
     * Возвращает массив сумм по месяцам за выбранный период.
     */
    public function getDataForChart(string $period): array
    {
        $interval = match ($period) {
            'quarter' => '3 MONTH',
            'year' => '12 MONTH',
            default => '1 MONTH',
        };
        
        // Этот запрос строит серию месяцев за нужный период (даже если по ним нет данных)
        // и присоединяет к ней реальные данные о расходах.
        // Это гарантирует, что на графике будут все месяцы, а для пустых будет 0.
        $sql = "
            WITH months AS (
                SELECT TO_CHAR(m, 'YYYY-MM') as month_key
                FROM generate_series(
                    DATE_TRUNC('month', NOW() - INTERVAL '$interval' + INTERVAL '1 month'),
                    DATE_TRUNC('month', NOW()),
                    '1 month'::interval
                ) as m
            )
            SELECT
                COALESCE(SUM(e.amount), 0) as total
            FROM months m
            LEFT JOIN expenses e ON TO_CHAR(e.date, 'YYYY-MM') = m.month_key
            GROUP BY m.month_key
            ORDER BY m.month_key ASC;
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        // Возвращаем только массив значений
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}