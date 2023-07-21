<?php

use Classes\Category;

$GLOBALS['page'] = 'categories';

require_once '../../App/Classes/Category.php';


$service = new Category();
$category = $service->show(['id' => $_GET['id']]);

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

                        Категории

                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a style="text-decoration: none;"
                       href="<?= 'show.php' . '?id=' . $category['id'] ?>">

                        Просмотр категории

                    </a>
                </li>

                <li class="breadcrumb-item active"
                    aria-current="page">

                    Редактирование категории "<?= $category['name'] ?>"

                </li>
            </ol>
        </div>

        <div class="container-fluid d-flex justify-content-between mt-3 mb-3">

            <a href="<?= 'show.php' . '?id=' . $category['id'] ?>"
               type="button"
               class="btn btn-primary">

                Назад

            </a>

        </div>

        <div class="container-fluid">

            <form action="/App/Http/Controllers/CategoryController/edit.php" method="POST">

                <div class="row">
                    <div class="col">

                        <label class="small fw-bold mt-2 mb-1"
                               for="input">

                            Название категории

                        </label>

                        <div class="d-flex">
                            <input placeholder="Название категории"
                                   value="<?= $category['name'] ?>"
                                   class="form-control"
                                   name="name"
                                   type="text"
                                   id="input">

                            <input value="<?= $category['id'] ?>"
                                   type="hidden"
                                   name="id">

                            <input class="btn btn-outline-primary ms-2"
                                   type="submit"
                                   value="Сохранить">

                        </div>
                    </div>
                </div>

            </form>
        </div>

    </main>

<?php require_once '../../includes/foot.php' ?>