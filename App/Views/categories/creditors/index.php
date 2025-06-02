<h2>Кредиторы</h2>

<a href="/categories/creditors/create">Добавить кредитора</a>

<ul>
    <?php foreach ($creditors as $creditor): ?>
        <li>
            <?= htmlspecialchars($creditor['name']) ?>
            [<a href="/categories/creditors/edit?id=<?= $creditor['id'] ?>">Изменить</a>]
            <form action="/categories/creditors/delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $creditor['id'] ?>">
                <button type="submit">Удалить</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
