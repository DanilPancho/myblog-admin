<?php

use Classes\Tag;

require_once '../../../Classes/Tag.php';

$tag = new Tag();

try {
    $tag->edit([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
