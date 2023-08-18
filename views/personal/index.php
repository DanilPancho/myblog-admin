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

    <div class="container-fluid d-flex justify-content-end mt-3 mb-3">

        <div class="btn-group" role="group" aria-label="Basic example">

            <a href="<?= 'edit.php' . '?id=' . $user['id'] ?>"
               type="button"
               class="btn btn-primary">

                Редактировать

            </a>

        </div>
    </div>

    <div class="container-fluid mt-3">
        <table class="table table-hover">
            <tbody class="table-group-divider">
            <tr>
                <td>ID</td>
                <td><?= $user['id'] ?></td>
            </tr>
            <tr>
                <td>Имя пользователя</td>
                <td><?= $user['name'] ?></td>
            </tr>
            <tr>
                <td>Фамилия</td>
                <td><?= $user['surname'] ?></td>
            </tr>
            <tr>
                <td>email</td>
                <td><?= $user['email'] ?></td>
            </tr>
            <tr>
                <td>Дата создания</td>
                <td><?= $user['created_at'] ?></td>
            </tr>
            <tr>
                <td>Дата обновления</td>
                <td><?= $user['updated_at'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>
