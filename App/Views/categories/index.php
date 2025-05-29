<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Категории</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        tr.selected {
            background-color: #d6eaff !important;
        }
        body.dark tr.selected {
            background-color: #3a5f9f !important;
        }
    </style>
</head>
<body>
    <h1>Категории</h1>

    <table>
        <thead>
            <tr>
                <th>Тип</th>
                <th>Название</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($categories)): ?>
                <tr><td colspan="2">Категорий нет</td></tr>
            <?php else: ?>
                <?php foreach ($categories as $category): ?>
                    <tr data-id="<?= htmlspecialchars($category['id']) ?>" data-type="<?= htmlspecialchars($category['type']) ?>">
                        <td><?= htmlspecialchars($category['type']) ?></td>
                        <td><?= htmlspecialchars($category['name']) ?></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: center;">
        <button onclick="handleAction('create')">Добавить</button>
        <button onclick="handleAction('edit')">Редактировать</button>
        <form id="delete-form" method="POST" action="/categories/delete" style="display:inline;">
            <input type="hidden" name="id" id="delete-id">
            <input type="submit" value="Удалить">
        </form>
    </div>

    <script>
    let selectedRow = null;
        let selectedId = null;

        document.querySelectorAll('table tbody tr').forEach(row => {
            row.addEventListener('click', () => {
                document.querySelectorAll('table tbody tr').forEach(r => r.classList.remove('selected'));
                row.classList.add('selected');
                selectedRow = row;
                selectedId = row.dataset.id;
            });
        });

        document.getElementById('edit-btn').addEventListener('click', () => {
            if (selectedId) {
                window.location.href = `/categories/edit?id=${selectedId}`;
            } else {
                alert('Выберите запись для редактирования.');
            }
        });

        document.getElementById('delete-btn').addEventListener('click', () => {
            if (selectedId && confirm('Удалить выбранную запись?')) {
                fetch(`/categories/delete?id=${selectedId}`, { method: 'POST' })
                    .then(() => location.reload());
            } else if (!selectedId) {
                alert('Сначала выберите запись.');
            }
        });
    </script>
</body>
</html>
