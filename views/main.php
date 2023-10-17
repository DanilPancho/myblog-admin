<?php

use Classes\Category;
use Classes\Post;
use Classes\Tag;
use Classes\User;

$GLOBALS['page'] = 'main';

require_once '../includes/head.php';
require_once '../includes/sidebar.php';
require_once '../App/Classes/Category.php';
require_once '../App/Classes/Tag.php';
require_once '../App/Classes/Post.php';
require_once '../App/Classes/User.php';

$categoryService = new Category();
$categories = $categoryService->index();

$tagService = new Tag();
$tags = $tagService->index();

$postService = new Post();
$posts = $postService->index();

$userService = new User();
$users = $userService->index();

?>

<main class="main-content">

    <?php require_once '../includes/navbar.php' ?>

    <div class="container navbar-breadcrumb-pos-x navbar-breadcrumb-pos-y">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Главная</li>
        </ol>
    </div>

    <div class="container">
        <h1 class="mt-4 mb-4">
            <a class="text-dark"
               href="main.php"
               style="text-decoration: none;">

                Главная

            </a>
        </h1>
        <div class="row">
            <a href="../views/category/index.php"
               class="card me-auto text-dark card-decoration-link"
               style="width: 18rem; text-decoration: none;">
                <div class="card-body">
                    <h5 class="card-title">Категории</h5>
                    <p class="card-text">Небольшой пример текста, который будет опираться на заголовок карточки и
                        составлять основную часть
                        содержимое карты.</p>
                </div>
                <div class="list-group list-group-flush p-2">
                    <div class="ms-2">
                        <?= count($categories) ?>
                    </div>
                </div>
            </a>
            <a href="../views/tag/index.php"
               class="card me-auto text-dark card-decoration-link"
               style="width: 18rem; text-decoration: none;">
                <div class="card-body">
                    <h5 class="card-title">Теги</h5>
                    <p class="card-text">Небольшой пример текста, который будет опираться на заголовок карточки и
                        составлять основную часть
                        содержимое карты.</p>
                </div>
                <div class="list-group list-group-flush p-2">
                    <div class="ms-2">
                        <?= count($tags) ?>
                    </div>
                </div>
            </a>
            <a href="../views/post/index.php"
               class="card me-auto text-dark card-decoration-link"
               style="width: 18rem; text-decoration: none;">
                <div class="card-body">
                    <h5 class="card-title">Посты</h5>
                    <p class="card-text">Небольшой пример текста, который будет опираться на заголовок карточки и
                        составлять основную часть
                        содержимое карты.</p>
                </div>
                <div class="list-group list-group-flush p-2">
                    <div class="ms-2">
                        <?= count($posts) ?>
                    </div>
                </div>
            </a>
            <a href="../views/user/index.php"
               class="card me-auto text-dark card-decoration-link"
               style="width: 18rem; text-decoration: none;">
                <div class="card-body">
                    <h5 class="card-title">Пользователи</h5>
                    <p class="card-text">Небольшой пример текста, который будет опираться на заголовок карточки и
                        составлять основную часть
                        содержимое карты.</p>
                </div>
                <div class="list-group list-group-flush p-2">
                    <div class="ms-2">
                        <?= count($users) ?>
                    </div>
                </div>
            </a>
        </div>
    </div>


</main>

<?php require_once '../includes/foot.php' ?>

