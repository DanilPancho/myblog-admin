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
        <div class="border rounded-lg overflow-hidden">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="px-3 align-middle">ID</th>
                    <th class="w-100 align-middle">Название</th>
                    <th class="text-nowrap align-middle">Дата создания</th>
                    <th class="text-nowrap align-middle">Дата обновления</th>
                    <th>
                        <div class="d-flex justify-content-end">
                            <a href="/views/category/create.php"
                               class="btn btn-primary d-flex justify-content-center align-items-center"
                               style="width: 32px; height: 32px;">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         fill="white"
                                         viewBox="0 0 24 24"
                                         width="24"
                                         height="24">
                                        <path d="M11.75 4.5a.75.75 0 0 1 .75.75V11h5.75a.75.75 0 0 1 0 1.5H12.5v5.75a.75.75 0 0 1-1.5 0V12.5H5.25a.75.75 0 0 1 0-1.5H11V5.25a.75.75 0 0 1 .75-.75Z"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td class="px-3 align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $category['id'] ?>
                            </a>
                        </td>

                        <td class="align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $category['name'] ?>
                            </a>
                        </td>

                        <td class="text-nowrap align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $category['created_at'] ?>
                            </a>
                        </td>

                        <td class="text-nowrap align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $category['updated_at'] ?>
                            </a>
                        </td>

                        <td class="text-nowrap">
                            <div class="d-flex gap-2">
                                <a href="<?= 'edit.php?id=' . $category['id'] ?>"
                                   class="btn btn-warning d-flex justify-content-center align-items-center"
                                   style="width: 32px; height: 32px;">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="white"
                                             viewBox="0 0 16 16"
                                             width="16"
                                             height="16">
                                            <path d="M11.013 1.427a1.75 1.75 0 0 1 2.474 0l1.086 1.086a1.75 1.75 0 0 1 0 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 0 1-.927-.928l.929-3.25c.081-.286.235-.547.445-.758l8.61-8.61Zm.176 4.823L9.75 4.81l-6.286 6.287a.253.253 0 0 0-.064.108l-.558 1.953 1.953-.558a.253.253 0 0 0 .108-.064Zm1.238-3.763a.25.25 0 0 0-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 0 0 0-.354Z"></path>
                                        </svg>
                                    </div>
                                </a>

                                <a href="<?= '/App/Http/Controllers/CategoryController/delete.php?id=' . $category['id'] ?>"
                                   onclick="return confirm('Удалить категорию?')"
                                   class="btn btn-danger d-flex justify-content-center align-items-center"
                                   type="button"
                                   style="width: 32px; height: 32px;">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="white"
                                             viewBox="0 0 16 16"
                                             width="16"
                                             height="16">
                                            <path d="M11 1.75V3h2.25a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1 0-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75ZM4.496 6.675l.66 6.6a.25.25 0 0 0 .249.225h5.19a.25.25 0 0 0 .249-.225l.66-6.6a.75.75 0 0 1 1.492.149l-.66 6.6A1.748 1.748 0 0 1 10.595 15h-5.19a1.75 1.75 0 0 1-1.741-1.575l-.66-6.6a.75.75 0 1 1 1.492-.15ZM6.5 1.75V3h3V1.75a.25.25 0 0 0-.25-.25h-2.5a.25.25 0 0 0-.25.25Z"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>

