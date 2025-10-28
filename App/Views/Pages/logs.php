<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>История изменений - FillFunds</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        
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
        .dark .bg-gray-100 {
            background-color: #1e293b;
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
        .dark .text-gray-500 {
            color: #64748b;
        }
        .dark .border-gray-200 {
            border-color: #334155;
        }
        .dark .border-gray-300 {
            border-color: #475569;
        }
        .dark .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.3);
        }
        .dark .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
        }
        .dark .hover\:bg-gray-50:hover {
            background-color: #334155;
        }
        .dark #theme-menu {
            background-color: #1e293b;
            border-color: #334155;
        }

        /* Table styles */
        .table-row:hover {
            background-color: #f8fafc;
        }
        .dark .table-row:hover {
            background-color: #334155;
        }

        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .dark .custom-scrollbar::-webkit-scrollbar-track {
            background: #1e293b;
        }
        .dark .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #475569;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-lg">F</span>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900">FillFunds</h1>
                    </div>
                    
                    <!-- Breadcrumbs -->
                    <nav class="hidden md:flex">
                        <ol class="flex items-center space-x-2 text-sm">
                            <li><a href="/" class="text-gray-500 hover:text-gray-700">Главная</a></li>
                            <li class="text-gray-400">/</li>
                            <li class="text-gray-900 font-medium">История изменений</li>
                        </ol>
                    </nav>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Quick Action -->
                    <a href="/" class="hidden md:flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Вернуться на главную
                    </a>

                    <!-- Theme Switcher -->
                    <div class="relative">
                        <button id="theme-toggle" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <svg id="theme-icon-light" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <svg id="theme-icon-dark" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                            </svg>
                            <svg id="theme-icon-system" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                        <div id="theme-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden z-50">
                            <button class="theme-option w-full px-4 py-2 text-left hover:bg-gray-50 rounded-t-lg transition-colors" data-theme="light">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    <span>Светлая тема</span>
                                </div>
                            </button>
                            <button class="theme-option w-full px-4 py-2 text-left hover:bg-gray-50 transition-colors" data-theme="dark">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                    </svg>
                                    <span>Темная тема</span>
                                </div>
                            </button>
                            <button class="theme-option w-full px-4 py-2 text-left hover:bg-gray-50 rounded-b-lg transition-colors" data-theme="system">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Системная тема</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="flex h-screen pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-sm border-r border-gray-200 flex-shrink-0">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="flex items-center space-x-3 p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            </svg>
                            <span>Главная</span>
                        </a>
                    </li>
                    <li>
                        <a href="/logs" class="flex items-center space-x-3 p-3 text-yellow-600 bg-yellow-50 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>История изменений</span>
                        </a>
                    </li>
                    <li>
                        <a href="/accounts" class="flex items-center space-x-3 p-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span>Счета</span>
                        </a>
                    </li>
                    <li>
                        <a href="/expenses" class="flex items-center space-x-3 p-3 text-gray-700 rounded-lg hover:bg-red-50 hover:text-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                            <span>Расходы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/incomes" class="flex items-center space-x-3 p-3 text-gray-700 rounded-lg hover:bg-green-50 hover:text-green-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            <span>Доходы</span>
                        </a>
                    </li>
                    <li>
                        <a href="/categories" class="flex items-center space-x-3 p-3 text-gray-700 rounded-lg hover:bg-purple-50 hover:text-purple-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span>Категории</span>
                        </a>
                    </li>
                    <li>
                        <a href="/settings" class="flex items-center space-x-3 p-3 text-gray-700 rounded-lg hover:bg-gray-50 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Настройки</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-hidden">
            <div class="p-6">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900">История изменений</h2>
                        <p class="text-gray-600 mt-1">Аудит всех операций и изменений в системе</p>
                    </div>
                    <div class="flex space-x-3">
                        <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                            </svg>
                            Фильтры
                        </button>
                        <button class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Экспорт
                        </button>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Создано</p>
                                <p class="text-2xl font-bold text-gray-900"><?= count(array_filter($logs, fn($log) => $log['operation'] === 'create')) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Изменено</p>
                                <p class="text-2xl font-bold text-gray-900"><?= count(array_filter($logs, fn($log) => $log['operation'] === 'update')) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Удалено</p>
                                <p class="text-2xl font-bold text-gray-900"><?= count(array_filter($logs, fn($log) => $log['operation'] === 'delete')) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Всего записей</p>
                                <p class="text-2xl font-bold text-gray-900"><?= count($logs) ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Change Log Table -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Журнал изменений</h3>
                    </div>

                    <?php if (!empty($logs)): ?>
                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Операция</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Было</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Стало</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата изменения</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($logs as $log): ?>
                                        <tr class="table-row">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <?php
                                                    $operationConfig = [
                                                        'create' => ['text' => 'Создание', 'color' => 'bg-green-100 text-green-800', 'icon' => 'M12 4v16m8-8H4'],
                                                        'update' => ['text' => 'Изменение', 'color' => 'bg-yellow-100 text-yellow-800', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
                                                        'delete' => ['text' => 'Удаление', 'color' => 'bg-red-100 text-red-800', 'icon' => 'M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16']
                                                    ];
                                                    $config = $operationConfig[$log['operation']] ?? $operationConfig['update'];
                                                ?>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $config['color'] ?>">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $config['icon'] ?>"></path>
                                                    </svg>
                                                    <?= $config['text'] ?>
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">
                                                    <div class="mb-1"><strong>Сумма:</strong> <?= htmlspecialchars($log['old_amount']) ?> ₽</div>
                                                    <div class="mb-1"><strong>Категория:</strong> <?= htmlspecialchars($log['old_category']) ?></div>
                                                    <div class="mb-1"><strong>Описание:</strong> <?= htmlspecialchars($log['old_description']) ?></div>
                                                    <div><strong>Дата:</strong> <?= date('d.m.Y', strtotime($log['old_date'])) ?></div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?php if ($log['operation'] === 'update'): ?>
                                                    <div class="text-sm text-gray-900">
                                                        <div class="mb-1"><strong>Сумма:</strong> <?= htmlspecialchars($log['new_amount']) ?> ₽</div>
                                                        <div class="mb-1"><strong>Категория:</strong> <?= htmlspecialchars($log['new_category']) ?></div>
                                                        <div class="mb-1"><strong>Описание:</strong> <?= htmlspecialchars($log['new_description']) ?></div>
                                                        <div><strong>Дата:</strong> <?= date('d.m.Y', strtotime($log['new_date'])) ?></div>
                                                    </div>
                                                <?php else: ?>
                                                    <span class="text-gray-400 italic">—</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?= date('d.m.Y H:i', strtotime($log['changed_at'])) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="px-6 py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">История пуста</h3>
                            <p class="mt-1 text-sm text-gray-500">Нет данных для отображения. Начните работу с системой, чтобы увидеть здесь историю изменений.</p>
                            <div class="mt-6">
                                <a href="/add" class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 transition-all">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Добавить первую запись
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <script type="module">
        // Theme switching functionality
        const themeToggle = document.getElementById('theme-toggle');
        const themeMenu = document.getElementById('theme-menu');
        const themeOptions = document.querySelectorAll('.theme-option');
        const themeIcons = {
            light: document.getElementById('theme-icon-light'),
            dark: document.getElementById('theme-icon-dark'),
            system: document.getElementById('theme-icon-system')
        };

        // Get saved theme or default to system
        let currentTheme = localStorage.getItem('theme') || 'system';

        // Apply theme
        function applyTheme(theme) {
            if (theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            
            // Update icon
            Object.values(themeIcons).forEach(icon => icon.classList.add('hidden'));
            themeIcons[theme].classList.remove('hidden');
            
            currentTheme = theme;
            localStorage.setItem('theme', theme);
        }

        // Initialize theme
        applyTheme(currentTheme);

        // Toggle theme menu
        themeToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            themeMenu.classList.toggle('hidden');
        });

        // Handle theme selection
        themeOptions.forEach(option => {
            option.addEventListener('click', function() {
                const selectedTheme = this.dataset.theme;
                applyTheme(selectedTheme);
                themeMenu.classList.add('hidden');
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function() {
            themeMenu.classList.add('hidden');
        });

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function() {
            if (currentTheme === 'system') {
                applyTheme('system');
            }
        });

        // Table row interactions
        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('click', function(e) {
                // Could add row selection or detail view here
                console.log('Row clicked');
            });
        });
    </script>
</body>
</html>
