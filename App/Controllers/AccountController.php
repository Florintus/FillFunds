<?php
namespace App\Controllers;

use App\Models\Account;
use Core\BaseController;

class AccountController extends BaseController
{
    public function createForm(): void
    {
        require_once __DIR__ . '/../Views/account/create.php';
    }

    public function store(): void
    {
        $name = trim($_POST['name'] ?? '');
        $initial_balance = floatval($_POST['initial_balance'] ?? 0);
        $note = trim($_POST['note'] ?? '');

        if ($name === '') {
            $error = 'Название счёта обязательно';
            require_once __DIR__ . '/../Views/account/create.php';
            return;
        }

        // Правильно: создаём объект модели и вызываем метод create
        $account = new Account();
        $account->create($name, $initial_balance, $note);

        header('Location: /accounts');
        exit;
    }
    
    public function index(): void
    {
        $account = new Account();
        $accounts = $account->getAll();

        require_once __DIR__ . '/../Views/account/index.php';
    }
}