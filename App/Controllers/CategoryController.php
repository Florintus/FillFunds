<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
        public function index(): void
    {
        $model = new Category();
        $expenses = $model->getAllByType('expense');
        $incomes = $model->getAllByType('income');
        $creditors = $model->getAllByType('creditor');
        $debtors = $model->getAllByType('debtor');
        $units = $model->getAllByType('unit');

        require_once __DIR__ . '/../Views/categories/index.php';
    }

    public function delete(): void
    {
        $id = intval($_GET['id'] ?? 0);
        if ($id > 0) {
            $model = new Category();
            $model->delete($id);
        }
        header('Location: /categories');
        exit;
    }

    public function editForm(): void
    {
        $id = intval($_GET['id'] ?? 0);
        $model = new Category();
        $category = $model->getById($id);
        require_once __DIR__ . '/../Views/category/edit.php';
    }

    public function update(): void
    {
        $id = intval($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        if ($id > 0 && $name !== '') {
            $model = new Category();
            $model->update($id, $name);
        }
        header('Location: /categories');
        exit;
    }
    
    public function createForm(): void
    {
        require_once __DIR__ . '/../Views/categories/create.php';
    }

    public function create(): void
    {
        $name = trim($_POST['name'] ?? '');
        $type = trim($_POST['type'] ?? '');

        if ($name !== '' && $type !== '') {
            $model = new Category();
            $model->create($name, $type);
        }

        header('Location: /categories');
        exit;
    }
}
