<?php

use Classes\Post;
use Classes\Tag;
use Classes\Category;

$GLOBALS['page'] = 'posts';

require_once '../../App/Classes/Post.php';
require_once '../../includes/head.php';
require_once '../../includes/sidebar.php';
require_once '../../App/Classes/Category.php';
require_once '../../App/Classes/Tag.php';

$service = new Post();
$tag = new Tag();
$category = new Category();

$post = $service->show(['id' => $_GET['id']]);
$tags = $tag->index();
$categories = $category->index();

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
                   href="/views/post/index.php">

                    Посты

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Добавить пост

            </li>

        </ol>
    </div>

    <div class="container d-flex justify-content-between mt-3 mb-3">

        <a href="index.php"
           type="button"
           class="btn btn-primary">

            Назад

        </a>

    </div>

    <div class="container">

        <form action="/App/Http/Controllers/PostController/edit.php"
              enctype="multipart/form-data"
              method="POST">

            <div class="row">
                <div class="col">

                    <div>
                        <label class="small fw-bold mt-2 mb-1"
                               for="input">

                            Название поста

                        </label>
                        <input placeholder="Название поста"
                               value="<?= $post['name'] ?>"
                               class="form-control"
                               name="name"
                               type="text"
                               id="input">
                    </div>

                    <div class="mt-3">
                        <label class="small fw-bold mt-2 mb-1"
                               for="content">

                            Содержание

                        </label>
                        <textarea class="form-control"
                                  name="content"
                                  id="content"
                                  cols="30"
                                  rows="10"
                                  placeholder="Содержание (Максимальное количество символов 2800)"><?= $post['content'] ?></textarea>
                    </div>

                    <div class="mt-3">
                        <label class="small fw-bold mt-2 mb-1"
                               for="previewImage">

                            Изображение поста

                        </label>
                        <div id="previewImage">
                            <img src="<?= '../../public/images/' . $post['preview_image'] ?>"
                                 alt="Главное изображение">
                        </div>
                        <label class="small"
                               for="previewImageCheck">
                            Обновить изображение?
                        </label>
                        <input class="ms-1 mt-3"
                               type="checkbox"
                               style="width: 16px; height: 16px;"
                               id="previewImageCheck">
                        <input class="form-control"
                               name="preview_image"
                               type="file"
                               id="previewImage">
                    </div>

                    <div class="mt-3">
                        <label for="mainImage">
                            Главное изображение
                        </label>
                        <div id="main_image">
                            <img src="<?= '../../public/images/' . $post['main_image'] ?>"
                                 alt="Главное изображение">
                        </div>
                        <label class="small"
                               for="mainImageCheck">
                            Обновить изображение?
                        </label>
                        <input class="ms-1 mt-3"
                               type="checkbox"
                               style="width: 16px; height: 16px;"
                               id="mainImageCheck">
                        <input class="form-control"
                               name="main_image"
                               type="file"
                               id="mainImage">
                    </div>

                    <div class="mt-3">
                        <label class="small fw-bold mt-2 mb-1"
                               for="categorySelect">

                            Выбор категории

                        </label>
                        <select class="form-select select2bs4"
                                name="category_id"
                                aria-label="Default select example"
                                id="categorySelect">
                            <optgroup label="Выбор категории">
                                <option> - </option>
                                <?php foreach ($categories as $category): ?>

                                    <option selected="selected"
                                            value="">

                                        <?= $category['name'] ?>

                                    </option>

                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label class="small fw-bold mt-2 mb-1"
                               for="tagSelect">

                            Выбор тегов

                        </label>
                        <select class="form-select select2bs4"
                                multiple="multiple"
                                name="tag_ids"
                                aria-label="Default select example"
                                id="tagSelect">
                            <optgroup label="Выбор тега">
                                <?php foreach ($tags as $tag): ?>

                                    <option selected="selected" value="<?= $tag['id'] ?>">

                                        <?= $tag['name'] ?>

                                    </option>

                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <input class="btn btn-outline-primary mt-2"
                               type="submit"
                               value="Сохранить">

                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

                    </div>

                </div>
            </div>

        </form>
    </div>
</main>

<?php require_once '../../includes/foot.php' ?>

