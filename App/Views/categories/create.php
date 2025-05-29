<h2>Добавить категорию</h2>

<form method="post" action="/categories/store">
    <div>
        <label>Название категории:</label><br>
        <input type="text" name="name" required>
    </div>
    <div>
        <label>Тип категории:</label><br>
        <select name="type" required>
            <option value="">-- Выберите тип --</option>
            <option value="expense">Расход</option>
            <option value="income">Доход</option>
            <option value="unit">Единица измерения</option>
            <option value="creditor">Кредитор</option>
            <option value="debtor">Должник</option>
        </select>
    </div>
    <button type="submit">Сохранить</button>
</form>

<p><a href="/categories">← Назад к списку</a></p>
