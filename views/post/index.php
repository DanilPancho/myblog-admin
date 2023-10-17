<?php

use Classes\Post;

$GLOBALS['page'] = 'posts';

require_once '../../App/Classes/Post.php';
$post = new Post();
$posts = $post->index();

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

                Посты

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
                            <a href="/views/post/create.php"
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
                <?php foreach ($posts as $post): ?>
                    <tr style="cursor: pointer;">

                        <td class="px-3 align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $post['id'] ?>
                            </a>
                        </td>
                        <td class="align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $post['name'] ?>
                            </a>
                        </td>
                        <td class="text-nowrap align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $post['created_at'] ?>
                            </a>
                        </td>
                        <td class="text-nowrap align-middle">
                            <a style="text-decoration: none; color: #121212;">
                                <?= $post['updated_at'] ?>
                            </a>
                        </td>
                        <td class="text-nowrap align-middle">
                            <div class="d-flex">
                                <a href="/views/post/show.php?id= <?= $post['id'] ?>"
                                   class="btn btn-primary d-flex justify-content-center align-items-center"
                                   style="width: 32px; height: 32px;">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="white"
                                             viewBox="0 0 24 24"
                                             width="24"
                                             height="24">
                                            <path d="M15.5 12a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"></path>
                                            <path d="M12 3.5c3.432 0 6.124 1.534 8.054 3.241 1.926 1.703 3.132 3.61 3.616 4.46a1.6 1.6 0 0 1 0 1.598c-.484.85-1.69 2.757-3.616 4.461-1.929 1.706-4.622 3.24-8.054 3.24-3.432 0-6.124-1.534-8.054-3.24C2.02 15.558.814 13.65.33 12.8a1.6 1.6 0 0 1 0-1.598c.484-.85 1.69-2.757 3.616-4.462C5.875 5.034 8.568 3.5 12 3.5ZM1.633 11.945a.115.115 0 0 0-.017.055c.001.02.006.039.017.056.441.774 1.551 2.527 3.307 4.08C6.691 17.685 9.045 19 12 19c2.955 0 5.31-1.315 7.06-2.864 1.756-1.553 2.866-3.306 3.307-4.08a.111.111 0 0 0 .017-.056.111.111 0 0 0-.017-.056c-.441-.773-1.551-2.527-3.307-4.08C17.309 6.315 14.955 5 12 5 9.045 5 6.69 6.314 4.94 7.865c-1.756 1.552-2.866 3.306-3.307 4.08Z"></path>
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

