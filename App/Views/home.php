<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FillFunds - Умная система бухгалтерского учета</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        
        /* Dark theme styles */
        .dark {
            color-scheme: dark;
        }
        .dark body {
            background-color: #0f172a;
            color: #f1f5f9;
        }
        .dark header {
            background-color: #1e293b;
            border-bottom: 1px solid #334155;
        }
        .dark .bg-white {
            background-color: #1e293b;
        }
        .dark .bg-gray-50 {
            background-color: #0f172a;
        }
        .dark .bg-gray-900 {
            background-color: #020617;
        }
        .dark .text-gray-900 {
            color: #f1f5f9;
        }
        .dark .text-gray-600 {
            color: #94a3b8;
        }
        .dark .text-gray-400 {
            color: #64748b;
        }
        .dark .border-gray-200 {
            border-color: #334155;
        }
        .dark .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
        }
        .dark .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
        }

    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-lg">F</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-900">FillFunds</h1>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Desktop buttons -->
                    <button class="px-4 py-2 text-blue-600 font-medium hover:bg-blue-50 rounded-lg transition-colors">Войти</button>
                    <button class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">Регистрация</button>
                </div>
                

            </div>
        </div>
    </header>

    <!-- Уведомления -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <?= htmlspecialchars($_SESSION['success']) ?>
            </div>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?= htmlspecialchars($_SESSION['error']) ?>
            </div>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-5xl font-bold mb-6">Добро пожаловать в<br>систему бухгалтерского учета</h2>
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">Управляйте финансами с помощью современного и интуитивно понятного интерфейса. Все инструменты в одном месте.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/expenses/create" class="px-8 py-4 bg-white text-blue-600 font-semibold rounded-xl hover:bg-gray-100 transition-colors shadow-lg">Добавить расход</a>
                <a href="/incomes/create" class="px-8 py-4 border-2 border-white text-white font-semibold rounded-xl hover:bg-white hover:text-blue-600 transition-colors">Добавить доход</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Обзор финансов</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Актуальная статистика ваших доходов и расходов</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat Card 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Общие доходы</h4>
                    <p class="text-3xl font-bold text-gray-900 mb-2"><?= number_format($stats['total_income'] ?? 0, 0, ',', ' ') ?> ₽</p>
                    <p class="text-sm <?= ($stats['income_growth'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' ?>">
                        <?= ($stats['income_growth'] ?? 0) >= 0 ? '+' : '' ?><?= number_format($stats['income_growth'] ?? 0, 1) ?>% за месяц
                    </p>
                </div>

                <!-- Stat Card 2 -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-green-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Чистая прибыль</h4>
                    <p class="text-3xl font-bold text-gray-900 mb-2"><?= number_format($stats['net_profit'] ?? 0, 0, ',', ' ') ?> ₽</p>
                    <p class="text-sm <?= ($stats['profit_growth'] ?? 0) >= 0 ? 'text-green-600' : 'text-red-600' ?>">
                        <?= ($stats['profit_growth'] ?? 0) >= 0 ? '+' : '' ?><?= number_format($stats['profit_growth'] ?? 0, 1) ?>% за месяц
                    </p>
                </div>

                <!-- Stat Card 3 -->
                <div class="bg-gradient-to-br from-red-50 to-pink-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-red-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m16 0l-4-4m4 4l-4 4"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Общие расходы</h4>
                    <p class="text-3xl font-bold text-gray-900 mb-2"><?= number_format($stats['total_expenses'] ?? 0, 0, ',', ' ') ?> ₽</p>
                    <p class="text-sm <?= ($stats['expense_growth'] ?? 0) <= 0 ? 'text-green-600' : 'text-red-600' ?>">
                        <?= ($stats['expense_growth'] ?? 0) >= 0 ? '+' : '' ?><?= number_format($stats['expense_growth'] ?? 0, 1) ?>% за месяц
                    </p>
                </div>

                <!-- Stat Card 4 -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">ROI (Рентабельность)</h4>
                    <p class="text-3xl font-bold text-gray-900 mb-2"><?= number_format($stats['roi'] ?? 0, 1) ?>%</p>
                    <p class="text-sm text-purple-600">Показатель эффективности</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h3 class="text-4xl font-bold text-gray-900 mb-4">Все необходимые инструменты</h3>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Полный набор функций для эффективного ведения бухгалтерского учета</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-blue-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Управление счетами</h4>
                    <p class="text-gray-600">Создавайте и отслеживайте все виды счетов с удобной системой категоризации</p>
                    <a href="/accounts" class="inline-block mt-4 text-blue-600 hover:text-blue-700 font-medium">Перейти к счетам →</a>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-green-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Доходы</h4>
                    <p class="text-gray-600">Учитывайте все источники доходов с автоматической категоризацией</p>
                    <a href="/incomes" class="inline-block mt-4 text-green-600 hover:text-green-700 font-medium">Просмотреть доходы →</a>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-gradient-to-br from-red-50 to-pink-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-red-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Расходы</h4>
                    <p class="text-gray-600">Контролируйте все расходы с детальной аналитикой и отчетностью</p>
                    <a href="/expenses" class="inline-block mt-4 text-red-600 hover:text-red-700 font-medium">Просмотреть расходы →</a>
                </div>

                <!-- Feature Card 4 -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-purple-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Категории</h4>
                    <p class="text-gray-600">Организуйте финансы по категориям для лучшего понимания денежных потоков</p>
                    <a href="/categories" class="inline-block mt-4 text-purple-600 hover:text-purple-700 font-medium">Управление категориями →</a>
                </div>

                <!-- Feature Card 5 -->
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-yellow-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">История изменений</h4>
                    <p class="text-gray-600">Полный аудит всех операций с возможностью отслеживания изменений</p>
                    <a href="/logs" class="inline-block mt-4 text-yellow-600 hover:text-yellow-700 font-medium">Просмотреть историю →</a>
                </div>

                <!-- Feature Card 6 -->
                <div class="bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-2xl card-hover">
                    <div class="w-14 h-14 bg-teal-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-semibold text-gray-900 mb-3">Настройки</h4>
                    <p class="text-gray-600">Персонализируйте систему под ваши потребности и предпочтения</p>
                    <a href="/settings" class="inline-block mt-4 text-teal-600 hover:text-teal-700 font-medium">Открыть настройки →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Transactions -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-4xl font-bold text-gray-900 mb-8 text-center">Последние операции</h3>
            
            <?php if (!empty($recentExpenses) || !empty($recentIncomes)): ?>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Тип</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Описание</th>
                                    <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Сумма</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                // Объединяем и сортируем по дате
                                $allTransactions = [];
                                if (!empty($recentExpenses)) {
                                    foreach ($recentExpenses as $expense) {
                                        $expense['type'] = 'Расход';
                                        $expense['css_class'] = 'expense';
                                        $allTransactions[] = $expense;
                                    }
                                }
                                if (!empty($recentIncomes)) {
                                    foreach ($recentIncomes as $income) {
                                        $income['type'] = 'Доход';
                                        $income['css_class'] = 'income';
                                        $allTransactions[] = $income;
                                    }
                                }
                                
                                usort($allTransactions, function($a, $b) {
                                    return strtotime($b['date']) - strtotime($a['date']);
                                });
                                
                                $allTransactions = array_slice($allTransactions, 0, 10);
                                ?>
                                
                                <?php foreach ($allTransactions as $transaction): ?>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <?= date('d.m.Y', strtotime($transaction['date'])) ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full <?= $transaction['css_class'] === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                                <?= htmlspecialchars($transaction['type']) ?>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            <?= htmlspecialchars($transaction['description'] ?? $transaction['name'] ?? '') ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium <?= $transaction['css_class'] === 'income' ? 'text-green-600' : 'text-red-600' ?>">
                                            <?= $transaction['css_class'] === 'income' ? '+' : '-' ?><?= number_format($transaction['amount'], 0, ',', ' ') ?> ₽
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Операций пока нет</h3>
                    <p class="mt-1 text-sm text-gray-500">Начните с добавления первой операции.</p>
                    <div class="mt-6">
                        <a href="/expenses/create" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                            Добавить первую операцию
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <script type="module">
        // Simple functionality for button interactions
        const loginBtn = document.querySelector('button:nth-of-type(1)');
        const registerBtn = document.querySelector('button:nth-of-type(2)');
        
        if (loginBtn) {
            loginBtn.addEventListener('click', function() {
                alert('Переход на страницу входа');
            });
        }
        
        if (registerBtn) {
            registerBtn.addEventListener('click', function() {
                alert('Переход на страницу регистрации');
            });
        }
    </script>
</body>
</html>
