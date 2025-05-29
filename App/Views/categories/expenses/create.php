<h2>Добавить категорию расхода</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="/categories/expenses/store">
    <label>Название:<br>
        <input type="text" name="name" required>
    </label><br><br>
    <button type="submit">Сохранить</button>
</form>