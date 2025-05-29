<?php

namespace App\Controllers;

use App\Core\Router;

// Подключаю все в ручную
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../App/Controllers/HomeController.php';

session_start();

// Запускаю роутер
$router = new Router();
// Маршруты
$router->get('/', ['HomeController', 'index']);
$router->get('/add', ['HomeController', 'showAddForm']);
$router->post('/add', ['HomeController', 'handleAdd']);
$router->get('/edit', ['HomeController', 'showEditForm']);
$router->post('/edit', ['HomeController', 'handleEdit']);
$router->post('/delete', ['HomeController', 'delete']);
$router->get('/logs', ['HomeController', 'showLogs']);
// Счета
$router->get('/accounts/create', ['AccountController', 'createForm']);
$router->post('/accounts/store', ['AccountController', 'store']);
$router->get('/accounts', ['AccountController', 'index']);
// Расходы
$router->get('/expenses', ['ExpenseController', 'index']);
$router->get('/expenses/create', ['ExpenseController', 'createForm']);
// Доходы
$router->get('/incomes', ['IncomeController', 'index']);
$router->get('/incomes/create', ['IncomeController', 'createForm']);
$router->post('/incomes/store', ['IncomeController', 'store']);
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