<?php
session_start();
?>
<html lang="de">
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/raked.css">
    <title>UB</title>
  </head>
  <body>
    <header class="header">
      <div id="logo-container"> 
        <img src="recources/logo.png" alt="snake logo" id="logo">
      </div>
      <div id="nav">
        <p><a href="#" class="nav-items">HOME</a></p>
        <?php
        if(isset($_SESSION['UsName'])){
        ?>
          <p><a href="ranked.php" class="nav-items">RANKED</a></p>
          <p><a href="battles.php" class="nav-items" >BATTLES</a></p>
        <?php
        }
        ?>
      </div>
      <div class="login-elements-container">
        <?php
       
        if(isset($_SESSION['UsName'])){
        ?>
        <p class="login-elements"><a href="player.php" class="nav-items" id="profile"><?=$_SESSION['UsName']?></a><p>
        <p class="login-elements"><a href="php/logout.php" class="nav-items">logout</a></p>
        <?php
        }else{
        ?>
        <p class="login-elements"><a href="login.php" class="nav-items">login</a></p>
        <?php
        }
        ?>
      </div>
    </header>

    <div id="content">
        <form method="POST" action="snake3/snake.php">
            <button type="submitt" id="play">play!</button>
        </form>
        <?php
        require "dbc.php";

        $stmt = $pdo->query('SELECT * FROM `ranking` ORDER BY points DESC limit 100');
        $counter2 = 1;
        foreach($stmt->fetchAll() as $x) {
          
        ?>
        <div class="ranked-list">
          <p class="place"><?=$counter2?><p>
          <div class="player-container">
            <p class="player-items"><?=$x['username']?></p> 
            <p class="player-items"><?=$x['points']?></p> 
          </div>
        </div>
        <?php
        $counter2 ++;
        }

        ?>
        
    </div>

  </body>
</html>



    