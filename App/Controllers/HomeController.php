<?php

namespace App\Controllers;

use App\Models\Expense;
use App\Models\Logs;
use App\Middleware\AuthMiddleware;
use App\Services\CsrfService;

// Контроллер
class HomeController {
    public function index() {
        AuthMiddleware::requireLogin(); // не пускаем без авторизации
        $expense = new Expense();
        $expenses = $expense->getAll(); //Получаем расходы из базы данных
        require_once __DIR__ . '/../Views/home.php';
    }

    public function showAddForm() {
        AuthMiddleware::requireLogin();
        require_once __DIR__ . '/../Views/add_expense.php';
    }
    
    public function handleAdd() {
        AuthMiddleware::requireLogin();
        $amount = $_POST['amount'] ?? null;
        $category = $_POST['category'] ?? null;
        $description = $_POST['description'] ?? '';
        $date = $_POST['date'] ?? null;
        
        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            $error = 'CSRF защита: недопустимый токен.';
        } elseif (!$amount || !$category || !$date) {
            $error = "Пожалуйста, заполните все обязательные поля.";
            require_once __DIR__ . '/../Views/add_expense.php';
            return;
        }

        $expense = new Expense();
        $success = $expense->add($amount, $category, $description, $date);

        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            echo 'CSRF защита: недопустимый токен.';
            return;

        } elseif ($success) {
            header('Location: /');
            exit;
        }   else {
            echo "Ошибка при добавлении расхода. Проверь лог.";
        }
    }
    
    public function showEditForm() {
        AuthMiddleware::requireLogin();
        $id = $_GET['id'] ?? null;

        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            echo 'CSRF защита: недопустимый токен.';
            return; 
                       
        } elseif (!$id) {
            echo "ID не указан.";
            return;
        }

        $logsModel = new Logs();
        $expense = $logsModel->findById($id);

        if (!$expense) {
            echo "Расход не найден.";
            return;
        }

        require_once __DIR__ . '/../Views/edit_expense.php';
    }

    public function handleEdit() {
        AuthMiddleware::requireLogin();

        $id = $_POST['id'] ?? null;
        $amount = $_POST['amount'] ?? null;
        $category = $_POST['category'] ?? null;
        $description = $_POST['description'] ?? '';
        $date = $_POST['date'] ?? null;

        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            $error = 'CSRF защита: недопустимый токен.';
        } elseif (!$id || !$amount || !$category || !$date) {
            $error = "Пожалуйста, заполните все обязательные поля.";
            $expense = compact('id', 'amount', 'category', 'description', 'date');
            require_once __DIR__ . '/../Views/edit_expense.php';
            return;
        }

        $logsModel = new Logs();
        $logsModel->update($id, $amount, $category, $description, $date);

        header('Location: /');
        exit;
}

    public function delete() {

        $id = $_POST['id'] ?? null;

        if (!CSRFService::validateToken($_POST['_csrf_token'] ?? '')) {
            $error = 'CSRF защита: недопустимый токен.';
        } elseif ($id) {
            $logsModel = new Logs();
            $logsModel->delete($id);
        }

        header('Location: /');
        exit;
}

    public function showLogs() {
        $logsModel = new Logs();
        $logs = $logsModel->getAll();
        require_once __DIR__ . '/../Views/logs.php';
    }
}
