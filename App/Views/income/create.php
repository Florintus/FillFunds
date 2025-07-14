<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить доход - FillFunds</title>
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
            border-color: #10b981; 
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); 
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
            background: linear-gradient(to right, #10b981, #059669); 
            color: white; 
        }
        .btn-primary:hover { 
            background: linear-gradient(to right, #059669, #047857); 
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
            background: linear-gradient(135deg, #10b981, #059669); 
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
        .error { 
            background: #fef2f2; 
            color: #dc2626; 
            padding: 1rem; 
            border-radius: 0.5rem; 
            margin-bottom: 1.5rem; 
            border: 1px solid #fecaca;
        }
        @media (max-width: 768px) { 
            .form-row { grid-template-columns: 1fr; }
            .form-actions { flex-direction: column; }
            .header-content { flex-direction: column; gap: 1rem; }
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
        .dark .form-label {
            color: #94a3b8;
        }
        .dark .form-input, .dark .form-select, .dark .form-textarea {
            background-color: #374151;
            border-color: #4b5563;
            color: #f1f5f9;
        }
        .dark .btn-secondary {
            background: #374151;
            color: #f1f5f9;
        }
        .dark .btn-secondary:hover {
            background: #4b5563;
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
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Breadcrumb -->
        <nav class="breadcrumb">
            <a href="/">Главная</a>
            <span>→</span>
            <a href="/incomes">Доходы</a>
            <span>→</span>
            <span>Добавить доход</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-icon">
                <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                </svg>
            </div>
            <div>
                <h1 class="page-title">Добавить доход</h1>
                <p class="page-subtitle">Создайте новую запись о доходе</p>
            </div>
        </div>

        <!-- Error Message -->
        <?php if (!empty($error)): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <!-- Form Card -->
        <div class="card">
            <form method="post" action="/incomes/store">
                <div class="form-row">
                    <!-- Date -->
                    <div class="form-group">
                        <label for="date" class="form-label">Дата дохода</label>
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
                        <label for="amount" class="form-label">Сумма дохода</label>
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
                    <label for="account" class="form-label">Счет зачисления</label>
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
                            placeholder="Например: Зарплата, Фриланс, Инвестиции"
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
                        placeholder="час, проект, месяц"
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
                        placeholder="Дополнительная информация о доходе"
                    ></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">
                        ✓ Сохранить доход
                    </button>
                    <a href="/incomes" class="btn btn-secondary" style="flex: 1;">
                        ← Отменить
                    </a>
                </div>
            </form>
        </div>

        <!-- Back Link -->
        <div style="margin-top: 2rem;">
            <a href="/incomes" style="color: #6b7280; text-decoration: none;">
                ← Назад к списку доходов
            </a>
        </div>
    </main>

    <script type="module">
        // Theme switching functionality (simplified)
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }

        // Form enhancements
        document.querySelector('form').addEventListener('submit', function(e) {
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.innerHTML = `
                <svg style="display: inline-block; width: 20px; height: 20px; margin-right: 8px; animation: spin 1s linear infinite;" fill="none" viewBox="0 0 24 24">
                    <circle style="opacity: 0.25;" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path style="opacity: 0.75;" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Сохранение...
            `;
            submitButton.disabled = true;
        });

        // Add spinner animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
