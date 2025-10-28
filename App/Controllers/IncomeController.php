<?php
namespace App\Controllers;

use App\Models\Income;
use App\Models\Account;
use Core\BaseController;

$pageCSS = ['/css/pages/home.css'];

class IncomeController extends BaseController
{
    public function index(): void
    {
        $income = new Income();
        $incomes = $income->getAll();

        $this->render('income/index', [
            'incomes' => $incomes,
        ]);
    }

    public function createForm(): void
    {
        $accountModel = new Account();
        $accounts = $accountModel->getAll();

        $this->render('income/create', [
            'accounts' => $accounts
        ]);
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
            $accountModel = new Account();
            $accounts = $accountModel->getAll();
            
            $this->render('income/create', [
                'accounts' => $accounts,
                'error' => 'Поля "Счет", "Категория", "Сумма" и "Дата" обязательны',
                'old_data' => $_POST // Сохраняем введенные данные
            ]);
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

        $this->redirect('/incomes');
    }

    public function delete(): void
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $income = new Income();
            $income->delete($id);
        }
        $this->redirect('/incomes');
    }
}