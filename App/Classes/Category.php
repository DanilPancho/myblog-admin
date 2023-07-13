<?php

namespace Classes;

use PDO;
use PDOException;

class Category extends Connection
{
    /**
     * @return void
     */
    public function create(): void
    {
        try {
            $conn = new PDO("mysql:host=$this->servername; dbname=$this->dbname", $this->username, $this->password);

            if (empty($_POST['name'])) exit("Поле должно быть заполнено");

            $query = "INSERT INTO categories (name) VALUES (:name)";
            $category = $conn->prepare($query);
            $category->execute(['name' => $_POST['name']]);

            header("Location: /views/category/category.php");

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
