<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить расход - FillFunds</title>
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
        .dark input[type="text"], .dark input[type="number"], .dark input[type="date"], .dark textarea {
            background-color: #334155;
            border-color: #475569;
            color: #f1f5f9;
        }
        .dark input[type="text"]:focus, .dark input[type="number"]:focus, .dark input[type="date"]:focus, .dark textarea:focus {
            border-color: #3b82f6;
            background-color: #334155;
        }
        .dark .error-message {
            background-color: #991b1b;
            border-color: #dc2626;
            color: #fecaca;
        }
        .dark #theme-menu {
            background-color: #1e293b;
            border-color: #334155;
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
                
                <!-- Breadcrumbs -->
                <nav class="hidden md:flex">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="/" class="text-gray-500 hover:text-gray-700">Главная</a></li>
                        <li class="text-gray-400">/</li>
                        <li><a href="/expenses" class="text-gray-500 hover:text-gray-700">Расходы</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-900 font-medium">Добавить расход</li>
                    </ol>
                </nav>

                <div class="flex items-center space-x-4">
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

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Добавить новый расход</h1>
            <p class="text-lg text-gray-600">Зафиксируйте расход в своей системе учета</p>
        </div>

        <!-- Error Message -->
        <?php if (!empty($error)): ?>
            <div class="mb-8">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl error-message">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <?= htmlspecialchars($error) ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <div class="bg-white rounded-2xl shadow-lg p-8 card-hover">
            <form action="/add" method="post" class="space-y-6">
                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
                        Сумма <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input 
                            type="number" 
                            id="amount"
                            name="amount" 
                            step="0.01" 
                            required 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                            placeholder="0.00"
                        >
                        <div class="absolute right-3 top-3 text-gray-400">₽</div>
                    </div>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                        Категория <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="category"
                        name="category" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                        placeholder="Например: Продукты, Транспорт, Офис..."
                    >
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Описание
                    </label>
                    <textarea 
                        id="description"
                        name="description" 
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors resize-none"
                        placeholder="Подробное описание расхода (необязательно)"
                    ></textarea>
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                        Дата <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="date" 
                        id="date"
                        name="date" 
                        required 
                        value="<?= date('Y-m-d') ?>"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-colors"
                    >
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <button 
                        type="submit" 
                        class="flex-1 bg-gradient-to-r from-red-600 to-pink-600 text-white font-semibold py-3 px-6 rounded-xl hover:from-red-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg"
                    >
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Добавить расход
                    </button>
                    <a 
                        href="/" 
                        class="flex-1 text-center bg-gray-100 text-gray-700 font-semibold py-3 px-6 rounded-xl hover:bg-gray-200 transition-colors"
                    >
                        Отмена
                    </a>
                </div>
            </form>
        </div>

        <!-- Quick Actions -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Быстрые действия</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <a href="/expenses" class="bg-white p-6 rounded-xl shadow-lg card-hover text-center">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Все расходы</h3>
                    <p class="text-sm text-gray-600">Просмотреть историю</p>
                </a>

                <a href="/incomes/create" class="bg-white p-6 rounded-xl shadow-lg card-hover text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Добавить доход</h3>
                    <p class="text-sm text-gray-600">Зафиксировать поступление</p>
                </a>

                <a href="/categories" class="bg-white p-6 rounded-xl shadow-lg card-hover text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900 mb-2">Категории</h3>
                    <p class="text-sm text-gray-600">Управление категориями</p>
                </a>
            </div>
        </div>
    </main>

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

        // Form enhancement
        const form = document.querySelector('form');
        const submitButton = form.querySelector('button[type="submit"]');
        
        form.addEventListener('submit', function(e) {
            // Add loading state
            submitButton.disabled = true;
            submitButton.innerHTML = '<svg class="w-5 h-5 inline mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Добавление...';
        });

        // Auto-focus first input
        document.getElementById('amount').focus();
    </script>
</body>
</html>
