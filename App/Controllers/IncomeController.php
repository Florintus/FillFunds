<?php
namespace App\Controllers;

use App\Models\Income;
use App\Models\Account;

class IncomeController
{
    public function index(): void
    {
        $income = new Income();
        $incomes = $income->getAll();

        require_once __DIR__ . '/../Views/income/index.php';
    }

    public function createForm(): void
    {
        $accountModel = new Account();
        $accounts = $accountModel->getAll(); // Получаем все счета

        require __DIR__ . '/../Views/income/create.php'; // Передаем $accounts в представление
    }

    public function create()
    {
        $accounts = new Account ();
        require_once __DIR__ . '/../Views/incomes/create.php';
    }

    public function store(): void
    {
        $account = trim($_POST['account'] ?? '');
        $category = trim($_POST['category'] ?? '');
        $subcategory = trim($_POST['subcategory'] ?? '');
        $amount = floatval($_POST['amount'] ?? 0);
        $unit = trim($_POST['unit'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $date = trim($_POST['date'] ?? '');

        if ($account === '' || $category === '' || $amount <= 0 || $date === '') {
            $error = 'Поля "Счет", "Категория", "Сумма" и "Дата" обязательны';
            require_once __DIR__ . '/../Views/income/create.php';
            return;
        }

        $income = new Income();
        $income->create([
            'account' => $account,
            'category' => $category,
            'subcategory' => $subcategory,
            'amount' => $amount,
            'unit' => $unit,
            'description' => $description,
            'date' => $date,
        ]);

        header('Location: /incomes');
        exit;
    }

    public function delete() 
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $income = new Income();
            $income->delete($id);
        }
        header('Location: /incomes');
        exit;
    }
 }
