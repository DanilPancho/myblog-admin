<?php

use Classes\Post;

require_once '../../../Classes/Post.php';

$post = new Post();

try {
    $post->edit([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
