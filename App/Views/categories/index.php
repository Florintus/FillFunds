<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить расход - FillFunds</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; 
            background-color: #f9fafb;
            color: #111827;
            line-height: 1.6;
        }
        .container { max-width: 1024px; margin: 0 auto; padding: 2rem 1rem; }
        .card { background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; font-weight: 500; margin-bottom: 0.5rem; color: #374151; }
        .form-input, .form-select, .form-textarea { 
            width: 100%; 
            padding: 0.75rem; 
            border: 1px solid #d1d5db; 
            border-radius: 0.5rem; 
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus { 
            outline: none; 
            border-color: #dc2626; 
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1); 
        }
        .btn { 
            padding: 0.75rem 1.5rem; 
            border: none; 
            border-radius: 0.5rem; 
            font-weight: 500; 
            cursor: pointer; 
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn-primary { 
            background: linear-gradient(to right, #dc2626, #ec4899); 
            color: white; 
        }
        .btn-primary:hover { 
            background: linear-gradient(to right, #b91c1c, #db2777); 
            transform: translateY(-1px);
        }
        .btn-secondary { 
            background: #f3f4f6; 
            color: #374151; 
        }
        .btn-secondary:hover { background: #e5e7eb; }
        .header { 
            background: white; 
            padding: 1rem 0; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); 
            margin-bottom: 2rem;
        }
        .header-content { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 0 1rem; 
            display: flex; 
            align-items: center; 
            justify-content: space-between;
        }
        .logo { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
        }
        .logo-icon { 
            width: 40px; 
            height: 40px; 
            background: linear-gradient(135deg, #3b82f6, #8b5cf6); 
            border-radius: 0.75rem; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: white; 
            font-weight: bold; 
            font-size: 1.125rem;
        }
        .logo-text { font-size: 1.5rem; font-weight: bold; color: #111827; }
        .breadcrumb { 
            display: flex; 
            align-items: center; 
            gap: 0.5rem; 
            margin-bottom: 2rem; 
            color: #6b7280;
        }
        .breadcrumb a { color: #6b7280; text-decoration: none; }
        .breadcrumb a:hover { color: #3b82f6; }
        .page-header { 
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
            margin-bottom: 2rem; 
        }
        .page-icon { 
            width: 48px; 
            height: 48px; 
            background: linear-gradient(135deg, #dc2626, #ec4899); 
            border-radius: 0.75rem; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: white;
        }
        .page-title { font-size: 2rem; font-weight: bold; color: #111827; }
        .page-subtitle { color: #6b7280; margin-top: 0.25rem; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        .form-actions { 
            display: flex; 
            gap: 1rem; 
            margin-top: 2rem; 
        }
        @media (max-width: 768px) { 
            .form-row { grid-template-columns: 1fr; }
            .form-actions { flex-direction: column; }
            .header-content { flex-direction: column; gap: 1rem; }
        }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .selected-row { background-color: #dbeafe !important; }
        
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
        .dark .selected-row {
            background-color: #1e40af !important;
        }
        .dark .hover\:bg-red-50:hover {
            background-color: #7f1d1d;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <div class="logo-icon">F</div>
                <div class="logo-text">FillFunds</div>
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
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="/">Главная</a>
            <span>→</span>
            <a href="/expenses">Расходы</a>
            <span>→</span>
            <span>Добавить расход</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m16 0l-4-4m4 4l-4 4"></path>
                </svg>
            </div>
            <div>
                <h1 class="page-title">Добавить расход</h1>
                <p class="page-subtitle">Создайте новую запись о расходе</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="card">
            <form method="post" action="/expenses/store">
                <div class="form-row">
                    <!-- Date -->
                    <div class="form-group">
                        <label for="date" class="form-label">Дата расхода</label>
                        <input 
                            type="date" 
                            id="date"
                            name="date" 
                            required 
                            value="<?= date('Y-m-d') ?>"
                            class="form-input"
                        >
                    </div>

                    <!-- Amount -->
                    <div class="form-group">
                        <label for="amount" class="form-label">Сумма расхода</label>
                        <input 
                            type="number" 
                            id="amount"
                            name="amount" 
                            step="0.01" 
                            required 
                            class="form-input"
                            placeholder="0.00"
                        >
                    </div>
                </div>

                <!-- Account -->
                <div class="form-group">
                    <label for="account" class="form-label">Счет списания</label>
                    <select 
                        id="account"
                        name="account" 
                        required 
                        class="form-select"
                    >
                        <option value="">Выберите счет</option>
                        <?php foreach ($accounts as $account): ?>
                            <option value="<?= htmlspecialchars($account['id']) ?>">
                                <?= htmlspecialchars($account['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-row">
                    <!-- Category -->
                    <div class="form-group">
                        <label for="category" class="form-label">Категория</label>
                        <input 
                            type="text" 
                            id="category"
                            name="category" 
                            required 
                            class="form-input"
                            placeholder="Например: Продукты, Транспорт"
                        >
                    </div>

                    <!-- Subcategory -->
                    <div class="form-group">
                        <label for="subcategory" class="form-label">Подкатегория</label>
                        <input 
                            type="text" 
                            id="subcategory"
                            name="subcategory" 
                            class="form-input"
                            placeholder="Уточните категорию"
                        >
                    </div>
                </div>

                <!-- Unit -->
                <div class="form-group">
                    <label for="unit" class="form-label">Единица измерения</label>
                    <input 
                        type="text" 
                        id="unit"
                        name="unit" 
                        class="form-input"
                        placeholder="кг, шт, л, м²"
                    >
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="form-label">Описание</label>
                    <textarea 
                        id="description"
                        name="description" 
                        rows="4"
                        class="form-textarea"
                        placeholder="Дополнительная информация о расходе"
                    ></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">
                        ✓ Сохранить расход
                    </button>
                    <a href="/expenses" class="btn btn-secondary" style="flex: 1;">
                        ← Отменить
                    </a>
                </div>
            </form>
        </div>

        <!-- Back Link -->
        <div style="margin-top: 2rem;">
            <a href="/expenses" style="color: #6b7280; text-decoration: none;">
                ← Вернуться к списку расходов
            </a>
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

        // Form enhancements
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.innerHTML = `
                <svg class="w-5 h-5 inline-block mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Сохранение...
            `;
            submitButton.disabled = true;
        });
    </script>
</body>
</html>
