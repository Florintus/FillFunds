<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить расход</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="add-expense-page">
    <button id="theme-toggle" aria-label="Переключить тему">🌞</button>

    <h1>Добавить новый расход</h1>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/add" method="post">
        <label>Сумма:
            <input type="number" step="0.01" name="amount" required>
        </label>

        <label>Категория:
            <input type="text" name="category" required>
        </label>

        <label>Описание:
            <textarea name="description"></textarea>
        </label>

        <label>Дата:
            <input type="date" name="date" required>
        </label>

        <button type="submit">Добавить</button>
    </form>

    <a class="back-link" href="/">← Вернуться на главную</a>

    <script>
        const toggleBtn = document.getElementById('theme-toggle');
        const body = document.body;
        const sun = '🌞';
        const moon = '🌙';

        function loadTheme() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                body.classList.add('dark');
                toggleBtn.textContent = sun;
            } else {
                body.classList.remove('dark');
                toggleBtn.textContent = moon;
            }
        }

        toggleBtn.addEventListener('click', () => {
            body.classList.toggle('dark');
            if (body.classList.contains('dark')) {
                localStorage.setItem('theme', 'dark');
                toggleBtn.textContent = sun;
            } else {
                localStorage.setItem('theme', 'light');
                toggleBtn.textContent = moon;
            }
        });

        loadTheme();
    </script>

</body>
</html>
