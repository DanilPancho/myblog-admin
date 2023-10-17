<?php

namespace Classes;

require_once 'Connection.php';

use Exception;

class Category extends Connection
{
    private string $createStatement = 'INSERT INTO categories (name) VALUES (:name)';
    private string $indexStatement = 'SELECT * FROM categories';
    private string $showStatement = 'SELECT * FROM categories WHERE id = :id';
    private string $editStatement = 'UPDATE categories SET name = :name WHERE id = :id';
    private string $deleteStatement = 'DELETE FROM categories WHERE id = :id';

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
     * @return mixed
     */
    public function edit(array $params): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->editStatement);
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
