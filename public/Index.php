<?php

require __DIR__ . '/../Vendor/autoload.php';

use Core\Router;

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
$router->get('/login', ['AuthController', 'login']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/register', ['AuthController', 'register']);
$router->post('/register', ['AuthController', 'register']);
$router->get('/logout', ['AuthController', 'logout']);
//Обработка запросов
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);