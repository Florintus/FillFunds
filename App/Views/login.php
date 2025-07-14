<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Вход</title>
</head>
<body>
    <h1>Вход</h1>

    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="/login" method="post" autocomplete="off">
        <label for="username">Логин:</label>
        <input type="text" name="username" id="username" required autofocus />

        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required />

        <button type="submit">Войти</button>

        <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars(\App\Services\CSRFService::generateToken()) ?>">
    </form>

    <p>Нет аккаунта? <a href="/register">Зарегистрироваться</a></p>
</body>
</html>
