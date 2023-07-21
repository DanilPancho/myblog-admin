<?php

use Classes\Post;

require_once '../../../Classes/Post.php';

$post = new Post();

try {
    $post->delete([
        'id' => $_GET['id'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
