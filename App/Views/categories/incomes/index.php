<h2>Категории доходов</h2>

<a href="/categories/incomes/create">Добавить категорию</a>

<ul>
    <?php foreach ($categories as $cat): ?>
        <li>
            <?= htmlspecialchars($cat['name']) ?>
            [<a href="/categories/incomes/edit?id=<?= $cat['id'] ?>">Изменить</a>]
            <form action="/categories/incomes/delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $cat['id'] ?>">
                <button type="submit">Удалить</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
