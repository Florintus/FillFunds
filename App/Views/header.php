<?php
/**
 * Современный заголовок для FillFunds
 * Универсальный компонент с поддержкой темной темы и адаптивности
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - FillFunds' : 'FillFunds - Умная система бухгалтерского учета' ?></title>
    <meta name="description" content="<?= isset($pageDescription) ? htmlspecialchars($pageDescription) : 'Современное решение для ведения бухгалтерского учета малого и среднего бизнеса' ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    
    <!-- CSS Variables and Styles -->
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
        .dark .hover\:bg-blue-50:hover {
            background-color: #1e3a8a;
        }
        .dark input[type="text"], .dark input[type="number"], .dark input[type="date"], .dark textarea, .dark select {
            background-color: #334155;
            border-color: #475569;
            color: #f1f5f9;
        }
        .dark input[type="text"]:focus, .dark input[type="number"]:focus, .dark input[type="date"]:focus, .dark textarea:focus, .dark select:focus {
            border-color: #3b82f6;
            background-color: #334155;
        }
        .dark #theme-menu, .dark #user-menu, .dark #mobile-menu {
            background-color: #1e293b;
            border-color: #334155;
        }

        /* Loading animation */
        .loading-spinner {
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Breadcrumb separator */
        .breadcrumb-separator::before {
            content: '/';
            margin: 0 8px;
            color: #94a3b8;
        }
    </style>
    
    <?php if (isset($customCSS)): ?>
    <!-- Custom CSS -->
    <style><?= $customCSS ?></style>
    <?php endif; ?>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo and Brand -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-3">
                        <a href="/" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold text-lg">F</span>
                            </div>
                            <h1 class="text-2xl font-bold text-gray-900">FillFunds</h1>
                        </a>
                    </div>
                    
                    <!-- Breadcrumbs -->
                    <?php if (isset($breadcrumbs) && !empty($breadcrumbs)): ?>
                    <nav class="hidden md:flex" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-1 text-sm">
                            <?php foreach ($breadcrumbs as $index => $crumb): ?>
                                <?php if ($index > 0): ?>
                                    <li class="breadcrumb-separator"></li>
                                <?php endif; ?>
                                <li>
                                    <?php if (isset($crumb['url']) && $index < count($breadcrumbs) - 1): ?>
                                        <a href="<?= htmlspecialchars($crumb['url']) ?>" class="text-gray-500 hover:text-gray-700 transition-colors">
                                            <?= htmlspecialchars($crumb['title']) ?>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-gray-900 font-medium"><?= htmlspecialchars($crumb['title']) ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </nav>
                    <?php endif; ?>
                </div>

                <!-- Navigation and Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Desktop Navigation -->
                    <nav class="hidden lg:flex space-x-8" role="navigation">
                        <a href="/" class="text-gray-600 hover:text-blue-600 font-medium transition-colors <?= isset($currentPage) && $currentPage === 'home' ? 'text-blue-600' : '' ?>">
                            Главная
                        </a>
                        <a href="/expenses" class="text-gray-600 hover:text-red-600 font-medium transition-colors <?= isset($currentPage) && $currentPage === 'expenses' ? 'text-red-600' : '' ?>">
                            Расходы
                        </a>
                        <a href="/incomes" class="text-gray-600 hover:text-green-600 font-medium transition-colors <?= isset($currentPage) && $currentPage === 'incomes' ? 'text-green-600' : '' ?>">
                            Доходы
                        </a>
                        <a href="/accounts" class="text-gray-600 hover:text-blue-600 font-medium transition-colors <?= isset($currentPage) && $currentPage === 'accounts' ? 'text-blue-600' : '' ?>">
                            Счета
                        </a>
                        <a href="/logs" class="text-gray-600 hover:text-yellow-600 font-medium transition-colors <?= isset($currentPage) && $currentPage === 'logs' ? 'text-yellow-600' : '' ?>">
                            История
                        </a>
                    </nav>

                    <!-- Search (optional) -->
                    <?php if (isset($showSearch) && $showSearch): ?>
                    <div class="hidden md:block relative">
                        <input 
                            type="text" 
                            placeholder="Поиск..." 
                            class="w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white text-gray-900 placeholder-gray-400"
                            id="global-search"
                        >
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <?php endif; ?>

                    <!-- Quick Actions -->
                    <?php if (isset($quickActions) && !empty($quickActions)): ?>
                    <div class="hidden md:flex space-x-2">
                        <?php foreach ($quickActions as $action): ?>
                        <a href="<?= htmlspecialchars($action['url']) ?>" 
                           class="px-3 py-2 <?= $action['primary'] ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:from-blue-700 hover:to-purple-700' : 'text-gray-600 border border-gray-200 hover:bg-gray-50' ?> font-medium rounded-lg transition-all <?= $action['primary'] ? 'shadow-lg hover:shadow-xl' : '' ?>"
                           title="<?= htmlspecialchars($action['title'] ?? '') ?>">
                            <?php if (isset($action['icon'])): ?>
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $action['icon'] ?>"></path>
                            </svg>
                            <?php endif; ?>
                            <?= htmlspecialchars($action['label']) ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Notifications -->
                    <?php if (isset($showNotifications) && $showNotifications): ?>
                    <button id="notifications-button" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors relative" title="Уведомления">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5-5v5zM10.5 3.5a6 6 0 0 1 12 0v5l2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8l2-2v-5a6 6 0 0 1 6-6z"></path>
                        </svg>
                        <?php if (isset($notificationCount) && $notificationCount > 0): ?>
                        <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                        <?php endif; ?>
                    </button>
                    <?php endif; ?>

                    <!-- Theme Switcher -->
                    <div class="relative">
                        <button id="theme-toggle" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors" title="Переключить тему">
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

                    <!-- User Menu -->
                    <?php if (isset($showUserMenu) && $showUserMenu): ?>
                    <div class="relative">
                        <button id="user-menu-button" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <?php if (isset($user['avatar']) && $user['avatar']): ?>
                            <img src="https://hatchcanvas.com/_/assets/ab_RZKAqmxW2Yf6Q_RbeypNF/keys//<?= htmlspecialchars($user['avatar']) ?>" alt="Аватар" class="w-8 h-8 rounded-full object-cover">
                            <?php else: ?>
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-medium text-sm">
                                    <?= isset($user['name']) ? strtoupper(substr($user['name'], 0, 1)) : 'U' ?>
                                </span>
                            </div>
                            <?php endif; ?>
                            <span class="hidden md:block text-sm font-medium text-gray-700">
                                <?= isset($user['name']) ? htmlspecialchars($user['name']) : 'Пользователь' ?>
                            </span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 hidden z-50">
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-t-lg transition-colors">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Профиль</span>
                                </div>
                            </a>
                            <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Настройки</span>
                                </div>
                            </a>
                            <hr class="border-gray-200 my-1">
                            <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-b-lg transition-colors">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Выйти</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="lg:hidden bg-white border-t border-gray-200 hidden">
            <div class="px-4 py-6 space-y-4">
                <a href="/" class="block text-gray-600 hover:text-blue-600 font-medium transition-colors py-2">Главная</a>
                <a href="/expenses" class="block text-gray-600 hover:text-red-600 font-medium transition-colors py-2">Расходы</a>
                <a href="/incomes" class="block text-gray-600 hover:text-green-600 font-medium transition-colors py-2">Доходы</a>
                <a href="/accounts" class="block text-gray-600 hover:text-blue-600 font-medium transition-colors py-2">Счета</a>
                <a href="/logs" class="block text-gray-600 hover:text-yellow-600 font-medium transition-colors py-2">История</a>
                
                <?php if (isset($quickActions) && !empty($quickActions)): ?>
                <div class="pt-4 border-t border-gray-200 space-y-2">
                    <?php foreach ($quickActions as $action): ?>
                    <a href="<?= htmlspecialchars($action['url']) ?>" 
                       class="block w-full px-4 py-2 <?= $action['primary'] ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white' : 'bg-gray-100 text-gray-600' ?> font-medium rounded-lg transition-colors text-center">
                        <?= htmlspecialchars($action['label']) ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Loading Overlay (опционально) -->
    <?php if (isset($showLoading) && $showLoading): ?>
    <div id="loading-overlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
            <svg class="w-5 h-5 text-blue-600 loading-spinner" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            <span class="text-gray-700">Загрузка...</span>
        </div>
    </div>
    <?php endif; ?>

    <!-- JavaScript -->
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
        if (themeToggle) {
            themeToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                themeMenu.classList.toggle('hidden');
                // Close other menus
                const userMenu = document.getElementById('user-menu');
                const mobileMenu = document.getElementById('mobile-menu');
                if (userMenu) userMenu.classList.add('hidden');
                if (mobileMenu) mobileMenu.classList.add('hidden');
            });
        }

        // Handle theme selection
        themeOptions.forEach(option => {
            option.addEventListener('click', function() {
                const selectedTheme = this.dataset.theme;
                applyTheme(selectedTheme);
                themeMenu.classList.add('hidden');
            });
        });

        // User menu functionality
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        if (userMenuButton && userMenu) {
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                userMenu.classList.toggle('hidden');
                // Close other menus
                themeMenu.classList.add('hidden');
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu) mobileMenu.classList.add('hidden');
            });
        }

        // Mobile menu functionality
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
                // Close other menus
                themeMenu.classList.add('hidden');
                if (userMenu) userMenu.classList.add('hidden');
            });
        }

        // Close menus when clicking outside
        document.addEventListener('click', function() {
            themeMenu.classList.add('hidden');
            if (userMenu) userMenu.classList.add('hidden');
            if (mobileMenu) mobileMenu.classList.add('hidden');
        });

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function() {
            if (currentTheme === 'system') {
                applyTheme('system');
            }
        });

        // Loading functionality
        window.showLoading = function() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) overlay.classList.remove('hidden');
        };

        window.hideLoading = function() {
            const overlay = document.getElementById('loading-overlay');
            if (overlay) overlay.classList.add('hidden');
        };
    </script>

    <?php if (isset($customJS)): ?>
    <!-- Custom JavaScript -->
    <script><?= $customJS ?></script>
    <?php endif; ?>
