<?php
$user = 'snake';
$password = 's1n2a3k4e5';

$pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$errors_complet = check($email, $username, $pwd);

if($errors_complet [0] === ''){
    $stmt = $pdo->prepare("INSERT INTO `user` (username, email, pwd) VALUES(:username, :email, :pwd) ");
    $stmt->execute([':username' => htmlspecialchars($username), ':email' => htmlspecialchars($email), ':pwd' => htmlspecialchars($pwd)]);
    $idForSession = '';
    $stmt = $pdo->query('SELECT * FROM `user`');
    foreach($stmt->fetchAll() as $row) {
        if($row['email'] === $email){
            $idForSession = $row['id'];
        }
    }
    
    session_start();
    $_SESSION['UsName'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['pwd'] = $pwd;
    $_SESSION['id'] = $idForSession;

    header('Location: index.php');
}else{
    echo"<div id='error_container'>";
    echo"<ul>";
    foreach($errors_complet as $error){                                                              
        echo"<li class='error'>$error</li> <br>"; 
    }
    echo"</ul>";
    echo"</div>";
}





?>