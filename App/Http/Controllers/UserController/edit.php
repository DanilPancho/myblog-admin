<?php

use Classes\User;

require_once '../../../Classes/User.php';

$user = new User();

$id = $_POST['id'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$surname = trim($_POST['surname']);

if (empty($name)) {
    die('Поле "Имя пользователя" обязательно к заполнению');
}
if (empty($email)) {
    die('Поле "Email" обязательно к заполнению');
}
try {
    $user->edit([
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'surname' => $surname,
    ]);

} catch (Exception $e) {
    die($e->getMessage());
}
