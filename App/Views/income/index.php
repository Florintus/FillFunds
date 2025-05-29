<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список доходов</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <button id="theme-toggle" title="Переключить тему">🌓</button>
    <h1>Список доходов</h1>

    <p class="add-expense"><a href="/incomes/create">Добавить доход</a></p>

    <?php if (empty($incomes)): ?>
        <p class="no-expenses">Доходы не найдены.</p>
    <?php else: ?>
        <table>
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
                        <td><?= htmlspecialchars($income['date']) ?></td>
                        <td><?= htmlspecialchars($income['account'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($income['category']) ?></td>
                        <td><?= htmlspecialchars($income['subcategory'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($income['amount']) ?></td>
                        <td><?= htmlspecialchars($income['unit'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($income['description']) ?></td>
                        <td>
                            <a href="/incomes/edit?id=<?= $income['id'] ?>">✏️</a>
                            <a href="/incomes/delete?id=<?= $income['id'] ?>" onclick="return confirm('Удалить?')">🗑️</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

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