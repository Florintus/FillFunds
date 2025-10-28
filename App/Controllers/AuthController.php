<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Database;
use PDO;

class AuthController extends BaseController
{
    // Показать форму входа
    public function loginForm(): void
    {
        $this->render('auth/login', [
            'title' => 'Вход в систему'
        ]);
    }

    // Обработка входа
    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            $this->render('auth/login', [
                'title' => 'Вход в систему',
                'error' => 'Email и пароль обязательны'
            ]);
            return;
        }

        // Проверяем пользователя в БД
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $this->redirect('/accounts'); // или куда нужно после входа
        } else {
            $this->render('auth/login', [
                'title' => 'Вход в систему',
                'error' => 'Неверный email или пароль'
            ]);
        }
    }

    // Показать форму регистрации
    public function registerForm(): void
    {
        $this->render('auth/register', [
            'title' => 'Регистрация'
        ]);
    }

    // Обработка регистрации
    public function register(): void
    {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $password_confirm = trim($_POST['password_confirm'] ?? '');

        // Валидация
        if ($name === '' || $email === '' || $password === '') {
            $this->render('auth/register', [
                'title' => 'Регистрация',
                'error' => 'Все поля обязательны'
            ]);
            return;
        }

        if ($password !== $password_confirm) {
            $this->render('auth/register', [
                'title' => 'Регистрация',
                'error' => 'Пароли не совпадают'
            ]);
            return;
        }

        // Проверяем, существует ли пользователь
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        if ($stmt->fetch()) {
            $this->render('auth/register', [
                'title' => 'Регистрация',
                'error' => 'Пользователь с таким email уже существует'
            ]);
            return;
        }

        // Создаем пользователя
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $db->prepare("INSERT INTO users (username, email, password_hash, created_at) VALUES (:username, :email, :password_hash, NOW())");
        $success = $stmt->execute([
            'username' => $name,
            'email' => $email,
            'password_hash' => $hashedPassword
        ]);
        $success = $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        if ($success) {
            $_SESSION['success'] = 'Регистрация успешна! Теперь можете войти.';
            $this->redirect('/login');
        } else {
            $this->render('auth/register', [
                'title' => 'Регистрация',
                'error' => 'Ошибка при регистрации'
            ]);
        }
    }

    // Выход
    public function logout(): void
    {
        session_destroy();
        $this->redirect('/');
    }
}