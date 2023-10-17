<?php

use Classes\Post;
use Ramsey\Uuid\Uuid;

require_once '../../../Classes/Post.php';
require_once '../../../../vendor/autoload.php';

$post = new Post();

if (empty($_POST['name'])) {
    die('Поле "Имя" должно быть заполнено');
}

if (empty($_POST['content'])) {
    die('Содержание должно быть заполнено');
}

if (empty(mb_strlen($_POST['content']) <= 2800)) {
    die('Содержание не должно превышать 2800 символов');
}

if (empty($_FILES['preview_image']['name'])) {
    die('Поле "Изображение поста" должно быть заполнено');
}

if (empty($_FILES['main_image']['name'])) {
    die('Поле "Главное изображение" должно быть заполнено');
}

$previewImageName = Uuid::uuid4() . $_FILES['preview_image']['name'];
$mainImageName = Uuid::uuid4() . $_FILES['main_image']['name'];

move_uploaded_file($_FILES['preview_image']['tmp_name'], '../../../../public/images/' . $previewImageName);
move_uploaded_file($_FILES['main_image']['tmp_name'], '../../../../public/images/' . $mainImageName);

try {
    $postId = $post->create([
        'name' => $_POST['name'],
        'content' => $_POST['content'],
        'preview_image' => $previewImageName,
        'main_image' => $mainImageName,
        'user_id' => $_POST['user_id'],
        'category_id' => $_POST['category_id'],
    ]);
    $post->bindTags($postId, $_POST['tag_ids'] ?? []);
} catch (Exception $e) {
    die($e->getMessage());
}

header('Location: /views/post/index.php');
