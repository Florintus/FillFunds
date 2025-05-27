<?php

namespace Core;
// Ядро роутера — Router

class Router
{
    private array $routes = [];

    // Регистрируем GET маршрут
    public function get(string $uri, array $handler): void
    {
        $this->routes['GET'][$this->normalizeUri($uri)] = $handler;
    }

    // Регистрируем POST маршрут
    public function post(string $uri, array $handler): void
    {
        $this->routes['POST'][$this->normalizeUri($uri)] = $handler;
    }

    // Обработка запроса
    public function dispatch(string $uri, string $method): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = $this->normalizeUri($uri);

        // Проверка на существование маршрута
        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        [$controllerName, $methodName] = $this->routes[$method][$uri];

        // Полное имя класса контроллера с пространством имён
        $fullControllerClass = 'App\\Controllers\\' . $controllerName;

        // Автоматическая загрузка при необходимости
        if (!class_exists($fullControllerClass)) {
            $controllerFile = __DIR__ . '/../' . str_replace('\\', '/', $fullControllerClass) . '.php';

            if (!file_exists($controllerFile)) {
                die("❌ Файл контроллера не найден: $controllerFile");
            }

            require_once $controllerFile;
        }

        // Создание экземпляра контроллера и вызов метода
        if (class_exists($fullControllerClass)) {
            $controllerInstance = new $fullControllerClass();

            if (method_exists($controllerInstance, $methodName)) {
                call_user_func([$controllerInstance, $methodName]);
            } else {
                die("❌ Метод '$methodName' не найден в контроллере '$fullControllerClass'.");
            }
        } else {
            die("❌ Класс контроллера '$fullControllerClass' не найден.");
        }
    }

    // Нормализация URI — удаление лишнего слэша в конце
    private function normalizeUri(string $uri): string
    {
        $uri = rtrim($uri, '/');
        return $uri === '' ? '/' : $uri;
    }
}
