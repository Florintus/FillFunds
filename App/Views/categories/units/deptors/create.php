<h2>Добавить должника</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="/categories/debtors/store">
    <label>Имя:<br>
        <input type="text" name="name" required>
    </label><br><br>
    <button type="submit">Сохранить</button>
</form>
