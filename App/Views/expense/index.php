<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список расходов</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <button id="theme-toggle" title="Переключить тему">🌓</button>
    <h1>Список расходов</h1>

    <p class="add-expense"><a href="/expenses/create">Добавить расход</a></p>

    <?php if (empty($expenses)): ?>
        <p class="no-expenses">Расходы не найдены.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Счёт</th>
                    <th>Категория</th>
                    <th>Подкатегория</th>
                    <th>Кол-во</th>
                    <th>Ед.</th>
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($expenses as $e): ?>
                    <tr>
                        <td><?= htmlspecialchars($e['date']) ?></td>
                        <td><?= htmlspecialchars($e['account'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($e['category']) ?></td>
                        <td><?= htmlspecialchars($e['subcategory'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($e['amount']) ?></td>
                        <td><?= htmlspecialchars($e['unit'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($e['description']) ?></td>
                        <td>
                            <a href="/expenses/edit?id=<?= $e['id'] ?>">✏️</a>
                            <a href="/expenses/delete?id=<?= $e['id'] ?>" onclick="return confirm('Удалить?')">🗑️</a>
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