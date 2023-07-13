<?php

$servername = "0.0.0.0";
$username = "root";
$password = "localhost";
$dbname = "blog";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    echo 'База данных подключена';
} catch (PDOException $e) {
    echo 'Не удалось подключиться к базе данных' . $e->getMessage();
    exit();
}