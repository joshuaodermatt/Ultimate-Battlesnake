
<!DOCTYPE html>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titel</title>
    <link rel="stylesheet" href="../css/register.css">
  </head>
  <body>
    <div id="logo-container">
    <a href="index.php"><img src="../recources/logo.png" alt="snake logo" id="logo"></a>
    </div>
    <div class="login-container">
        <h1 id="h1">register</h1>
        <form action="#" method="POST">
            <input class="input" type="text" name="email" placeholder="E-mail" id="mail">
            <input class="input" type="text" name="username" placeholder="Username">
            <input class="input" type="password" name="pwd" placeholder="Password">
            <button class="button"><p id="buttonp">register</p></button>
        </form>

        <?php
        $usernameUsed = false;
        $emailUsed = false;
        $email;
        $username;
        $pwd;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST["email"];
            $username = $_POST["username"];
            $pwd = $_POST["pwd"];
            require 'dbc.php';

            $stmt = $pdo->query('SELECT * FROM `user`');
            foreach($stmt->fetchAll() as $row) {
              if($email === $row['email']){
                $emailUsed = true;
              }
              if($username === $row['username']){
                $usernameUsed = true;
              }
            }
            require "php/register_server.php"; 
        }
        
        ?>
    </div>
  </body>
</html>




<?php
function check ($email, $username, $pwd, $usernameUsed, $emailUsed){

    
  if($email === '' || strpos($email, '@') === false || strpos($email, '.') === false || $emailUsed === true){
    $errors[] = 'Bitte geben Sie eine gültige E-mail an';
  }
  if($username === '' || $username > 40 || $usernameUsed === true){
    $errors[] = 'Bitte geben Sie einen gültigen Usernamen ein';
  }

  if($pwd === ''){
    $errors[] = 'Bitte geben Sie ein Passwort ein';
  }
  
  if(count($errors) === 0){
    $errors[] = '';
    $return = $errors;
  }                       
  return $errors;
}
?>