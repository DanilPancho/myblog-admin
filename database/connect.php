<?php

$servername = "0.0.0.0";
$username = "root";
$password = "localhost";
$dbname = "blog";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

    if (empty($_POST['name'])) exit("Поле должно быть заполнено");

    $query = "INSERT INTO categories (name) VALUES (:name)";
    $category = $conn->prepare($query);
    $category->execute(['name' => $_POST['name']]);

    header("Location: /views/category/category.php");

} catch (PDOException $e) {
    echo $e->getMessage();
}
