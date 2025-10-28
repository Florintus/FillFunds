<?php
/**
 * FillFunds - Breadcrumbs Partial
 * Хлебные крошки для навигации
 */

// Функция для генерации хлебных крошек на основе текущего URL
function generateBreadcrumbs() {
    $breadcrumbs = [];
    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $segments = array_filter(explode('/', $path));
    
    // Всегда добавляем главную страницу
    $breadcrumbs[] = [
        'title' => 'Главная',
        'url' => '/',
        'active' => empty($segments)
    ];
    
    // Карта путей к человекочитаемым названиям
    $pathMap = [
        'dashboard' => 'Панель управления',
        'income' => 'Доходы',
        'expenses' => 'Расходы',
        'reports' => 'Отчеты',
        'settings' => 'Настройки',
        'profile' => 'Профиль',
        'help' => 'Помощь',
        'about' => 'О нас',
        'contact' => 'Контакты',
        'features' => 'Возможности',
        'pricing' => 'Цены',
        'documentation' => 'Документация',
        'api' => 'API',
        'integrations' => 'Интеграции',
        'security' => 'Безопасность',
        'terms' => 'Условия использования',
        'privacy' => 'Политика конфиденциальности',
        'login' => 'Вход',
        'register' => 'Регистрация',
        'forgot-password' => 'Восстановление пароля',
        'users' => 'Пользователи',
        'categories' => 'Категории',
        'accounts' => 'Счета',
        'transactions' => 'Операции',
        'invoices' => 'Счета-фактуры',
        'clients' => 'Клиенты',
        'projects' => 'Проекты',
        'calendar' => 'Календарь',
        'notifications' => 'Уведомления',
        'backup' => 'Резервное копирование',
        'import' => 'Импорт',
        'export' => 'Экспорт',
        'analytics' => 'Аналитика',
        'taxes' => 'Налоги'
    ];
    
    $currentPath = '';
    
    foreach ($segments as $index => $segment) {
        $currentPath .= '/' . $segment;
        $isLast = ($index === count($segments) - 1);
        
        // Обработка специальных случаев для динамических параметров
        $title = $pathMap[$segment] ?? ucfirst(str_replace(['-', '_'], ' ', $segment));
        
        // Если это ID (числовое значение), пытаемся получить название из контекста
        if (is_numeric($segment) && $index > 0) {
            $parentSegment = $segments[$index - 1];
            $title = "#{$segment}";
            
            // Можно добавить логику для получения реального названия из базы данных
            // Например, для пользователя, проекта и т.д.
        }
        
        $breadcrumbs[] = [
            'title' => $title,
            'url' => $currentPath,
            'active' => $isLast
        ];
    }
    
    return $breadcrumbs;
}

// Получаем хлебные крошки
$breadcrumbs = $breadcrumbs ?? generateBreadcrumbs();

// Не показываем хлебные крошки если только главная страница
if (count($breadcrumbs) <= 1) {
    return;
}
?>

<nav class="bg-secondary border-b border-primary py-3" aria-label="Breadcrumb">
    <div class="ff-container">
        <ol class="flex items-center space-x-2 text-sm" role="list">
            <?php foreach ($breadcrumbs as $index => $crumb): ?>
                <li class="flex items-center" role="listitem">
                    <?php if ($index > 0): ?>
                        <!-- Separator -->
                        <svg class="w-4 h-4 text-tertiary mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    <?php endif; ?>
                    
                    <?php if ($crumb['active']): ?>
                        <!-- Current page -->
                        <span class="text-primary font-medium" aria-current="page">
                            <?= htmlspecialchars($crumb['title']) ?>
                        </span>
                    <?php else: ?>
                        <!-- Link to page -->
                        <a href="<?= htmlspecialchars($crumb['url']) ?>" 
                           class="text-secondary hover:text-primary transition-colors duration-150 hover:underline">
                            <?= htmlspecialchars($crumb['title']) ?>
                        </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ol>
        
        <!-- Optional: Back button for mobile -->
        <?php if (count($breadcrumbs) > 1): ?>
            <button onclick="window.history.back()" 
                    class="md:hidden mt-2 flex items-center text-sm text-secondary hover:text-primary transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Назад
            </button>
        <?php endif; ?>
    </div>
</nav>

<!-- JSON-LD Structured Data for Search Engines -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        <?php foreach ($breadcrumbs as $index => $crumb): ?>
        {
            "@type": "ListItem",
            "position": <?= $index + 1 ?>,
            "name": "<?= htmlspecialchars($crumb['title']) ?>",
            "item": "<?= htmlspecialchars($_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $crumb['url']) ?>"
        }<?= $index < count($breadcrumbs) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
    ]
}
</script>
