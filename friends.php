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

      $isInputOnDb = false;
      if($_SERVER['REQUEST_METHOD'] === 'POST'){
        require "php/search.php";
      }
      ?>

      <div id="requests">
        <p class="title">Requests<p>
        <div class="line"></div>
        
      </div>
    </div>
  </body>
</html>