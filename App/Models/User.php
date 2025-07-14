<?php

namespace App\Models;

use Core\Database;
use PDO;

class User
{
    private PDO $db;

    public function __construct()
    {
         $this->db = Database::getInstance()->getConnection();
    }

    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(string $username, string $email, string $password_hash): bool
    {
        $stmt = $this->db->prepare('INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)');
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password_hash' => $password_hash,
        ]);
    }
}
