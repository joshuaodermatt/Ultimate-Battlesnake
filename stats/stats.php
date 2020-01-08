<?php
session_start();
?>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/player.css">
    <title>UB</title>
  </head>
  <body>
    <header class="header">
      <div id="logo-container"> 
        <img src="../recources/logo.png" alt="snake logo" id="logo">
      </div>
      <div id="nav">
        <p><a href="../" class="nav-items">HOME</a></p>
        <?php
        if(isset($_SESSION['UsName'])){
        ?>
          <p><a href="#" class="nav-items">RANKED</a></p>
          <p><a href="../battles.php" class="nav-items" >BATTLES</a></p>
        <?php
        }
        ?>
      </div>
      <div class="login-elements-container">
        <?php
       
        if(isset($_SESSION['UsName'])){
        ?>
        <p class="login-elements"><a href="../player.php" class="nav-items" id="profile"><?=$_SESSION['UsName']?></a><p>
        <p class="login-elements"><a href="../php/logout.php" class="nav-items">logout</a></p>
        <?php
        }else{
        ?>
        <p class="login-elements"><a href="../login.php" class="nav-items">login</a></p>
        <?php
        }
        ?>
      </div>
    </header>
        
    <?php

    $user = 'snake';
    $password = 's1n2a3k4e5';

    $winns = 0;
    $losses = 0;
    $username = $_SESSION['UsName'];

    $pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);

    $stmt = $pdo->query('SELECT * FROM `battles`');
    foreach($stmt->fetchAll() as $x) {
        if($x['status'] === '2' && $x['player'] === $_SESSION['UsName'] && $x['player_score'] > $x['oponent_score']){
          $winns++;
         
        }
        if($x['status'] === '2' && $x['player'] === $_SESSION['UsName'] && $x['player_score'] < $x['oponent_score']){
          $losses++;
          
        }
        if($x['status'] === '2' && $x['oponent'] === $_SESSION['UsName'] && $x['player_score'] < $x['oponent_score']){
          $winns++;
         
        }
        if($x['status'] === '2' && $x['oponent'] === $_SESSION['UsName'] && $x['player_score'] > $x['oponent_score']){
          $losses++;
         
        }
    }

    $count = $pdo->exec("UPDATE `user` SET winns = $winns WHERE username = '$username'");
    $count = $pdo->exec("UPDATE `user` SET losses = $losses WHERE username = '$username'");

    $games_played;
    $highscore;
    $latest_score;

    $stmt = $pdo->query("SELECT * FROM `user` WHERE username = '$username'");
    foreach($stmt->fetchAll() as $row) {
      $games_played = $row['games_played'];
      $winns = $row['winns'];
      $losses = $row['losses'];
      $highscore = $row['highscore'];
      $latest_score = $row['latest_score'];
    }

    ?>
    <input type="hidden" id="winns" value="<?=$winns?>">
    <input type="hidden" id="losses" value="<?=$losses?>">


    <div id="content">
      <div id="snd-header">
        <a href="../player.php" class="snd-items">profile</a> 
        <a href="player/battle_historie.php" class="snd-items">historie</a>
      </div> 
      <div id="profile">
        <h2 id="name"><?=$_SESSION['UsName']?><h2>
      </div>
      <div id="stats-container">
        <div class="stats">
          <p class="stats-items-big"><?=$highscore?></p>
          <p class="stats-items">highscore</p>
        </div>
        <div class="stats">
          <p class="stats-items-big"><?=$latest_score?></p>
          <p class="stats-items">latest score</p>
        </div>
        <div class="stats">
          <p class="stats-items-big"><?=$games_played?></p>
          <p class="stats-items">games played</p>
        </div>
      </div>
        <script src="libraries/p5.js"></script>
        <script src="libraries/p5.dom.js"></script>
        <script src="libraries/p5.sound.js"></script>
        <script src="sketch.js"></script>
    </div>
    <div id="graph-infos">
      <div class="graph-infos-text-container">
        <div id="red">
        </div>
        <p class="graph-infos-text">losses</p>
      </div>
      <div class="graph-infos-text-container">
        <div id="blue">
        </div>
        <p class="graph-infos-text">winns</p>
      </div>
    </div>
  </body>
</html>