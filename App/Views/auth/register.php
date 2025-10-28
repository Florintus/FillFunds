<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Регистрация' ?> - FillFunds</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            <h1>Регистрация</h1>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form action="/register" method="POST" class="auth-form">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirm">Повторите пароль</label>
                    <input type="password" id="password_confirm" name="password_confirm" required>
                </div>

                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>

            <p class="auth-link">
                Уже есть аккаунт? <a href="/login">Войти</a>
            </p>
        </div>
    </div>
</body>
</html>