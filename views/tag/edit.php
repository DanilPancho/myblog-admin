<?php

use Classes\Tag;

$GLOBALS['page'] = 'tags';

require_once '../../App/Classes/Tag.php';


$service = new Tag();
$tag = $service->show(['id' => $_GET['id']]);

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

                        Теги

                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a style="text-decoration: none;"
                       href="<?= 'show.php' . '?id=' . $tag['id'] ?>">

                        Просмотр тега

                    </a>
                </li>

                <li class="breadcrumb-item active"
                    aria-current="page">

                    Редактирование тега "<?= $tag['name'] ?>"

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

            <form action="/App/Http/Controllers/TagController/edit.php" method="POST">

                <div class="row">
                    <div class="col">

                        <label class="small fw-bold mt-2 mb-1"
                               for="input">

                            Название тега

                        </label>

                        <div class="d-flex">
                            <input placeholder="Название тега"
                                   value="<?= $tag['name'] ?>"
                                   class="form-control"
                                   name="name"
                                   type="text"
                                   id="input">

                            <input value="<?= $tag['id'] ?>"
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