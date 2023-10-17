<?php

use Classes\Post;

require_once '../../../Classes/Post.php';

$post = new Post();

try {
    $post->delete($_GET['id']);
    header('Location: /views/post/index.php');
} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: /views/post/index.php');
