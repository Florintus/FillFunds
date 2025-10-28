<?php

namespace App\Controllers;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Account;
use App\Models\Category;
use Core\BaseController;

class HomeController extends BaseController
{
    public function index(): void
    {
        $expenseModel = new Expense();
        $incomeModel = new Income();
        $accountModel = new Account();
        $categoryModel = new Category();

         $pageScripts = [
        '/js/core/app.js',
        '/js/components/chart.js',
        '/js/pages/home.js'
    ];

        $this->render('home', [
            'totalExpenses' => $expenseModel->getTotalAmount(),
            'totalIncomes' => $incomeModel->getTotalAmount(),
            'accounts' => $accountModel->getAll(),
            'categories' => $categoryModel->getAll(),
        ]);
    }

    public function quickAddExpense(): void
    {
        // Валидация и получение данных
        $amount = floatval($_POST['amount'] ?? 0);
        $description = trim($_POST['description'] ?? '');
        $category_id = intval($_POST['category_id'] ?? 0);
        $account_id = intval($_POST['account_id'] ?? 0);
        $date = trim($_POST['date'] ?? date('Y-m-d'));
        $note = ''; // Передаем пустую заметку, как в вашем исходном коде

        if ($amount <= 0 || $description === '' || $category_id === 0 || $account_id === 0) {
            $_SESSION['error'] = 'Сумма, описание, категория и счет обязательны для заполнения.';
            $this->redirect('/');
            return;
        }

        $expenseModel = new Expense();
        // Исправленный вызов метода create
        $success = $expenseModel->create($description, $amount, $date, $note, $category_id, $account_id);

        if ($success) {
            $_SESSION['success'] = 'Расход успешно добавлен';
        } else {
            $_SESSION['error'] = 'Ошибка при добавлении расхода';
        }

        $this->redirect('/');
    }

    /**
     * API метод для получения данных графика (AJAX)
     */
    public function getChartData(): void
    {
        $period = $_GET['period'] ?? 'month'; // month, quarter, year
        $type = $_GET['type'] ?? 'both';     // income, expense, both

        $data = $this->prepareChartData($period, $type);
        
        $this->json($data);
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

        // Определяем количество месяцев для периода
        $monthsCount = match ($period) {
            'quarter' => 3,
            'year' => 12,
            default => 1,
        };

        // Формируем лейблы для оси X. Они должны генерироваться так же,
        // как и данные в моделях - от старого к новому.
        for ($i = $monthsCount - 1; $i >= 0; $i--) {
            $data['labels'][] = date('M Y', strtotime("-{$i} month"));
        }

        // Получаем данные из моделей
        if ($type === 'income' || $type === 'both') {
            $data['datasets'][] = [
                'label' => 'Доходы',
                'data' => $incomeModel->getDataForChart($period),
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 2,
                'tension' => 0.1 // Делает линию более плавной
            ];
        }

        if ($type === 'expense' || $type === 'both') {
            $data['datasets'][] = [
                'label' => 'Расходы',
                'data' => $expenseModel->getDataForChart($period),
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 2,
                'tension' => 0.1 // Делает линию более плавной
            ];
        }

        return $data;
    }
}