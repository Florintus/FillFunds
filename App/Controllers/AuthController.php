<?php

namespace App\Controllers;

use App\Models\User;
use App\Middleware\AuthMiddleware;
use App\Services\CSRFService;
use Error;

class AuthController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    // --- Вход ---
    public function showLoginForm()
    {
        AuthMiddleware::requireGuest();
        $error = '';
        require __DIR__ . '/../views/login.php';
    }

    public function processLogin()
    {
        AuthMiddleware::requireGuest();
        $error = '';

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            $error = 'CSRF защита: недопустимый токен.';
        } elseif ($username === '' || $password === '') {
            $error = 'Пожалуйста, заполните все поля.';
        } else {
            $user = $this->userModel->findByUsername($username);
            if ($user && password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /');
                exit;
            } else {
                $error = 'Неверный логин или пароль.';
            }
        }

        require __DIR__ . '/../views/login.php';
    }

    // --- Регистрация ---
    public function showRegisterForm()
    {
        AuthMiddleware::requireGuest();
        $error = '';
        $success = '';
        require __DIR__ . '/../views/register.php';
    }

    public function processRegister()
    {
        AuthMiddleware::requireGuest();
        $error = '';
        $success = '';

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['password_confirm'] ?? '';

        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            $error = 'CSRF защита: недопустимый токен.';
        } elseif ($username === '' || $email === '' || $password === '' || $password_confirm === '') {
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

        require __DIR__ . '/../views/register.php';
    }

    // --- Выход ---
    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header('Location: /login');
        exit;
    }
}