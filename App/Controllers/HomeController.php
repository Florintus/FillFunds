<?php

namespace App\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Account;
use App\Models\Category;

class HomeController
{
    // Отображение главной страницы с основными метриками
    public function index(): void
    {
        // Получаем данные для дашборда
        $expenseModel = new Expense();
        $incomeModel = new Income();
        $accountModel = new Account();
        $categoryModel = new Category();

        // Счета для быстрых действий
        $accounts = $accountModel->getAll();
        $categories = $categoryModel->getAll();

        // Передаем данные в представление
        require __DIR__ . '/../Views/home.php';
    }

    public function quickAddExpense(): void
    {
        $amount = floatval($_POST['amount'] ?? 0);
        $description = trim($_POST['description'] ?? '');
        $category_id = intval($_POST['category_id'] ?? 0);
        $account_id = intval($_POST['account_id'] ?? 0);
        $date = trim($_POST['date'] ?? date('Y-m-d'));

        if ($amount <= 0 || $description === '') {
            $_SESSION['error'] = 'Сумма и описание обязательны для заполнения';
            header('Location: /');
            exit;
        }

        $expenseModel = new Expense();
        $success = $expenseModel->create($description, $amount, $date, '', $category_id, $account_id);

        if ($success) {
            $_SESSION['success'] = 'Расход успешно добавлен';
        } else {
            $_SESSION['error'] = 'Ошибка при добавлении расхода';
        }

        header('Location: /');
        exit;
    }

    /**
     * API метод для получения данных графика (AJAX)
     */
    public function getChartData(): void
    {
        header('Content-Type: application/json');

        $period = $_GET['period'] ?? 'month'; // month, quarter, year
        $type = $_GET['type'] ?? 'both'; // income, expense, both

        $data = $this->prepareChartData($period, $type);
        
        echo json_encode($data);
        exit;
    }

    /**
     * Подготовка данных для графика
     */
    private function prepareChartData(string $period, string $type): array
    {
        $expenseModel = new Expense();
        $incomeModel = new Income();

        $data = [
            'labels' => [],
            'datasets' => []
        ];

        // Определяем период
        switch ($period) {
            case 'quarter':
                $months = 3;
                break;
            case 'year':
                $months = 12;
                break;
            default:
                $months = 1;
                break;
        }

        // Формируем лейблы и данные
        for ($i = $months - 1; $i >= 0; $i--) {
            $date = date('Y-m', strtotime("-{$i} month"));
            $data['labels'][] = date('M Y', strtotime($date . '-01'));
        }

        return $data;
    }
}
