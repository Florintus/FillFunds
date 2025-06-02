<h2>Категории расходов</h2>

<a href="/categories/expenses/create">Добавить категорию</a>

<ul>
    <?php foreach ($categories as $cat): ?>
        <li>
            <?= htmlspecialchars($cat['name']) ?>
            [<a href="/categories/expenses/edit?id=<?= $cat['id'] ?>">Изменить</a>]
            <form action="/categories/expenses/delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                <button type="submit">Удалить</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>