<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать расход</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="add-expense-page">
    <button id="theme-toggle" aria-label="Переключить тему">
        🌞
    </button>
    <h1>Редактировать расход</h1>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/edit" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($expense['id']) ?>">

        <label>
            Сумма:<br>
            <input type="number" step="0.01" name="amount" value="<?= htmlspecialchars($expense['amount']) ?>" required>
        </label><br><br>

        <label>
            Категория:<br>
            <input type="text" name="category" value="<?= htmlspecialchars($expense['category']) ?>" required>
        </label><br><br>

        <label>
            Описание:<br>
            <textarea name="description"><?= htmlspecialchars($expense['description']) ?></textarea>
        </label><br><br>

        <label>
            Дата:<br>
            <input type="date" name="date" value="<?= htmlspecialchars($expense['date']) ?>" required>
        </label><br><br>

        <button type="submit">Сохранить</button>
    </form>

    <p><a href="/" class="back-link">← Вернуться на главную</a></p>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
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
    });
</script>
</html>
