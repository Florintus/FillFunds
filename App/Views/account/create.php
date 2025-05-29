<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить счёт</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="add-expense-page">
    <button id="theme-toggle" title="Переключить тему">🌓</button>

    <h1>Добавить счёт</h1>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/accounts/store" method="post">
        <label>Название счёта:<br>
            <input type="text" name="name" required>
        </label><br><br>

        <label>Начальный баланс:<br>
            <input type="number" name="initial_balance" step="0.01" value="0" required>
        </label><br><br>

        <label>Примечание:<br>
            <textarea name="note"></textarea>
        </label><br><br>

        <button type="submit">Сохранить</button>
    </form>

    <p><a class="back-link" href="/">← Вернуться на главную</a></p>

    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
        }

        document.getElementById('theme-toggle').addEventListener('click', () => {
            document.body.classList.toggle('dark');
            localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
        });
    </script>
</body>
</html>