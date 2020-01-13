<?php

require 'dbc.php';



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
        $_SESSION['id'] = $x['id']; 
        
        header('Location: index.php');


    }
}

    if(!isset($_SESSION['UsName'])){
    ?>
    <div>
        <p id='error'>Login felhlgeschlagen!</p>
    </div>
    <?php 
    }
    

?>