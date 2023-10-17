<?php

use Classes\Category;
use Classes\Post;
use Classes\Tag;

$GLOBALS['page'] = 'posts';

require_once '../../App/Classes/Post.php';
require_once '../../App/Classes/Category.php';
require_once '../../App/Classes/Tag.php';

$postService = new Post();
$post = $postService->show(['id' => $_GET['id']]);

$categoryService = new Category();
$category = $categoryService->show(['id' => $post['category_id']]);

$tagService = new Tag();
$tags = $tagService->forPost(['post_id' => $post['id']]);

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

    <div class="container d-flex justify-content-between mt-3 mb-3">

        <a href="index.php"
           type="button"
           class="btn btn-primary">

            Назад

        </a>

        <div class="btn-group" role="group" aria-label="Basic example">

            <a href="<?= 'edit.php' . '?id=' . $post['id'] ?>"
               type="button"
               class="btn btn-warning">

                Редактировать

            </a>

            <a href="<?= '../../App/Http/Controllers/PostController/delete.php' . '?id=' . $post['id'] ?>"
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

    <div class="container mt-3">
        <label for="id">
            ID
        </label>
        <div class="form-control"
             id="id">
            <?= $post['id'] ?>
        </div>

        <label for="previewImage">
            Изображение поста
        </label>
        <div id="previewImage">
            <img style="height: 200px;" src="<?= '../../public/images/' . $post['preview_image'] ?>"
                 alt="Изображение поста">
        </div>

        <label for="name">
            Название
        </label>
        <div class="form-control"
             id="name">
            <?= $post['name'] ?>
        </div>

        <label for="content">
            Содержание
        </label>
        <textarea class="form-control"
                  disabled="disabled"
                  readonly="readonly"
                  style="resize: none; background: white; line-height: 1.8;"
                  cols="140"
                  rows="20"
                  id="content"><?= $post['content'] ?></textarea>

        <label for="mainImage">
            Главное изображение
        </label>
        <div id="mainImage">
            <img style="height: 200px;" src="<?= '../../public/images/' . $post['main_image'] ?>"
                 alt="Главное изображение">
        </div>

        <label for="category">
            Категория
        </label>
        <div class="form-control"
             id="category">
            <?= $category['name'] ?>
        </div>

        <label for="tag">
            Теги
        </label>
        <div class="form-control"
             id="tag">
            <?php foreach ($tags as $tag): ?>

                <?= $tag['name'] ?>

            <?php endforeach; ?>
        </div>

        <label for="content">
            Дата создания
        </label>
        <div class="form-control">
            <?= $post['created_at'] ?>
        </div>

        <label for="content">
            Дата обновления
        </label>
        <div class="form-control mb-4">
            <?= $post['updated_at'] ?>
        </div>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>
