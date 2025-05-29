<h2>Добавить категорию дохода</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="/categories/incomes/store">
    <label>Название:<br>
        <input type="text" name="name" required>
    </label><br><br>
    <button type="submit">Сохранить</button>
</form>
