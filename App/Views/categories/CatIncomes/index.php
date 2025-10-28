<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории доходов - FillFunds</title>
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
        .dark .bg-white {
            background-color: #1e293b;
        }
        .dark .bg-gray-50 {
            background-color: #0f172a;
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
        .dark .shadow-lg {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3), 0 4px 6px -2px rgba(0, 0, 0, 0.15);
        }
        .dark #theme-menu {
            background-color: #1e293b;
            border-color: #334155;
        }
        .dark .hover\:bg-gray-50:hover {
            background-color: #334155;
        }
        .dark .bg-gray-100 {
            background-color: #334155;
        }
        .dark .hover\:bg-red-50:hover {
            background-color: #7f1d1d;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
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
                
                <!-- Theme Switcher -->
                <div class="flex items-center space-x-3">
                    <!-- Navigation buttons for larger screens -->
                    <div class="hidden md:flex items-center space-x-2 bg-gray-100 rounded-lg p-1">
                        <a href="/" class="px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-white rounded transition-colors">
                            Главная
                        </a>
                        <a href="/accounts" class="px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-blue-600 hover:bg-white rounded transition-colors">
                            Счета
                        </a>
                        <a href="/categories" class="px-3 py-1.5 text-sm font-medium text-blue-600 bg-white rounded transition-colors">
                            Категории
                        </a>
                    </div>
                    
                    <!-- Theme Switcher -->
                    <div class="relative">
                        <button id="theme-toggle" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Сменить тему">
                            <svg id="theme-icon-light" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <svg id="theme-icon-dark" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 718.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
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
                                    <span class="text-gray-700">Светлая тема</span>
                                </div>
                            </button>
                            <button class="theme-option w-full px-4 py-2 text-left hover:bg-gray-50 transition-colors" data-theme="dark">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 718.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                                    </svg>
                                    <span class="text-gray-700">Темная тема</span>
                                </div>
                            </button>
                            <button class="theme-option w-full px-4 py-2 text-left hover:bg-gray-50 rounded-b-lg transition-colors" data-theme="system">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-gray-700">Системная тема</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Главная
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-gray-500 ml-1 md:ml-2">Категории доходов</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div class="flex items-center space-x-3 mb-4 md:mb-0">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Категории доходов</h1>
                    <p class="text-gray-600 mt-1">Управление категориями доходов для точного учета</p>
                </div>
            </div>
            
            <!-- Add Category Button -->
            <a 
                href="/categories/incomes/create" 
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Добавить категорию
            </a>
        </div>

        <!-- Categories Content -->
        <?php if (empty($categories)): ?>
            <!-- Empty State -->
            <div class="bg-white rounded-2xl shadow-lg p-12 text-center card-hover">
                <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-3">Нет категорий доходов</h3>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">Начните с создания первой категории для классификации ваших доходов</p>
                <a 
                    href="/categories/incomes/create" 
                    class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Создать первую категорию
                </a>
            </div>
        <?php else: ?>
            <!-- Categories Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($categories as $cat): ?>
                    <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-100 to-emerald-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($cat['name']) ?></h3>
                                    <p class="text-sm text-gray-500">Категория доходов</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button 
                                    onclick="editCategory(<?= $cat['id'] ?>)" 
                                    class="text-blue-600 hover:text-blue-800 p-1 rounded transition-colors" 
                                    title="Редактировать"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>
                                <button 
                                    onclick="deleteCategory(<?= $cat['id'] ?>, '<?= addslashes(htmlspecialchars($cat['name'])) ?>')" 
                                    class="text-red-600 hover:text-red-800 p-1 rounded transition-colors" 
                                    title="Удалить"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-gray-500">ID категории:</span>
                                <span class="font-mono text-gray-900">#<?= $cat['id'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Summary Card -->
            <div class="mt-8 bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-900">Всего категорий доходов: <?= count($categories) ?></p>
                        <p class="text-sm text-gray-600">Отслеживайте и классифицируйте все ваши доходы для лучшего финансового планирования</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Back Link -->
        <div class="mt-8">
            <a href="/categories" class="inline-flex items-center text-gray-600 hover:text-blue-600 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Вернуться к категориям
            </a>
        </div>
    </main>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-2xl bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L4.768 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900" id="modal-title">Удалить категорию</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500" id="modal-message">
                        Вы уверены, что хотите удалить эту категорию? Это действие нельзя отменить.
                    </p>
                </div>
                <div class="items-center px-4 py-3 space-x-3 flex">
                    <button 
                        id="deleteConfirm" 
                        class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-lg w-full shadow-lg hover:bg-red-600 transition-colors"
                    >
                        Удалить
                    </button>
                    <button 
                        id="deleteCancel" 
                        class="px-4 py-2 bg-gray-300 text-gray-800 text-base font-medium rounded-lg w-full shadow-lg hover:bg-gray-400 transition-colors"
                    >
                        Отменить
                    </button>
                </div>
            </div>
        </div>
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

        // Modal functionality
        const modal = document.getElementById('deleteModal');
        const modalMessage = document.getElementById('modal-message');
        const deleteConfirm = document.getElementById('deleteConfirm');
        const deleteCancel = document.getElementById('deleteCancel');
        let categoryToDelete = null;

        // Edit category function
        window.editCategory = function(id) {
            window.location.href = `/categories/incomes/edit?id=${id}`;
        };

        // Delete category function
        window.deleteCategory = function(id, name) {
            categoryToDelete = id;
            modalMessage.textContent = `Вы уверены, что хотите удалить категорию "${name}"? Это действие нельзя отменить.`;
            modal.classList.remove('hidden');
        };

        // Confirm delete
        deleteConfirm.addEventListener('click', function() {
            if (categoryToDelete) {
                // Create a form to submit the delete request
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/categories/incomes/delete';
                
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id';
                idInput.value = categoryToDelete;
                
                form.appendChild(idInput);
                document.body.appendChild(form);
                form.submit();
            }
        });

        // Cancel delete
        deleteCancel.addEventListener('click', function() {
            modal.classList.add('hidden');
            categoryToDelete = null;
        });

        // Close modal when clicking outside
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
                categoryToDelete = null;
            }
        });
    </script>
</body>
</html>
