<?php

namespace Classes;

use Exception;

require_once 'Connection.php';

class Auth extends Connection
{
    private string $userStatement = 'SELECT * FROM users WHERE email = :email';
    private string $userByIdStatement = 'SELECT * FROM users WHERE id = :id';

    /**
     * @throws Exception
     */
    public function auth(array $credentials)
    {
        if (!isset($credentials['login']) || !isset($credentials['password'])) {
            return false;
        }
        $connection = $this->connect();
        $stmt = $connection->prepare($this->userStatement);
        $stmt->execute([
            'email' => $credentials['login']
        ]);

        $user = $stmt->fetchObject();

        if(!$user) {
            throw new Exception('Пользователь не найден!');
        }

        if (!password_verify($credentials['password'], $user->password)) {
            throw new Exception('Неверный логин или пароль');
        }
        return $_SESSION['user_id'] = $user->id;
    }

    public function getUserById($id)
    {
        $connection = $this->connect();
        $stmt = $connection->prepare($this->userByIdStatement);
        $stmt->execute([
            'id' => $id,
        ]);
        return $stmt->fetchObject();
    }
}
