<?php
    $dsn = 'mysql:host=localhost;dbname=college_php';
    $username = 'root';
    $password = '';
    // $dsn = 'mysql:host=localhost;dbname=D00251856';
    // $username = 'D00251856';
    // $password = '6eRP3xbK';
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>