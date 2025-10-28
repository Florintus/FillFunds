<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список доходов - FillFunds</title>
    <link rel="stylesheet" href="/css/main.css">
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
            <a href="/income/create" class="btn btn-primary">
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
                    <a href="/income/create" class="btn btn-primary">
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
                                    <a href="/income/edit?id=<?= $income['id'] ?>" class="action-btn edit-btn" title="Редактировать">✏️</a>
                                    <a href="/income/delete?id=<?= $income['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Удалить доход?')" title="Удалить">🗑️</a>
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
