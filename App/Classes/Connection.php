<?php

namespace Classes;
use PDO;
use PDOException;

class Connection
{
    public string $servername = '0.0.0.0';
    public string $username = 'root';
    public string $password = 'localhost';
    public string $dbname = 'mysql';

    /**
     * @return void
     */
    public function connect(): void
    {
        try {
            $conn = new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
