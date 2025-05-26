<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>История изменений</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 0 15px;
            background-color: #fafafa;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            transition: color 0.3s;
            margin-bottom: 30px;
        }
        /* Навигация */
        nav {
            margin-bottom: 25px;
            display: flex;
            justify-content: flex-start;
            gap: 15px;
        }
        nav a, nav button {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 8px 15px;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            user-select: none;
        }
        nav a:hover, nav button:hover {
            background-color: #3498db;
        }
        nav button {
            font-family: inherit;
        }
        /* Кнопка переключения темы */
        #theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            user-select: none;
            outline: none;
            color: #2980b9;
            transition: color 0.3s;
            z-index: 1000;
        }
        #theme-toggle:hover {
            color: #3498db;
        }
        /* Таблица истории */
        table.change-log {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        table.change-log th,
        table.change-log td {
            border: 1px solid #ccc;
            padding: 12px 15px;
            vertical-align: top;
            text-align: left;
        }
        table.change-log th {
            background-color: #2980b9;
            color: white;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        table.change-log tr:nth-child(even) {
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }
        table.change-log tr:hover {
            background-color: #d6eaff;
        }
        em {
            color: #999;
        }
        /* Тёмная тема */
        body.dark {
            background-color: #121212;
            color: #ddd;
        }
        body.dark h1 {
            color: #eee;
        }
        body.dark nav a,
        body.dark nav button {
            background-color: #2980b9;
            color: #cce5ff;
        }
        body.dark nav a:hover,
        body.dark nav button:hover {
            background-color: #3a5f9f;
            color: white;
        }
        body.dark table.change-log {
            background-color: #1e1e1e;
            color: #ddd;
            box-shadow: none;
        }
        body.dark table.change-log th {
            background-color: #2980b9;
        }
        body.dark table.change-log tr:nth-child(even) {
            background-color: #2c2c2c;
        }
        body.dark table.change-log tr:hover {
            background-color: #3a5f9f;
        }
        body.dark em {
            color: #666;
        }
        body.dark #theme-toggle {
            color: #aaccff;
        }
        body.dark #theme-toggle:hover {
            color: #88bbff;
        }
    </style>
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
