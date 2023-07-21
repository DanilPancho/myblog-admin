<?php

use Classes\Category;

require_once '../../../Classes/Category.php';

$category = new Category();

try {
    $category->delete([
        'id' => $_GET['id'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
