<?php

namespace Classes;

require_once 'Connection.php';

use Exception;

class Post extends Connection
{
    private string $createStatement = 'INSERT INTO posts (name, content, preview_image, main_image, user_id, category_id) VALUES (:name, :content, :preview_image, :main_image, :user_id, :category_id)';
    private string $indexStatement = 'SELECT * FROM posts';
    private string $showStatement = 'SELECT * FROM posts WHERE id = :id';
    private string $editStatement = 'UPDATE posts SET name = :name, content = :content, category_id = :category_id WHERE id = :id';
    private string $editPreviewImgStatement = 'UPDATE posts SET preview_image = :preview_image WHERE id = :id';
    private string $editMainImgStatement = 'UPDATE posts SET main_image = :main_image WHERE id = :id';
    private string $deleteStatement = 'DELETE FROM posts WHERE id = :id';
    private string $bindTagsStatement = 'INSERT INTO post_tag (tag_id, post_id) VALUES (:tag_id, :post_id)';

    /**
     * @return array|false
     */
    public function index(): false|array
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->indexStatement);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * @param array $params
     * @return false|string
     */
    public function create(array $params): false|string
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->createStatement);
        $stmt->execute($params);
        return $connection->lastInsertId();
    }

    /**
     * @param $postId
     * @param array $tagIds
     * @return void
     */
    public function bindTags($postId, array $tagIds = []): void
    {
        $connection = $this->connect();
        foreach ($tagIds as $tagId) {
            $stmt = $connection->prepare($this->bindTagsStatement);
            $stmt->execute([
                'post_id' => $postId,
                'tag_id' => $tagId,
            ]);
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function show(array $params): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->showStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function edit(array $params): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->editStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    public function editPreviewImg(array $params)
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->editPreviewImgStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }
    public function editMainImg(array $params)
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->editMainImgStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * @param $postId
     * @return void
     */
    public function delete($postId): void
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->showStatement);
        $stmt->execute(['id' => $postId]);
        $post = $stmt->fetchObject();
        unlink('../../../../public/images/' . $post->preview_image);
        unlink('../../../../public/images/' . $post->main_image);
        $stmt = $connection->prepare($this->deleteStatement);
        $stmt->execute(['id' => $_GET['id']]);
    }
}
