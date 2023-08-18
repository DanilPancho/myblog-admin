<?php

use Classes\Post;

require_once '../../../Classes/Post.php';
require_once '../../../../vendor/autoload.php';

$post = new Post();

$previewImageName = uniqid() . '_' . $_FILES['preview_image']['name'];
$mainImageName = uniqid() . '_' . $_FILES['main_image']['name'];

move_uploaded_file($_FILES['preview_image']['tmp_name'], '../../../../public/images/' . $previewImageName);
move_uploaded_file($_FILES['main_image']['tmp_name'], '../../../../public/images/' . $mainImageName);

if (empty($_POST['name'])) {
    die('Поле "Имя" должно быть заполнено');
}
if (empty(mb_strlen($_POST['content']) <= 2800 )) {
    die('Содержание не должно превышать 2800 символов');
}
if (empty($previewImageName)) {
    die('Поле "Изображение поста" должно быть заполнено');
}
if (empty($mainImageName)) {
    die('Поле "Главное изображение" должно быть заполнено');
}
try {
    $post->edit([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'content' => $_POST['content'],
        'preview_image' => $previewImageName,
        'main_image' => $mainImageName,
        'category_id' => $_POST['category_id'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
