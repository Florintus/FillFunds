<?php

namespace App\Controllers;

use PDO;
use App\Models\User;
use App\Middleware\AuthMiddleware;
use Config\AppConfig;

class AuthController
{
    private PDO $pdo;
    private User $userModel;

    public function __construct()
    {
        //$dbHost = AppConfig::get('db.host', 'default_host');
        //$debug = AppConfig::get('app.debug', false);
        $dsn = 'pgsql:host=127.127.126.13;port=5432;dbname=FinancyBD';
        $dbUser = 'florintus';
        $dbPass = '12345';

        $this->pdo = new PDO($dsn, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $this->userModel = new User($this->pdo);
    }

    public function login()
    {
        AuthMiddleware::requireGuest();
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($username === '' || $password === '') {
                $error = 'Пожалуйста, заполните все поля.';
            } else {
                $user = $this->userModel->findByUsername($username);
                if ($user && password_verify($password, $user['password_hash'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: /');
                    exit;
                } else {
                    $error = 'Неверный логин или пароль.';
                }
            }
        }

        // Подключаем view, передаём $error
        require __DIR__ . '/../views/login.php';
    }

    public function register()
    {
        AuthMiddleware::requireGuest();
        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $password_confirm = $_POST['password_confirm'] ?? '';

            if ($username === '' || $email === '' || $password === '' || $password_confirm === '') {
                $error = 'Пожалуйста, заполните все поля.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Введите корректный email.';
            } elseif ($password !== $password_confirm) {
                $error = 'Пароли не совпадают.';
            } elseif ($this->userModel->findByUsername($username) !== null) {
                $error = 'Пользователь с таким логином уже существует.';
            } elseif ($this->userModel->findByEmail($email) !== null) {
                $error = 'Пользователь с таким email уже существует.';
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $created = $this->userModel->create($username, $email, $password_hash);

                if ($created) {
                    $success = 'Регистрация прошла успешно! Теперь вы можете <a href="/login">войти</a>.';
                } else {
                    $error = 'Ошибка при регистрации. Попробуйте позже.';
                }
            }
        }

        require __DIR__ . '/../views/register.php';
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: /login');
        exit;
    }
}
