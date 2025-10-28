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
        public function getTotalAmount(): float
    {
        $stmt = $this->db->query("SELECT SUM(amount) FROM incomes");
        return $stmt->fetchColumn() ?: 0.0;
    }

    /**
     * Готовит данные по доходам для графика.
     * Возвращает массив сумм по месяцам за выбранный период.
     */
    public function getDataForChart(string $period): array
    {
        $interval = match ($period) {
            'quarter' => '3 MONTH',
            'year' => '12 MONTH',
            default => '1 MONTH',
        };

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
                COALESCE(SUM(i.amount), 0) as total
            FROM months m
            LEFT JOIN incomes i ON TO_CHAR(i.date, 'YYYY-MM') = m.month_key
            GROUP BY m.month_key
            ORDER BY m.month_key ASC;
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}