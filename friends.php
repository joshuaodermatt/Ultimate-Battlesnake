<?php
session_start();
?>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/friends.css">
    <title>UB</title>
  </head>
  <body>
    <header class="header">
      <div id="logo-container"> 
        <img src="../recources/logo.png" alt="snake logo" id="logo">
      </div>
      <div id="nav">
        <p><a href="index.php" class="nav-items">HOME</a></p>
        <p><a href="#" class="nav-items">GLOBAL STATS</a></p>
      </div>
      <div class="login-elements-container">
        <p class="login-elements"><a href="stats.php" class="nav-items">stats</a></p>
        <p class="login-elements"><a href="friends.php" class="nav-items">friends</a>
      </div>
    </header>
    <div id="content">
      <div id="searchfield-container">
        <form action="friends.php" method="POST" id=search_form>
          <input type="text" name="search" id="searchfield" placeholder="Search for Friends">
          <button id="searchButton">GO!</button>
        </form>
      </div>


        <?php

        //Server connection
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
          $friendId;
          $userFound = false;
          $user = 'snake';
          $password = 's1n2a3k4e5';

          $UsNameFriend = $_POST['search'];
          
          $pdo = new PDO('mysql:host=localhost;dbname=snake', $user, $password, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          ]);

          //search bar logic
          $stmt = $pdo->query('SELECT * FROM `user`');

          foreach($stmt->fetchAll() as $x) {
            if($x['username'] === $UsNameFriend){
              $userFound = true;
              $friendId = $x['id'];
            }
          }

        

        //search results
        if($userFound === true){
          ?>
          <div class='friends'>
            <p class="friends-data"><?=$UsNameFriend?></p>
            <p class="friends-data">Highscore:</p>
            <form action="friends.php" method="POST">
              <input type="hidden" name="addFriend" value="<?=$friendId?>">
              <button class="buttons">+</button>
            </form>
          </div>
          <?php

        }

        //Sending friend request
        $AddValue = $_POST['addFriend'];
       
        $id =$_SESSION['id'];
        if($id != ''){
          $insert = $pdo->prepare("INSERT INTO `friend_request` (user, request_person) VALUES (id:,fid:)");
          $insert->execute([':id' => $id, ':fid' => $friendId]);
          print('erer');
        }
        
        }
        
        
        

        
        ?>
      
    </div>
  </body>
</html>


