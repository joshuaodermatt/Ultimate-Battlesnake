<?php
$user = 'snake';
$password = 's1n2a3k4e5';

$pdo = new PDO('mysql:host=localhost;dbname=snake', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$stmt = $pdo->prepare("INSERT INTO `user` (username, email, pwd) VALUES(:username, :email, :pwd) ");
$stmt->execute([':username' => htmlspecialchars($username), ':email' => htmlspecialchars($email), ':pwd' => htmlspecialchars($pwd)]);


$stmt->fetchAll();

?>