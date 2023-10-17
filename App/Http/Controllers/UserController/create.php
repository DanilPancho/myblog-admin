<?php

use Classes\User;

require_once '../../../Classes/User.php';

$user = new User();

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$surname = trim($_POST['surname']);
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];
$role = $_POST['role'];

if (empty($email)) {
    die('Поле "Email" обязательно к заполнению');
}

if (empty($password)) {
    die('Поле "Пароль" обязательно к заполнению');
}

if (empty($passwordConfirmation)) {
    die('Поле "Подтверждение пароля" обязательно к заполнению');
}

if (empty($password === $passwordConfirmation)) {
    die('Пароль не соответствует с подтвержденным');
}

if (mb_strlen($password) <= 7) {
    die('Пароль должен содержать не менее 8 символов');
}

$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

try {
    $user->create([
        'name' => $name,
        'email' => $email,
        'surname' => $surname,
        'password' => $password,
        'role' => $role,
    ]);

} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: /views/user/index.php');
