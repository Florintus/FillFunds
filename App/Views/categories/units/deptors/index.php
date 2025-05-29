<h2>Должники</h2>

<a href="/categories/debtors/create">Добавить должника</a>

<ul>
    <?php foreach ($debtors as $debtor): ?>
        <li>
            <?= htmlspecialchars($debtor['name']) ?>
            [<a href="/categories/debtors/edit?id=<?= $debtor['id'] ?>">Изменить</a>]
            <form action="/categories/debtors/delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $debtor['id'] ?>">
                <button type="submit">Удалить</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
