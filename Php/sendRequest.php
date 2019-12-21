<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $request_person = $_POST['addFriend'];
    $userId = $_SESSION['id'];

    $user = 'snake';
    $password = 's1n2a3k4e5';


    $pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

    $count = $pdo->exec("INSERT INTO `friend_request` (user, request_person) VALUES ($userId, $request_person)");
}


header("Location: ../friends.php");
?>