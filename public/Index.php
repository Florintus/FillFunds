<?php

namespace App\Controllers;

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



//Обработка запросов
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);