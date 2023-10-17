<?php
require '../../../../vendor/autoload.php';

use Classes\Auth;

session_start();

require_once '../../../Classes/Auth.php';

$auth = new Auth();

$email = trim($_POST['email']);
$password = $_POST['password'];

if (empty($email)) {
    die('Поле "Логин" должно быть заполнено');
}

if (empty($password)) {
    die('Поле "Пароль" должно быть заполнено');
}

try {
    $auth->auth([
        'login' => $email,
        'password' => $password,
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

try {
    $auth->auth([
        'password' => $password,
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: ../../../../views/main.php');
