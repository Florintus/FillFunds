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
$router->get('/add', ['DashboardController', 'showAddForm']);
$router->post('/add', ['DashboardController', 'handleAdd']);
$router->get('/edit', ['DashboardController', 'showEditForm']);
$router->post('/edit', ['DashboardController', 'handleEdit']);
$router->post('/delete', ['DashboardController', 'delete']);
$router->get('/logs', ['DashboardController', 'showLogs']);
$router->get('/about', ['AboutController', 'index']);
// Счета
$router->get('/accounts/create', ['AccountController', 'createForm']);
$router->post('/accounts/store', ['AccountController', 'store']);
$router->get('/accounts', ['AccountController', 'index']);
// Расходы
$router->get('/expenses', ['ExpenseController', 'index']);
$router->get('/expenses/create', ['ExpenseController', 'createForm']);
$router->get('/expenses/delete', ['ExpenseController', 'delete']);
// Доходы
$router->get('/incomes', ['IncomeController', 'index']);
$router->get('/incomes/create', ['IncomeController', 'createForm']);
$router->get('/incomes/delete', ['IncomeController', 'delete']);
$router->post('/incomes/store', ['IncomeController', 'store']);
$router->post('/incomes/delete', ['IncomeController', 'delete']);
// Категории
$router->get('/categories', ['CategoryController', 'index']);
$router->get('/categories/create', ['CategoryController', 'createForm']);
$router->post('/categories/store', ['CategoryController', 'create']);
$router->get('/categories/edit', ['CategoryController', 'editForm']);
$router->post('/categories/update', ['CategoryController', 'update']);
$router->post('/categories/delete', ['CategoryController', 'delete']);

//Обработка запросов
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);