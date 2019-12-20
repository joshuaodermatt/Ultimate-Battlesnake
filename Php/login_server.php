<?php

$user = 'snake';
$password = 's1n2a3k4e5';

$pdo = new PDO('mysql:host=localhost;dbname=snake', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);



$stmt = $pdo->query('SELECT * FROM `user`');

foreach($stmt->fetchAll() as $x) {
    
    $pwdIsTrue = false;
    $UsNameOrEmail = false;
    if($x['username'] === $EOU|| $x['email'] === $EOU){
        $UsNameOrEmail = true;
    }
    if($x['pwd'] === $pwd){
        $pwdIsTrue = true;
    }
    if($pwdIsTrue === true && $UsNameOrEmail === true ){
        session_start();
        $_SESSION['UsName'] = $x['username'];
        $_SESSION['email'] = $x['email'];
        $_SESSION['pwd'] = $x['pwd'];
        
        header('Location: index.php');

    }else{
        ?>
        <div>
            <p id='error'>Login felhlgeschlagen</p>
        </div>
        <?php
    }
}


?>