<?php

namespace App\Controllers;

use Core\Router;

// Подключаю все в ручную
require __DIR__ . '/../vendor/autoload.php';

session_start();

// Запускаю роутер
$router = new Router();
// Маршруты
$router->get('/', ['HomeController', 'index']);
// Авторизация и регистрация
$router->get('/login', ['AuthController', 'loginForm']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/register', ['AuthController', 'registerForm']);
$router->post('/register', ['AuthController', 'register']);
$router->get('/logout', ['AuthController', 'logout']);
// Панель управления
$router->protectedget('/add', ['DashboardController', 'showAddForm']);
$router->protectedpost('/add', ['DashboardController', 'handleAdd']);
$router->protectedget('/edit', ['DashboardController', 'showEditForm']);
$router->protectedpost('/edit', ['DashboardController', 'handleEdit']);
$router->protectedpost('/delete', ['DashboardController', 'delete']);
$router->protectedget('/logs', ['DashboardController', 'showLogs']);
$router->protectedget('/about', ['AboutController', 'index']);
// Счета
$router->protectedget('/accounts/create', ['AccountController', 'createForm']);
$router->protectedpost('/accounts/store', ['AccountController', 'store']);
$router->protectedget('/accounts', ['AccountController', 'index']);
// Расходы
$router->protectedget('/expenses', ['ExpenseController', 'index']);
$router->protectedget('/expenses/create', ['ExpenseController', 'createForm']);
$router->protectedget('/expenses/delete', ['ExpenseController', 'delete']);
// Доходы
$router->protectedget('/incomes', ['IncomeController', 'index']);
$router->protectedget('/incomes/create', ['IncomeController', 'createForm']);
$router->protectedget('/incomes/delete', ['IncomeController', 'delete']);
$router->protectedpost('/incomes/store', ['IncomeController', 'store']);
$router->protectedpost('/incomes/delete', ['IncomeController', 'delete']);
// Категории
$router->protectedget('/categories', ['CategoryController', 'index']);
$router->protectedget('/categories/create', ['CategoryController', 'createForm']);
$router->protectedpost('/categories/store', ['CategoryController', 'create']);
$router->protectedget('/categories/edit', ['CategoryController', 'editForm']);
$router->protectedpost('/categories/update', ['CategoryController', 'update']);
$router->protectedpost('/categories/delete', ['CategoryController', 'delete']);

//Обработка запросов
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);