<?php

use Classes\Post;

$GLOBALS['page'] = 'posts';

require_once '../../App/Classes/Post.php';

$service = new Post();
$post = $service->show(['id' => $_GET['id']]);

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

            <li class="breadcrumb-item">
                <a style="text-decoration: none;"
                   href="index.php">

                    Посты

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Просмотр поста

            </li>
        </ol>
    </div>

    <div class="container-fluid d-flex justify-content-between mt-3 mb-3">

        <a href="index.php"
           type="button"
           class="btn btn-primary">

            Назад

        </a>

        <div class="btn-group" role="group" aria-label="Basic example">

            <a href="<?= 'edit.php' . '?id=' . $post['id'] ?>"
               type="button"
               class="btn btn-primary">

                Редактировать

            </a>

            <a href="<?= '../../App/Controllers/PostController/delete.php' . '?id=' . $post['id'] ?>"
               onclick="return confirm('Удалить пост?')"
               class="btn btn-danger"
               type="button">

                <svg xmlns="http://www.w3.org/2000/svg"
                     width="20" height="20"
                     fill="currentColor"
                     class="bi pe-none"
                     viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                </svg>

            </a>

        </div>
    </div>

    <div class="container-fluid">
        <table class="table table-hover">
            <tbody class="table-group-divider">
            <tr>
                <td>ID</td>
                <td><?= $post['id'] ?></td>
            </tr>
            <tr>
                <td>Название</td>
                <td><?= $post['name'] ?></td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td><?= $post['created_at'] ?></td>
            </tr>
            <tr>
                <td>Дата обновления</td>
                <td><?= $post['updated_at'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>
