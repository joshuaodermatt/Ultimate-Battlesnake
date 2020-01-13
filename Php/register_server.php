<?php
require 'dbc.php';

$errors_complet = check($email, $username, $pwd, $usernameUsed, $emailUsed);

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


    $count = $pdo->exec("INSERT INTO `ranking` (username) VALUES ('$username')");
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