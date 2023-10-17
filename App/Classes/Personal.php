<?php

namespace Classes;

use Exception;

require_once 'Connection.php';
require_once 'Auth.php';

class Personal extends Connection
{
    private string $showStatement = 'SELECT * FROM users WHERE id = :id';
    private string $editStatement = 'UPDATE users SET name = :name, email = :email, surname = :surname WHERE id = :id';
    private string $changePasswordStatement = 'UPDATE users SET password = :new_password WHERE id = :id';

    /**
     * @return mixed
     */
    public function show(): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->showStatement);
        $stmt->execute([
            'id' => $_SESSION['user_id'],
        ]);
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
     * @return mixed
     */
    public function changePassword(array $params): mixed
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->changePasswordStatement);
        $stmt->execute($params);
        return $stmt->fetch();
    }
}