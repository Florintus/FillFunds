<?php
namespace App\Models;

use PDO;
use Core\Database;

class Category
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(string $name, string $type): void
    {
        $stmt = $this->db->prepare('INSERT INTO categories (name, type) VALUES (:name, :type)');
        $stmt->execute([':name' => $name, ':type' => $type]);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllByType(string $type): array
    {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE type = :type ORDER BY id DESC');
        $stmt->execute([':type' => $type]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function update(int $id, string $name): void
    {
        $stmt = $this->db->prepare('UPDATE categories SET name = :name WHERE id = :id');
        $stmt->execute([':id' => $id, ':name' => $name]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM categories WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
}
