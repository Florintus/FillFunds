<?php
$pageTitle = "FillFunds – Современная система бухгалтерии";
$pageDescription = "Автоматизируйте учет доходов, расходов и финансов малого бизнеса.";
$pageCSS = ['/css/pages/home.css'];
$pageScripts = ['/js/pages/home.js'];
$showBreadcrumbs = false;
$bodyClass = 'home-page';

ob_start();
?>

<!-- Hero Section -->
<section id="hero" class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="container mx-auto px-4 py-32 text-center relative">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-fade-in">Современная система бухгалтерского учета</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-10 opacity-90">Автоматизируйте управление финансами вашего бизнеса. Просто, быстро, надежно.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in">
            <a href="/register" class="btn-primary text-lg px-8 py-4">Начать бесплатно</a>
            <a href="#demo" class="btn-outline text-lg px-8 py-4">Демо версия</a>
        </div>
    </div>
</section>

<!-- Features -->
<section id="features" class="py-20 bg-white dark:bg-slate-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-16">Основные возможности</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $features = [
                ['💰', 'Управление счетами', 'Отслеживайте все банковские и наличные счета'],
                ['📈', 'Доходы', 'Фиксируйте поступления и анализируйте прибыль'],
                ['📉', 'Расходы', 'Контролируйте траты и оптимизируйте бюджет'],
                ['🏷️', 'Категории', 'Настройте собственные категории'],
                ['🔄', 'История изменений', 'Полная аудитория всех действий'],
                ['🧮', 'Калькулятор', 'Быстрые расчеты прямо в интерфейсе'],
            ];
            foreach ($features as [$icon, $title, $desc]): ?>
                <div class="feature-card p-6 bg-white dark:bg-slate-700 rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="text-4xl mb-4"><?= $icon ?></div>
                    <h3 class="text-xl font-bold mb-2"><?= $title ?></h3>
                    <p class="text-gray-600 dark:text-gray-300"><?= $desc ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-16 bg-slate-50 dark:bg-slate-900">
    <div class="container mx-auto px-4 text-center">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
            $stats = [
                ['2,500+', 'Пользователей'],
                ['98.5%', 'Удовлетворенность'],
                ['50%', 'Экономия времени'],
                ['24/7', 'Поддержка']
            ];
            foreach ($stats as [$num, $label]): ?>
                <div class="stat-item">
                    <div class="text-3xl md:text-4xl font-bold text-indigo-600 dark:text-indigo-400"><?= $num ?></div>
                    <div class="text-gray-600 dark:text-gray-400 mt-1"><?= $label ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Demo -->
<section id="demo" class="py-20 bg-white dark:bg-slate-800">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl font-bold mb-4">Интуитивный интерфейс</h2>
            <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">Простой дашборд помогает быстро ориентироваться без обучения.</p>
            <a href="/demo" class="btn-primary">Попробовать демо</a>
        </div>
        <div class="bg-slate-100 dark:bg-slate-700 p-6 rounded-2xl shadow-inner">
            <div class="flex gap-1 mb-4">
                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
            </div>
            <h3 class="font-bold mb-2">Обзор за месяц</h3>
            <p>Доход: 1 250 000 ₽</p>
            <div class="w-full bg-gray-300 dark:bg-slate-600 h-2 rounded-full mb-4">
                <div class="bg-indigo-600 h-2 rounded-full w-4/5"></div>
            </div>
            <p>Расходы: 850 000 ₽</p>
            <div class="w-full bg-gray-300 dark:bg-slate-600 h-2 rounded-full">
                <div class="bg-red-500 h-2 rounded-full w-3/5"></div>
            </div>
        </div>
    </div>
</section>

<!-- Registration -->
<section id="register" class="py-20 bg-slate-50 dark:bg-slate-900">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Начните работать уже сегодня</h2>
        <div class="max-w-md mx-auto bg-white dark:bg-slate-800 p-8 rounded-2xl shadow-lg">
            <form id="registration-form">
                <div class="mb-4 text-left">
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Имя</label>
                    <input type="text" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700">
                </div>
                <div class="mb-4 text-left">
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700">
                </div>
                <div class="mb-6 text-left">
                    <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Пароль</label>
                    <input type="password" class="w-full px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700">
                </div>
                <div class="mb-6 flex items-center">
                    <input type="checkbox" id="agree" required class="mr-2">
                    <label for="agree" class="text-sm text-gray-600 dark:text-gray-400">Я согласен с условиями</label>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 rounded-lg font-semibold hover:shadow-lg transition">
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </div>
</section>
<?php
// Заканчиваем буферизацию и получаем весь HTML выше в переменную $content
$content = ob_get_clean();

// Подключаем основной макет, который использует $content и другие переменные
include __DIR__ . '/../layouts/main.php';
?>