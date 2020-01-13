<?php
$user = 'd041e_joodermatt';
$password = '54321_Db!!!';

$pdo = new PDO('mysql:host=mysql3.webland.ch/;dbname=d041e_joodermatt', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);
?>