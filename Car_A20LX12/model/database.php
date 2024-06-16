<?php
    $dsn = 'mysql:host=localhost;dbname=car_classic';
    $username = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_db = $e->getMessage();
        include ("../errors/error_database.php");
        exit();
    }
?>