<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <title>Регистрация</title>
</head>
<body>
    <h1>Регистрация</h1>
    <?php if (!empty($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php elseif (!empty($success)): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <?php if (empty($success)): ?>    
    <form action="/register" method="post" autocomplete="off">
        <label for="username">Логин:</label>
        <input type="text" name="username" id="username" required autofocus />

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required />

        <label for="password">Пароль:</label>
        <input type="password" name="password" id="password" required />

        <label for="password_confirm">Подтверждение пароля:</label>
        <input type="password" name="password_confirm" id="password_confirm" required />
        <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars(\App\Services\CSRFService::generateToken()) ?>">

        <button type="submit">Зарегистрироваться</button>
    </form>
    <?php endif; ?>
    <p>Уже есть аккаунт? <a href="/login">Войти</a></p>
</body>
</html>
