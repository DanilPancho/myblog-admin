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

    <div class="container">
        <form class="form-change-password" action="/App/Http/Controllers/PersonalController/change-password.php" method="POST">

            <div>
                <label class="d-flex small mt-2"
                       style="margin: unset"
                       for="old-password">

                    Старый пароль

                </label>
                <div>
                    <input class="form-control"
                           placeholder="Введите старый пароль"
                           name="old_password"
                           type="password"
                           id="old-password">
                </div>
                <label class="d-flex small mt-2"
                       style="margin: unset"
                       for="new-password">

                    Новый пароль

                </label>
                <div>
                    <input class="form-control"
                           placeholder="Введите новый пароль"
                           name="new_password"
                           type="password"
                           id="new-password">
                </div>

                <div>
                    <input class="form-control mt-3 btn btn-outline-primary"
                           value="Сохранить"
                           type="submit">

                </div>
            </div>

        </form>
    </div>

</main>

<?php require_once '../../includes/foot.php' ?>
