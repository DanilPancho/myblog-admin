<?php

$GLOBALS['page'] = 'users';

require_once '../../App/Classes/User.php';

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
                   href="/views/user/index.php">

                    Пользователи

                </a>
            </li>

            <li class="breadcrumb-item active"
                aria-current="page">

                Добавить пользователя

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
        <form action="/App/Http/Controllers/UserController/create.php" method="POST">
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
                           id="email">

                </div>
                <div class="col-6 mt-3">

                    <label class="small fw-bold mt-2 mb-1"
                           for="role">

                        Роль

                    </label>
                    <select class="form-control select2bs4" id="role" name="role">
                        <optgroup class="active" label="Выберите роль">
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </optgroup>
                    </select>

                </div>
            </div>

            <div class="row">
                <div class="col-6 mt-3">

                    <label class="small fw-bold mt-2 mb-1"
                           for="password">

                        Пароль

                    </label>
                    <input placeholder="Пароль"
                           class="form-control"
                           name="password"
                           type="password"
                           id="password">

                </div>
                <div class="col-6 mt-3">

                    <label class="small fw-bold mt-2 mb-1"
                           for="password_confirmation">

                        подтверждение пароля

                    </label>
                    <input placeholder="Подтверждение пароля"
                           class="form-control"
                           name="password_confirmation"
                           type="password"
                           id="password_confirmation">

                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <input class="btn btn-outline-primary"
                       type="submit"
                       value="Добавить">

            </div>

        </form>
    </div>
</main>

<?php require_once '../../includes/foot.php' ?>

