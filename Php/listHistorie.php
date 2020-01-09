<?php


$player = $_SESSION['UsName'];
$counter = 0;

$stmt = $pdo->query("SELECT * FROM `battles` WHERE player = '$player' OR oponent = '$player' ORDER BY id DESC limit 10");
foreach($stmt->fetchAll() as $row) {
    if($row['player'] === $_SESSION['UsName']){
        if($row['player_score'] > $row['oponent_score']){
            ?>
            <div class="player-containerwin">
                <p class="player-items"><?=$row['oponent']?></p>
                <p class="player-items"><?=$row['player_score']?> / <?= $row['oponent_score']?></p>
                <p class="player-items">won!</p>
            </div>
            <?php 
        }else{
        ?>
            <div class="player-containerlos">
                <p class="player-items"><?=$row['oponent']?></p>
                <p class="player-items"><?=$row['player_score']?> / <?= $row['oponent_score']?></p>
                <p class="player-items">lost!</p>
            </div>
            <?php 
        }
    }else{
        if($row['player_score'] > $row['oponent_score']){
            ?>
            <div class="player-containerlos">
                <p class="player-items"><?=$row['player']?></p>
                <p class="player-items"><?=$row['player_score']?> / <?= $row['oponent_score']?></p>
                <p class="player-items">lost!</p>
            </div>
            <?php 
        }else{
        ?>
            <div class="player-containerwin">
                <p class="player-items"><?=$row['player']?></p>
                <p class="player-items"><?=$row['player_score']?> / <?= $row['oponent_score']?></p>
                <p class="player-items">won!</p>
            </div>
            <?php 
        }
    }
$counter++;
}
?>