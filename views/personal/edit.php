<?php

use Classes\Personal;

$GLOBALS['page'] = 'personal';

require_once '../../includes/head.php';
require_once '../../includes/sidebar.php';
require_once '../../App/Classes/Personal.php';

$service = new Personal();
$user = $service->show();

?>

<main class="main-content">

    <?php require_once '../../includes/navbar.php' ?>

    <div class="container navbar-breadcrumb-pos-x navbar-breadcrumb-pos-y">
        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a>

                    Личный кабинет

                </a>
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
        <form action="/App/Http/Controllers/PersonalController/edit.php" method="POST">
            <div class="row">
                <div class="col-6">

                    <label class="small fw-bold mt-2 mb-1"
                           for="name">

                        Имя пользователя

                    </label>
                    <input placeholder="Имя пользователя"
                           class="form-control"
                           name="name"
                           type="text"
                           value="<?= $user['name'] ?>"
                           id="name">

                </div>
                <div class="col-6">

                    <label class="small fw-bold mt-2 mb-1"
                           for="surname">

                        Фамилия

                    </label>
                    <input placeholder="Фамилия"
                           class="form-control"
                           name="surname"
                           type="text"
                           value="<?= $user['surname'] ?>"
                           id="surname">

                </div>
            </div>

            <div class="row">
                <div class="col-6 mt-3">

                    <label class="small fw-bold mt-2 mb-1"
                           for="email">

                        Email

                    </label>
                    <input placeholder="Email"
                           class="form-control"
                           name="email"
                           type="email"
                           value="<?= $user['email'] ?>"
                           id="email">

                </div>
            </div>

            <div class="row">
                <div class="d-flex justify-content-between mt-3">
                    <a href="/views/personal/change-password.php" class="btn btn-outline-primary">

                        Сменить пароль

                    </a>

                    <input class="btn btn-outline-primary"
                           type="submit"
                           value="Сохранить">

                    <input type="hidden" name="id" value="<?= $user['id'] ?>">

                </div>
            </div>

        </form>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>
