<?php
namespace Core;

use Core\View;

abstract class BaseController
{
    /**
     * Рендерит представление с переданными данными
     * 
     * @param string $template Путь к шаблону (например: 'income/index')
     * @param array $data Данные для передачи в представление
     * @return void
     */
    protected function render(string $template, array $data = []): void
    {
        View::render($template, $data);
    }
    
    /**
     * Рендерит представление с layout
     * 
     * @param string $template Путь к шаблону
     * @param array $data Данные для передачи
     * @param string $layout Название layout'а
     * @return void
     */
    protected function renderWithLayout(string $template, array $data = [], string $layout = 'main'): void
    {
        View::renderWithLayout($template, $data, $layout);
    }
    
    /**
     * Редирект на указанный URL
     * 
     * @param string $url URL для редиректа
     * @return void
     */
    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
    
    /**
     * Редирект назад (на предыдущую страницу)
     * 
     * @return void
     */
    protected function redirectBack(): void
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        $this->redirect($referer);
    }
    
    /**
     * Возвращает JSON ответ
     * 
     * @param array $data Данные для JSON
     * @param int $statusCode HTTP статус код
     * @return void
     */
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}