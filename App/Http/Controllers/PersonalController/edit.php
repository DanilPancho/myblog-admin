<?php

use Classes\Personal;

require_once '../../../../vendor/autoload.php';
require_once '../../../Classes/Personal.php';

$user = new Personal();

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

header('Location: /views/personal/index.php');
