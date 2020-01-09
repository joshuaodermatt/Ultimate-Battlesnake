<?php


$user = 'snake';
$password = 's1n2a3k4e5';

$pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

$playerFound = false;

$foundResults;

$stmt = $pdo->query('SELECT * FROM `user`');

foreach($stmt->fetchAll() as $row) {
    if($row['username'] === $_POST['search'] && $row['username'] != $_SESSION['UsName']){
        $foundResults = $row['username'];
        $playerFound = true;
    }
}


if($playerFound === true){
    ?>
    <div class="player-container">
        <p class="player-items"><?=$foundResults?></p>
        <form method="POST" action="php/addBattleSearch.php">
            <input type="hidden" name="addBattleUsername" value="<?=$foundResults?>">
            <button type="submit" class="player-items">Battle!</button>
        </form>
    </div>
    <?php
}else{
    print("player not found");
}


?>