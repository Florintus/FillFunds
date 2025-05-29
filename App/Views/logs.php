<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>История изменений</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

    <button id="theme-toggle" aria-label="Переключить тему">🌞</button>

    <nav>
        <a href="/">🏠 Главная</a>
        <button onclick="history.back()">← Вернуться</button>
    </nav>

    <h1>История изменений</h1>

    <table class="change-log" cellpadding="8" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>Операция</th>
                <th>Как было</th>
                <th>Как стало</th>
                <th>Когда изменено</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($logs)): ?>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?= htmlspecialchars($log['operation']) ?></td>
                    <td>
                        Сумма: <?= htmlspecialchars($log['old_amount']) ?><br>
                        Категория: <?= htmlspecialchars($log['old_category']) ?><br>
                        Описание: <?= htmlspecialchars($log['old_description']) ?><br>
                        Дата: <?= htmlspecialchars($log['old_date']) ?>
                    </td>
                    <td>
                        <?php if ($log['operation'] === 'update'): ?>
                            Сумма: <?= htmlspecialchars($log['new_amount']) ?><br>
                            Категория: <?= htmlspecialchars($log['new_category']) ?><br>
                            Описание: <?= htmlspecialchars($log['new_description']) ?><br>
                            Дата: <?= htmlspecialchars($log['new_date']) ?>
                        <?php else: ?>
                            <em>—</em>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($log['changed_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center; font-style: italic; color: #666;">
                    Нет данных для отображения
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

<script>
    const toggleBtn = document.getElementById('theme-toggle');
    const body = document.body;
    const sunIcon = '🌞';
    const moonIcon = '🌙';

    function loadTheme() {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            body.classList.add('dark');
            toggleBtn.textContent = sunIcon;
        } else {
            body.classList.remove('dark');
            toggleBtn.textContent = moonIcon;
        }
    }

    toggleBtn.addEventListener('click', () => {
        body.classList.toggle('dark');
        if (body.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            toggleBtn.textContent = sunIcon;
        } else {
            localStorage.setItem('theme', 'light');
            toggleBtn.textContent = moonIcon;
        }
    });

    loadTheme();
</script>

</body>
</html>
