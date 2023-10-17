<?php

use Classes\Personal;
use Classes\User;

$GLOBALS['page'] = 'personal';

require_once '../../includes/head.php';
require_once '../../includes/sidebar.php';
require_once '../../App/Classes/User.php';
require_once '../../App/Classes/Personal.php';

$service = new Personal();
$user = $service->show();

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

                    Пользователи

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Просмотр данных пользователя

            </li>
        </ol>
    </div>

    <div class="container d-flex justify-content-end mt-3 mb-3">

        <div class="btn-group" role="group" aria-label="Basic example">

            <a href="<?= 'edit.php' . '?id=' . $user['id'] ?>"
               type="button"
               class="btn btn-warning">

                Редактировать

            </a>

        </div>
    </div>

    <div class="container mt-3">
        <div class="card me-auto text-dark card-decoration-link"
             style="width: auto; text-decoration: none;">
            <div class="card-body">
                <p class="card-text" style="margin: unset">
                    Имя: <?= $user['name'] ?>
                </p>
                <p class="card-text" style="margin: unset">
                    Фамилия: <?= $user['surname'] ?: 'Не указано' ?>
                </p>
                <p class="card-text" style="margin: unset">
                    Почта: <?= $user['email'] ?>
                </p>
                <p class="card-text text-nowrap" style="margin: unset">
                    Дата создания: <?= $user['created_at'] ?>
                </p>
                <p class="card-text text-nowrap" style="margin: unset">
                    Дата обновления: <?= $user['updated_at'] ?>
                </p>
            </div>
            <div class="list-group list-group-flush p-2">
                <div class="ms-2">
                    <h5 class="card-title">Личный кабинет пользователя, <?= $user['name'] ?> <?= $user['surname'] ?>,
                        ID: <?= $user['id'] ?></h5>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>
