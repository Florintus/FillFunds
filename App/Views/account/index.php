<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список счетов</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <button id="theme-toggle" title="Переключить тему">🌓</button>
    <h1>Счета</h1>

    <p class="add-expense"><a href="/accounts/create">Добавить новый счёт</a></p>

    <?php if (empty($accounts)): ?>
        <p class="no-expenses">Счета не найдены.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Начальный баланс</th>
                    <th>Примечание</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $acc): ?>
                    <tr>
                        <td><?= htmlspecialchars($acc['name']) ?></td>
                        <td><?= number_format($acc['initial_balance'], 2, ',', ' ') ?> ₽</td>
                        <td><?= nl2br(htmlspecialchars($acc['note'])) ?></td>
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