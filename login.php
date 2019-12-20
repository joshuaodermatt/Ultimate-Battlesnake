<!DOCTYPE html>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Titel</title>
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>
    <div id="logo-container">
     <a href="index.php"><img src="../recources/logo.png" alt="snake logo" id="logo"></a>
    </div>
    <div class="login-container">
        
        <h1 id="h1">login</h1>
        <form action="login.php" method="POST">
          <input class="input" type="text" name="emailOrUsername" placeholder="E-mail/Username" >
          <input class="input" type="password" name="pwd" placeholder="Password">
          <div id="buttons">
            <a href="register.php">register</a>
            <button class="button"><p>login</p></button>
          </div>
        </form>
       
        <?php
        $EOU;
        $pwd;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $EOU = $_POST["emailOrUsername"];
            $pwd = $_POST["pwd"];

            require "php/login_server.php"; 
        }
        ?>
      </div>
  </body>
</html>