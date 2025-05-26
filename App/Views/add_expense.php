<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить расход</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 40px auto;
            padding: 0 15px;
            background-color: #f5f5f5;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        form {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 60px;
        }

        button[type="submit"] {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #3498db;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2980b9;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }

        #theme-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 24px;
            color: #2980b9;
            transition: color 0.3s;
        }

        #theme-toggle:hover {
            color: #3498db;
        }

        /* Темная тема */
        body.dark {
            background-color: #121212;
            color: #ddd;
        }

        body.dark h1 {
            color: #eee;
        }

        body.dark form {
            background-color: #1e1e1e;
            box-shadow: none;
        }

        body.dark input,
        body.dark textarea {
            background-color: #2c2c2c;
            color: #fff;
            border: 1px solid #444;
        }

        body.dark button[type="submit"] {
            background-color: #3a5f9f;
        }

        body.dark button[type="submit"]:hover {
            background-color: #4b75c2;
        }

        body.dark .back-link {
            color: #aaccff;
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
