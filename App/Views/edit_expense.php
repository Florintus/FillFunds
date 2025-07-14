<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать расход</title>
</head>
<body>
    <h1>Редактировать расход</h1>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/edit" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($expense['id']) ?>">

        <label>Сумма:<br>
            <input type="number" step="0.01" name="amount" value="<?= htmlspecialchars($expense['amount']) ?>" required>
        </label><br><br>

        <label>Категория:<br>
            <input type="text" name="category" value="<?= htmlspecialchars($expense['category']) ?>" required>
        </label><br><br>

        <label>Описание:<br>
            <textarea name="description"><?= htmlspecialchars($expense['description']) ?></textarea>
        </label><br><br>

        <label>Дата:<br>
            <input type="date" name="date" value="<?= htmlspecialchars($expense['date']) ?>" required>
        </label><br><br>

        <button type="submit">Сохранить</button>
        <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars(\App\Services\CSRFService::generateToken()) ?>">
    </form>

    <p><a href="/">← Вернуться на главную</a></p>
</body>
</html>
