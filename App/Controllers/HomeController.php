<?php

namespace App\Controllers;

use Core\Database;
use PDO;
use PDOException;
use Exception;
use App\Models\Expense;
use App\Models\Logs;
use App\Middleware\AuthMiddleware;

// Контроллер
class HomeController {
    public function index() {
        AuthMiddleware::requireLogin(); // ⛔ не пускаем без авторизации
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
        require_once __DIR__ . '/../Models/Expense.php';

        $amount = $_POST['amount'] ?? null;
        $category = $_POST['category'] ?? null;
        $description = $_POST['description'] ?? '';
        $date = $_POST['date'] ?? null;

        if (!$amount || !$category || !$date) {
            $error = "Пожалуйста, заполните все обязательные поля.";
            require_once __DIR__ . '/../Views/add_expense.php';
            return;
        }

        $expense = new Expense();
        $success = $expense->add($amount, $category, $description, $date);

        if ($success) {
            header('Location: /');
            exit;
        }   else {
            echo "Ошибка при добавлении расхода. Проверь лог.";
        }
    }
    
    public function showEditForm() {
        AuthMiddleware::requireLogin();
        require_once __DIR__ . '/../Models/Expense.php';
        $id = $_GET['id'] ?? null;

        if (!$id) {
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
        require_once __DIR__ . '/../Models/Expense.php';

        $id = $_POST['id'] ?? null;
        $amount = $_POST['amount'] ?? null;
        $category = $_POST['category'] ?? null;
        $description = $_POST['description'] ?? '';
        $date = $_POST['date'] ?? null;

        if (!$id || !$amount || !$category || !$date) {
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
        require_once __DIR__ . '/../Models/Expense.php';

        $id = $_POST['id'] ?? null;

        if ($id) {
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
