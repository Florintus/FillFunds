<h2>Редактировать единицу измерения</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="/categories/units/update">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label>Название:<br>
        <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
    </label><br><br>
    <button type="submit">Обновить</button>
</form>
