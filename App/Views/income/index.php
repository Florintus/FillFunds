<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список доходов - FillFunds</title>
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
        .container { max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; }
        .card { background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
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
            background: linear-gradient(to right, #10b981, #059669); 
            color: white; 
        }
        .btn-primary:hover { 
            background: linear-gradient(to right, #059669, #047857); 
            transform: translateY(-1px);
        }
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
        .theme-toggle { 
            background: #f3f4f6; 
            border: none; 
            border-radius: 0.5rem; 
            padding: 0.5rem; 
            cursor: pointer; 
            font-size: 1.125rem;
            transition: all 0.2s;
        }
        .theme-toggle:hover { background: #e5e7eb; }
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
            justify-content: space-between;
            margin-bottom: 2rem; 
        }
        .page-info {
            display: flex; 
            align-items: center; 
            gap: 0.75rem; 
        }
        .page-icon { 
            width: 48px; 
            height: 48px; 
            background: linear-gradient(135deg, #10b981, #059669); 
            border-radius: 0.75rem; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: white;
        }
        .page-title { font-size: 2rem; font-weight: bold; color: #111827; }
        .page-subtitle { color: #6b7280; margin-top: 0.25rem; }
        .table { 
            width: 100%; 
            border-collapse: collapse; 
            background: white; 
            border-radius: 0.75rem; 
            overflow: hidden; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .table th { 
            background: #f9fafb; 
            padding: 1rem; 
            text-align: left; 
            font-weight: 600; 
            color: #374151; 
            border-bottom: 1px solid #e5e7eb;
        }
        .table td { 
            padding: 1rem; 
            border-bottom: 1px solid #f3f4f6; 
            color: #111827;
        }
        .table tr:hover { background: #f9fafb; }
        .table tr:last-child td { border-bottom: none; }
        .action-btn { 
            padding: 0.25rem 0.5rem; 
            margin: 0 0.125rem; 
            border-radius: 0.25rem; 
            text-decoration: none; 
            font-size: 0.875rem;
            transition: all 0.2s;
        }
        .edit-btn { background: #dbeafe; color: #1d4ed8; }
        .edit-btn:hover { background: #bfdbfe; }
        .delete-btn { background: #fecaca; color: #dc2626; }
        .delete-btn:hover { background: #fca5a5; }
        .empty-state { 
            text-align: center; 
            padding: 3rem; 
            color: #6b7280;
        }
        .empty-icon { 
            width: 64px; 
            height: 64px; 
            margin: 0 auto 1rem; 
            opacity: 0.5;
        }
        .summary-card { 
            background: linear-gradient(135deg, #f0fdf4, #dcfce7); 
            padding: 1.5rem; 
            border-radius: 0.75rem; 
            margin-top: 2rem;
        }
        @media (max-width: 768px) { 
            .page-header { flex-direction: column; gap: 1rem; align-items: flex-start; }
            .table { font-size: 0.875rem; }
            .table th, .table td { padding: 0.75rem 0.5rem; }
        }
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
        .dark .card {
            background-color: #1e293b;
        }
        .dark .header {
            background-color: #1e293b;
        }
        .dark .logo-text {
            color: #f1f5f9;
        }
        .dark .page-title {
            color: #f1f5f9;
        }
        .dark .table {
            background-color: #1e293b;
        }
        .dark .table th {
            background-color: #0f172a;
            color: #94a3b8;
        }
        .dark .table td {
            color: #f1f5f9;
            border-color: #374151;
        }
        .dark .table tr:hover {
            background-color: #374151;
        }
        .dark .theme-toggle {
            background: #374151;
            color: #f1f5f9;
        }
        .dark .theme-toggle:hover {
            background: #4b5563;
        }
        .dark .summary-card {
            background: linear-gradient(135deg, #064e3b, #065f46);
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
            <button id="theme-toggle" class="theme-toggle" title="Переключить тему">🌓</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="/">Главная</a>
            <span>→</span>
            <span>Доходы</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-info">
                <div class="page-icon">
                    <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="page-title">Список доходов</h1>
                    <p class="page-subtitle">Отслеживание и учет всех ваших поступлений</p>
                </div>
            </div>
            
            <!-- Add Income Button -->
            <a href="/incomes/create" class="btn btn-primary">
                <svg style="display: inline-block; width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Добавить доход
            </a>
        </div>

        <!-- Incomes Content -->
        <?php if (empty($incomes)): ?>
            <!-- Empty State -->
            <div class="card">
                <div class="empty-state">
                    <svg class="empty-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                    <h3 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">Доходы не найдены</h3>
                    <p style="margin-bottom: 1.5rem;">Начните отслеживать свои доходы для лучшего понимания финансового состояния</p>
                    <a href="/incomes/create" class="btn btn-primary">
                        <svg style="display: inline-block; width: 20px; height: 20px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Добавить первый доход
                    </a>
                </div>
            </div>
        <?php else: ?>
            <!-- Incomes Table -->
            <div class="card-hover">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Дата</th>
                            <th>Счёт</th>
                            <th>Категория</th>
                            <th>Подкатегория</th>
                            <th>Сумма</th>
                            <th>Ед.</th>
                            <th>Описание</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($incomes as $income): ?>
                            <tr>
                                <td>
                                    <div style="font-weight: 500;">
                                        <?= date('d.m.Y', strtotime($income['date'])) ?>
                                    </div>
                                    <div style="font-size: 0.875rem; color: #6b7280;">
                                        <?= date('H:i', strtotime($income['date'])) ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="display: flex; align-items: center;">
                                        <div style="width: 32px; height: 32px; background: #d1fae5; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-right: 0.75rem;">
                                            <svg style="width: 16px; height: 16px; color: #10b981;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                            </svg>
                                        </div>
                                        <div style="font-weight: 500;">
                                            <?= htmlspecialchars($income['account'] ?? 'Не указан') ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 500;">
                                        <?= htmlspecialchars($income['category']) ?>
                                    </div>
                                    <?php if (!empty($income['subcategory'])): ?>
                                        <div style="font-size: 0.875rem; color: #6b7280;">
                                            <?= htmlspecialchars($income['subcategory']) ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($income['subcategory'] ?? '-') ?></td>
                                <td>
                                    <div style="font-weight: 500; color: #10b981;">
                                        +<?= number_format($income['amount'], 2) ?> ₽
                                    </div>
                                    <?php if (!empty($income['unit'])): ?>
                                        <div style="font-size: 0.875rem; color: #6b7280;">
                                            <?= htmlspecialchars($income['unit']) ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($income['unit'] ?? '-') ?></td>
                                <td style="max-width: 200px;">
                                    <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                        <?= htmlspecialchars($income['description'] ?: 'Без описания') ?>
                                    </div>
                                </td>
                                <td>
                                    <a href="/incomes/edit?id=<?= $income['id'] ?>" class="action-btn edit-btn" title="Редактировать">✏️</a>
                                    <a href="/incomes/delete?id=<?= $income['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Удалить доход?')" title="Удалить">🗑️</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Summary Card -->
            <div class="summary-card">
                <div style="display: flex; align-items: center;">
                    <div style="width: 48px; height: 48px; background: #10b981; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; margin-right: 1rem;">
                        <svg style="width: 24px; height: 24px; color: white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p style="font-size: 1.125rem; font-weight: 600; color: #111827;">
                            Всего доходов: <?= count($incomes) ?>
                            <?php 
                            $totalAmount = array_sum(array_column($incomes, 'amount'));
                            if ($totalAmount > 0): ?>
                                | Общая сумма: <?= number_format($totalAmount, 2) ?> ₽
                            <?php endif; ?>
                        </p>
                        <p style="font-size: 0.875rem; color: #6b7280;">Отслеживайте свои доходы для эффективного планирования бюджета</p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Back Link -->
        <div style="margin-top: 2rem;">
            <a href="/" style="color: #6b7280; text-decoration: none;">
                ← Вернуться на главную
            </a>
        </div>
    </main>

    <script type="module">
        // Theme switching functionality
        const themeToggle = document.getElementById('theme-toggle');
        
        // Get saved theme or default to light
        let currentTheme = localStorage.getItem('theme') || 'light';

        // Apply theme
        function applyTheme(theme) {
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
            
            currentTheme = theme;
            localStorage.setItem('theme', theme);
        }

        // Initialize theme
        applyTheme(currentTheme);

        // Toggle theme
        themeToggle.addEventListener('click', function() {
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            applyTheme(newTheme);
        });
    </script>
</body>
</html>
