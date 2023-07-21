<?php

use Classes\Category;

$GLOBALS['page'] = 'categories';

require_once '../../App/Classes/Category.php';
$category = new Category();
$categories = $category->index();

require_once '../../includes/head.php';
require_once '../../includes/sidebar.php';
?>

<main class="main-content">

    <?php require_once '../../includes/navbar.php' ?>

    <div class="container navbar-breadcrumb-pos-x navbar-breadcrumb-pos-y">
        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a style="text-decoration: none;"
                   href="/views/main.php">

                    Главная

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Категории

            </li>

        </ol>
    </div>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-end">

            <a href="/views/category/create.php"
               class="btn btn-primary">

                Добавить категорию

            </a>

        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Дата обновления</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php foreach ($categories as $category): ?>
                <tr onclick="location.href='<?= 'show.php' . "?id=" . $category['id'] ?>'"
                    style="cursor: pointer;">

                    <th scope="row">
                        <a style="text-decoration: none; color: #121212;">
                            <?= $category['id'] ?>
                        </a>
                    </th>
                    <td>
                        <a style="text-decoration: none; color: #121212;">
                            <?= $category['name'] ?>
                        </a>
                    </td>
                    <td>
                        <a style="text-decoration: none; color: #121212;">
                            <?= $category['created_at'] ?>
                        </a>
                    </td>
                    <td>
                        <a style="text-decoration: none; color: #121212;">
                            <?= $category['updated_at'] ?>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>

