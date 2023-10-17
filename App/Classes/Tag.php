<?php

namespace Classes;

require_once 'Connection.php';

use Exception;

class Tag extends Connection
{
    private string $createStatement = 'INSERT INTO tags (name) VALUES (:name)';
    private string $indexStatement = 'SELECT * FROM tags';
    private string $showStatement = 'SELECT * FROM tags WHERE id = :id';
    private string $editStatement = 'UPDATE tags SET name = :name WHERE id = :id';
    private string $deleteStatement = 'DELETE FROM tags WHERE id = :id';
    private string $postTagStatement = 'SELECT * FROM post_tag JOIN tags ON tags.id = post_tag.tag_id WHERE post_tag.post_id = :post_id;';
    private string $editPostTagStatement = 'UPDATE post_tag SET tag_id = :tag_id WHERE post_id = :post_id';

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
     * @return void
     * @throws Exception
     */
    public function create(array $params): void
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->createStatement);
        $stmt->execute($params);
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
     * @return false|array
     */
    public function forPost(array $params): false|array
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->postTagStatement);
        $stmt->execute($params);
        return $stmt->fetchAll();
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

    public function postTagEdit(array $params)
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->editPostTagStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }

    /**
     * @param array $params
     * @return void
     */
    public function delete(array $params): void
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->deleteStatement);
        $stmt->execute($params);
    }
}
