<?php
$user = 'snake';
$password = 's1n2a3k4e5';

$pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
?>