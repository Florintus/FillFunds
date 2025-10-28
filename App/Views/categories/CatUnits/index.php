<h2>Единицы измерения</h2>

<a href="/categories/units/create">Добавить единицу</a>

<ul>
    <?php foreach ($units as $unit): ?>
        <li>
            <?= htmlspecialchars($unit['name']) ?>
            [<a href="/categories/units/edit?id=<?= $unit['id'] ?>">Изменить</a>]
            <form action="/categories/units/delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $unit['id'] ?>">
                <button type="submit">Удалить</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
