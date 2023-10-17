<?php

use Classes\User;

require_once __DIR__ . '/../App/Classes/User.php';

session_start();

if (empty($_SESSION['user_id'])) {
    header('Location: auth.php');
}
$service = new User();
$authUser = (object)$service->show(['id' => $_SESSION['user_id']]);

if ($authUser->role !== 2) {
    unset($_SESSION['user_id']);
    header('Location: /views/auth.php');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">

    <title>Blog | Admin</title>

    <link href="/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"
          rel="stylesheet">
    <link href="/assets/vendor/adminlte/css/adminlte.min.css"
          rel="stylesheet">
    <link href="/assets/vendor/bootstrap-5.3.0-dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons-1.10.5/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link href="/assets/app.css"
          rel="stylesheet">
    <link href="/assets/vendor/select2/css/select2.min.css"
          rel="stylesheet">
    <link href="/assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css"
          rel="stylesheet">
    <link href="/assets/vendor/jquery-ui/jquery-ui.min.css">
</head>

<script src="/assets/vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/select2/js/select2.full.min.js"></script>
<script src="/assets/vendor/adminlte/js/adminlte.min.js"></script>
<script src="/assets/vendor/jquery-ui/jquery-ui.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: 'Выберите вариант'
        });
    })
</script>
<body>