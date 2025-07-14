<!-- Домашняя_Страница -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Домашняя бухгалтерия</title>
    <style>
        /* --- Базовые стили (светлая тема) --- */
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 0 15px;
            background-color: #fafafa;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        h1, h2 {
            text-align: center;
            color: #2c3e50;
            transition: color 0.3s;
        }
        nav {
            text-align: center;
            margin-bottom: 20px;
        }
        nav a {
            margin: 0 15px;
            color: #2980b9;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }
        nav a:hover {
            text-decoration: underline;
        }
        p.add-expense {
            text-align: center;
            margin-bottom: 30px;
        }
        p.add-expense a {
            background-color: #27ae60;
            color: #fff;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        p.add-expense a:hover {
            background-color: #219150;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            transition: background-color 0.3s, color 0.3s;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px 15px;
            text-align: left;
        }
        th {
            background-color: #2980b9;
            color: white;
            transition: background-color 0.3s;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
            transition: background-color 0.3s;
        }
        form {
            display: inline;
        }
        button, input[type="submit"] {
            cursor: pointer;
            padding: 5px 12px;
            border: none;
            border-radius: 3px;
            color: white;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        button {
            background-color: #3498db;
        }
        button:hover {
            background-color: #2980b9;
        }
        input[type="submit"] {
            background-color: #e74c3c;
        }
        input[type="submit"]:hover {
            background-color: #c0392b;
        }
        p.no-expenses {
            text-align: center;
            font-style: italic;
            color: #666;
            transition: color 0.3s;
        }

        /* --- Стили для кнопки переключения темы --- */
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
        }
        #theme-toggle:hover {
            color: #3498db;
        }

        /* --- Тёмная тема --- */
        body.dark {
            background-color: #121212;
            color: #ddd;
        }
        body.dark h1,
        body.dark h2 {
            color: #eee;
        }
        body.dark nav a {
            color: #66aaff;
        }
        body.dark nav a:hover {
            color: #99cfff;
        }
        body.dark p.add-expense a {
            background-color: #2ecc71;
            color: #121212;
        }
        body.dark p.add-expense a:hover {
            background-color: #27ae60;
            color: #fafafa;
        }
        body.dark table {
            background-color: #1e1e1e;
            color: #ddd;
        }
        body.dark th {
            background-color: #2980b9;
        }
        body.dark tr:nth-child(even) {
            background-color: #2c2c2c;
        }
        body.dark p.no-expenses {
            color: #aaa;
        }
        body.dark button {
            background-color: #3498db;
        }
        body.dark button:hover {
            background-color: #2980b9;
        }
        body.dark input[type="submit"] {
            background-color: #e74c3c;
        }
        body.dark input[type="submit"]:hover {
            background-color: #c0392b;
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

    <!-- Кнопка переключения темы -->
    <button id="theme-toggle" aria-label="Переключить тему">
        🌞
    </button>

    <h1>Добро пожаловать в домашнюю бухгалтерию!</h1>

    <p class="add-expense">
        <a href="/add">Добавить новый расход</a>
    </p>

    <nav>
        <a href="/">Главная</a>
        <a href="/logs">История изменений</a>
    </nav>

    <button onclick="document.getElementById('calculator').style.display='block'" style="margin-bottom: 15px;">Калькулятор</button>
    <?php include __DIR__ . '/partials/calculator.php'; ?>


    <h2>Список расходов</h2>

    <?php if (!empty($expenses)): ?>
        <table>
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Сумма</th>
                    <th>Категория</th>
                    <th>Описание</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($expenses as $expense): ?>
                    <tr>
                        <td><?= htmlspecialchars($expense['date']) ?></td>
                        <td><?= htmlspecialchars($expense['amount']) ?></td>
                        <td><?= htmlspecialchars($expense['category']) ?></td>
                        <td><?= htmlspecialchars($expense['description']) ?></td>
                        <td>
                            <button onclick="location.href='/edit?id=<?= $expense['id'] ?>'">Редактировать</button>
                            <form action="/delete" method="post" onsubmit="return confirm('Удалить этот расход?');" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $expense['id'] ?>">
                                <input type="submit" value="Удалить">
                                <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars(\App\Services\CSRFService::generateToken()) ?>">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-expenses">Расходов пока нет.</p>
    <?php endif; ?>

    <script>
        // Элементы
        const toggleBtn = document.getElementById('theme-toggle');
        const body = document.body;

        // Иконки для тем
        const sunIcon = '🌞';
        const moonIcon = '🌙';

        // Загрузка темы из localStorage
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

        // Переключение темы
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

        // Инициализация
        loadTheme();
    </script>

</body>
</html>
