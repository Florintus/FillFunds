<?php
namespace Core;

class View
{
    /**
     * Рендерит представление с переданными данными
     * 
     * @param string $template Путь к шаблону (например: 'income/index')
     * @param array $data Данные для передачи в представление
     * @return void
     */
    public static function render(string $template, array $data = []): void
{
    extract($data);

    // Если указана подпапка в $template — используем как есть
    if (str_contains($template, '/')) {
        $viewPath = __DIR__ . '/../App/Views/' . $template . '.php';
    } else {
        // Иначе ищем в Pages по умолчанию
        $viewPath = __DIR__ . '/../App/Views/Pages/' . $template . '.php';
    }

    if (!file_exists($viewPath)) {
        throw new \Exception("Представление '{$template}' не найдено по пути: {$viewPath}");
    }

    require $viewPath;
}
    
    /**
     * Рендерит представление с layout (будущее расширение)
     * 
     * @param string $template Путь к шаблону
     * @param array $data Данные для передачи
     * @param string $layout Название layout'а
     * @return void
     */
    public static function renderWithLayout(string $template, array $data = [], string $layout = 'main'): void
    {
        // Начинаем буферизацию вывода
        ob_start();
        
        // Рендерим содержимое страницы
        self::render($template, $data);
        
        // Получаем содержимое и очищаем буфер
        $content = ob_get_clean();
        
        // Передаем содержимое в layout
        $data['content'] = $content;
        
        // Рендерим layout
        self::render("layouts/{$layout}", $data);
    }
}