<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить расход</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="add-expense-page">
    <h1>Добавить расход</h1>

    <?php if (!empty($error)): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/expenses/store" method="post">
        <label>Дата:<br>
            <input type="date" name="date" required>
        </label><br><br>

        <label>Счет:<br>
            <select name="account" required>
                <option value="">Выберите счет</option>
                <?php foreach ($accounts as $account): ?>
                    <option value="<?= htmlspecialchars($account['id']) ?>">
                        <?= htmlspecialchars($account['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label><br><br>

        <label>Категория:<br>
            <input type="text" name="category" required>
        </label><br><br>

        <label>Подкатегория:<br>
            <input type="text" name="subcategory">
        </label><br><br>

        <label>Сумма:<br>
            <input type="number" name="amount" step="0.01" required>
        </label><br><br>

        <label>Ед. измерения:<br>
            <input type="text" name="unit">
        </label><br><br>

        <label>Описание:<br>
            <textarea name="description"></textarea>
        </label><br><br>

        <button type="submit">Сохранить</button>
    </form>

    <p><a href="/expenses" class="back-link">← Назад к списку расходов</a></p>

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