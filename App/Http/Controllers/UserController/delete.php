<?php

use Classes\User;

require_once '../../../Classes/User.php';

$user = new User();

try {
    $user->delete([
        'id' => $_GET['id'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
