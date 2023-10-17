<?php

use Classes\Tag;

require_once '../../../Classes/Tag.php';

$tag = new Tag();

try {
    $tag->create([
        'name' => $_POST['name'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: /views/tag/index.php');
