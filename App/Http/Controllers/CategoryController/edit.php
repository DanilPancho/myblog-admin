<?php

use Classes\Category;

require_once '../../../Classes/Category.php';

$category = new Category();

try {
    $category->edit([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: /views/category/index.php');
