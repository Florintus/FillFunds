<h2>Редактировать кредитора</h2>

<?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="post" action="/categories/creditors/update">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label>Имя:<br>
        <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
    </label><br><br>
    <button type="submit">Обновить</button>
</form>
