<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить доход - FillFunds</title>
    <style>
        :root {
            --background: #f9fafb;
            --text-color: #111827;
            --primary: #2563eb;
            --secondary: #6b7280;
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --input-border: #d1d5db;
            --error-bg: #fee2e2;
            --error-color: #991b1b;
        }

        .dark {
            --background: #1f2937;
            --text-color: #f3f4f6;
            --primary: #3b82f6;
            --secondary: #9ca3af;
            --card-bg: #374151;
            --input-bg: #4b5563;
            --input-border: #6b7280;
            --error-bg: #7f1d1d;
            --error-color: #f87171;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--background);
            color: var(--text-color);
            font-family: Arial, sans-serif;
            line-height: 1.5;
            padding: 1rem;
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        header.header {
            background: var(--primary);
            color: #fff;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .logo-icon {
            background: #fff;
            color: var(--primary);
            font-weight: bold;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.5rem;
        }

        .container {
            max-width: 700px;
            margin: 2rem auto;
        }

        .breadcrumb {
            font-size: 0.9rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .page-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .page-icon {
            margin-right: 0.75rem;
            color: var(--primary);
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .page-subtitle {
            color: var(--secondary);
            font-size: 0.95rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .alert-error {
            background: var(--error-bg);
            color: var(--error-color);
        }

        .card {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            flex: 1;
            margin-bottom: 1rem;
        }

        .form-label {
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-input,
        .form-select,
        .form-textarea {
            background: var(--input-bg);
            border: 1px solid var(--input-border);
            border-radius: 4px;
            padding: 0.5rem;
            color: var(--text-color);
        }

        .form-textarea {
            resize: vertical;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.3);
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn {
            display: inline-block;
            text-align: center;
            padding: 0.75rem;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: var(--secondary);
            color: #fff;
            border: none;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .theme-toggle {
            background: none;
            border: 2px solid #fff;
            color: #fff;
            border-radius: 4px;
            padding: 0.3rem 0.6rem;
            cursor: pointer;
            font-size: 0.9rem;
            margin-left: auto;
        }

        .theme-toggle:hover {
            background: rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>

<header class="header">
    <div class="logo">
        <div class="logo-icon">F</div>
        FillFunds
    </div>
    <button class="theme-toggle" onclick="toggleTheme()">Тема</button>
</header>

<main class="container">
    <nav class="breadcrumb">
        <a href="#">Главная</a>
        <span>→</span>
        <a href="#">Доходы</a>
        <span>→</span>
        <span>Добавить доход</span>
    </nav>

    <div class="page-header">
        <div class="page-icon">💰</div>
        <div>
            <h1 class="page-title">Добавить доход</h1>
            <p class="page-subtitle">Создайте новую запись о доходе</p>
        </div>
    </div>

    <div class="card">
        <form method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="date" class="form-label">Дата дохода</label>
                    <input type="date" id="date" name="date" required class="form-input">
                </div>

                <div class="form-group">
                    <label for="amount" class="form-label">Сумма дохода</label>
                    <input type="number" id="amount" name="amount" step="0.01" required class="form-input" placeholder="0.00">
                </div>
            </div>

            <div class="form-group">
                <label for="account" class="form-label">Счет зачисления</label>
                <select id="account" name="account" required class="form-select">
                    <option value="">Выберите счет</option>
                    <option>Карта</option>
                    <option>Наличные</option>
                </select>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="category" class="form-label">Категория</label>
                    <input type="text" id="category" name="category" required class="form-input" placeholder="Зарплата, Фриланс, Инвестиции">
                </div>

                <div class="form-group">
                    <label for="subcategory" class="form-label">Подкатегория</label>
                    <input type="text" id="subcategory" name="subcategory" class="form-input" placeholder="Уточните категорию">
                </div>
            </div>

            <div class="form-group">
                <label for="unit" class="form-label">Единица измерения</label>
                <input type="text" id="unit" name="unit" class="form-input" placeholder="час, проект, месяц">
            </div>

            <div class="form-group">
                <label for="description" class="form-label">Описание</label>
                <textarea id="description" name="description" rows="4" class="form-textarea" placeholder="Дополнительная информация о доходе"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">✓ Сохранить доход</button>
                <a href="#" class="btn btn-secondary">← Отменить</a>
            </div>
        </form>
    </div>

    <div style="margin-top: 2rem;">
        <a href="#">← Назад к списку доходов</a>
    </div>
</main>

<script>
function toggleTheme() {
    document.documentElement.classList.toggle('dark');
    const theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
    localStorage.setItem('theme', theme);
}

if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
}
</script>

</body>
</html>
