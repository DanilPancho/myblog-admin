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
        <div class="d-flex justify-content-end">

            <a href="/views/post/create.php"
               class="btn btn-primary">

                Добавить пост

            </a>

        </div>
    </div>

    <div class="container-fluid mt-3">
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
            <?php foreach ($posts as $post): ?>
                <tr onclick="location.href='<?= 'show.php' . "?id=" . $post['id'] ?>'"
                    style="cursor: pointer;">

                    <th scope="row">
                        <a style="text-decoration: none; color: #121212;">
                            <?= $post['id'] ?>
                        </a>
                    </th>
                    <td>
                        <a style="text-decoration: none; color: #121212;">
                            <?= $post['name'] ?>
                        </a>
                    </td>
                    <td>
                        <a style="text-decoration: none; color: #121212;">
                            <?= $post['created_at'] ?>
                        </a>
                    </td>
                    <td>
                        <a style="text-decoration: none; color: #121212;">
                            <?= $post['updated_at'] ?>
                        </a>
                    </td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>

