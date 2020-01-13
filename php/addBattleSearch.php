<?php
session_start();


require '../dbc.php';

$stmt = $pdo->prepare("INSERT INTO `battles` (player, oponent) VALUES(:first, :last) ");
$stmt->execute([':first' => $_SESSION['UsName'], ':last' => $_POST['addBattleUsername']]);

$battleId;
$player;

$stmt = $pdo->query('SELECT * FROM `battles` ORDER BY id DESC LIMIT 1');



foreach($stmt->fetchAll() as $x) {
    $player = $x['player'];
    $battleId = $x['id'];
}

?>
<form id="infos" method="POST" action="../snake1/snake.php">
    <input type="hidden" name="player" value="<?=$player?>">
    <input type="hidden" name="battleId" value="<?=$battleId?>">
</form>

<script>document.getElementById("infos").submit();</script>
