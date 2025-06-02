<!-- Домашняя_Страница -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Домашняя бухгалтерия</title>
    <link rel="stylesheet" href="/css/style.css">
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
        <a href="/accounts">Счета</a>
        <a href="/expenses">Расходы</a>
        <a href="/incomes">Доходы</a>
        <a href="/categories">Категории</a>
        <a href="/settings">Настройки</a>
    </nav>

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
