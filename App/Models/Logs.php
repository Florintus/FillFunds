<?php
namespace App\Models;
use Core\Database;
use PDO;

class Logs {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll() 
    {
        $pdo = Database::getInstance()->getConnection();
        $stmt = $pdo->prepare('SELECT * FROM expenses_log ORDER BY changed_at DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->db->prepare('SELECT * FROM expenses WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $expense = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($expense) {
            $log = $this->db->prepare('
                INSERT INTO expenses_log (expense_id, operation, old_amount, old_category, old_description, old_date)
                VALUES (:expense_id, :operation, :amount, :category, :description, :date)
            ');
            $log->execute([
                ':expense_id' => $expense['id'],
                ':operation' => 'delete',
                ':amount' => $expense['amount'],
                ':category' => $expense['category'],
                ':description' => $expense['description'],
                ':date' => $expense['date'],
            ]);

            $del = $this->db->prepare('DELETE FROM expenses WHERE id = :id');
            return $del->execute([':id' => $id]);
        }

        return false;
    }

    public function findById($id) {
        $stmt = $this->db->prepare('SELECT * FROM expenses WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $amount, $category, $description, $date) {
        // 1. Получаем текущую версию расхода
        $stmt = $this->db->prepare('SELECT * FROM expenses WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $oldExpense = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$oldExpense) {
            return false;
        }

        // 2. Сохраняем старые данные в лог
         $log = $this->db->prepare('
            INSERT INTO expenses_log (
                expense_id, operation,
                old_amount, old_category, old_description, old_date,
                new_amount, new_category, new_description, new_date
            )
            VALUES (
                :expense_id, :operation,
                :old_amount, :old_category, :old_description, :old_date,
                :new_amount, :new_category, :new_description, :new_date
            )
        ');
        $log->execute([
            ':expense_id' => $oldExpense['id'],
            ':operation' => 'update',

            ':old_amount' => $oldExpense['amount'],
            ':old_category' => $oldExpense['category'],
            ':old_description' => $oldExpense['description'],
            ':old_date' => $oldExpense['date'],

            ':new_amount' => $amount,
            ':new_category' => $category,
            ':new_description' => $description,
            ':new_date' => $date,
        ]);

        // 3. Обновляем данные
        $update = $this->db->prepare('
            UPDATE expenses 
            SET amount = :amount, category = :category, description = :description, date = :date 
            WHERE id = :id
        ');

        return $update->execute([
            ':amount' => $amount,
            ':category' => $category,
            ':description' => $description,
            ':date' => $date,
            ':id' => $id,
        ]);
    }
}