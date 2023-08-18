<?php

use Classes\Auth;

$GLOBALS['page'] = 'auth';

require_once '../App/Classes/Auth.php';

$auth = new Auth();

session_start();

if (!empty($_SESSION['user_id'])) {
    header('Location: main.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/assets/vendor/bootstrap-5.3.0-dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link href="/assets/app.css"
          rel="stylesheet">
</head>
<script src="/assets/vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
<body class="bg-body-secondary">
<div class="vh-100 p-0 m-0 row justify-content-center align-items-center">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3">

        <div class="card p-4">
            <form action="../App/Http/Controllers/AuthController/login.php" method="post">

                <div class="mb-3">
                    <label class="small mb-2 fw-bold" for="login">
                        Логин
                    </label>

                    <input class="form-control"
                           placeholder="Email"
                           name="email"
                           type="text"
                           id="login">
                </div>

                <div class="mb-3">
                    <label class="small mb-2 fw-bold" for="password">
                        Пароль
                    </label>

                    <input class="form-control"
                           placeholder="Пароль"
                           name="password"
                           type="password"
                           id="password">
                </div>

                <div>
                    <input class="form-control btn btn-primary"
                           value="Войти"
                           type="submit">
                </div>

            </form>
        </div>

    </div>
</div>
</body>
</html>

<?php require_once '../includes/foot.php' ?>
