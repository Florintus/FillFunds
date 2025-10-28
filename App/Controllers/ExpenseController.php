<?php
namespace App\Controllers;

use App\Models\Expense;
use App\Models\Account;
use Core\BaseController;

class ExpenseController extends BaseController
{
    public function index(): void
    {
        $expense = new Expense();
        $expenses = $expense->getAll();

        $this->render('expense/index', [
            'expenses' => $expenses
        ]);
    }

    public function createForm(): void
    {
        $accountModel = new Account();
        $accounts = $accountModel->getAll();

        $this->render('expense/create', [
            'accounts' => $accounts
        ]);
    }

    public function store(): void
    {
        $name = trim($_POST['name'] ?? '');
        $amount = floatval($_POST['amount'] ?? 0);
        $date = trim($_POST['date'] ?? '');
        $note = trim($_POST['note'] ?? '');

        if ($name === '' || $amount <= 0 || $date === '') {
            $accountModel = new Account();
            $accounts = $accountModel->getAll();
            
            $this->render('expense/create', [
                'accounts' => $accounts,
                'error' => 'Все поля обязательны для заполнения',
                'old_data' => $_POST // Сохраняем введенные данные
            ]);
            return;
        }

        $expense = new Expense();
        $expense->create($name, $amount, $date, $note);

        $this->redirect('/expenses');
    }

    public function delete(): void
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $expense = new Expense();
            $expense->delete($id);
        }
        $this->redirect('/expenses');
    }
}