<h2>Добавить единицу измерения</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="/categories/units/store">
    <label>Название:<br>
        <input type="text" name="name" required>
    </label><br><br>
    <button type="submit">Сохранить</button>
</form>
