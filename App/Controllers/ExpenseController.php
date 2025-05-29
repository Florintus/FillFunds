<?php
namespace App\Controllers;

use App\Models\Expense;
use App\Models\Account;

class ExpenseController
{
    public function createForm(): void
    {
        $accountModel = new Account();
        $accounts = $accountModel->getAll(); // Получаем все счета

        require __DIR__ . '/../Views/expense/create.php'; // Передаем $accounts в представление
    }
        
    public function create()
    {
        $accounts = new Account();
        require_once __DIR__ . '/../Views/expenses/create.php';
    }

    public function store(): void
    {
        $name = trim($_POST['name'] ?? '');
        $amount = floatval($_POST['amount'] ?? 0);
        $date = trim($_POST['date'] ?? '');
        $note = trim($_POST['note'] ?? '');

        if ($name === '' || $amount <= 0 || $date === '') {
            $error = 'Все поля обязательны для заполнения';
            require_once __DIR__ . '/../Views/expense/create.php';
            return;
        }

        $expense = new Expense();
        $expense->create($name, $amount, $date, $note);

        header('Location: /expenses');
        exit;
    }

    public function index(): void
    {
        $expense = new \App\Models\Expense();
        $expenses = $expense->getAll();

        require_once __DIR__ . '/../Views/expense/index.php';
    }
}