<?php

use Classes\Post;
use Classes\Tag;
use Ramsey\Uuid\Uuid;

require_once '../../../Classes/Post.php';
require_once '../../../Classes/Tag.php';
require_once '../../../../vendor/autoload.php';

$post = new Post();
$tagPost = new Tag();

if (empty($_POST['name'])) {
    die('Поле "Имя" должно быть заполнено');
}

if (empty(mb_strlen($_POST['content']) <= 2800)) {
    die('Содержание не должно превышать 2800 символов');
}

try {
    $post->edit([
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}
try {
    $tagPost->postTagEdit([
        'post_id' => $_POST['id'],
        'tag_id' => $_POST['tag_ids'],
    ]);
} catch (Exception $e) {
    die($e->getMessage());
}

if ($_POST['previewImageCheck'] == 'on') {
    if (empty($_FILES['preview_image']['name'])) {
        die('Изображение поста должно быть выбрано');
    }

    $previewImageName = Uuid::uuid4() . $_FILES['preview_image']['name'];

    move_uploaded_file($_FILES['preview_image']['tmp_name'], '../../../../public/images/' . $previewImageName);

    try {
        $post->editPreviewImg([
            'id' => $_POST['id'],
            'preview_image' => $previewImageName,
        ]);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

if ($_POST['mainImageCheck'] == 'on') {
    if (empty($_FILES['main_image']['name'])) {
        die('Главное изображение должно быть выбрано');
    }

    $mainImageName = Uuid::uuid4() . $_FILES['main_image']['name'];

    move_uploaded_file($_FILES['main_image']['tmp_name'], '../../../../public/images/' . $mainImageName);

    try {
        $post->editMainImg([
            'id' => $_POST['id'],
            'main_image' => $mainImageName,
        ]);
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

header('Location: /views/post/show.php?id=' . $_POST['id']);
