<?php
//get user INput
$userSearch = $_POST['search'];

          
          
//databese connection
$user = 'snake';
$password = 's1n2a3k4e5';

$pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
]);

//get TABLE
$stmt = $pdo->query('SELECT * FROM `user`');



//search for results
if($userSearch != $_SESSION['UsName']){
foreach($stmt->fetchAll() as $row) {
    if($row['username'] === $userSearch){

    $isInputOnDb = true;
    $friendId = $row['id'];

    ?>
    <div class='friends'>
        <p class="friends-data"><?=$userSearch?></p>
        <p class="friends-data">Highscore:</p>
        <form action="php/sendRequest.php" method="POST">
        <input type="hidden" name="addFriend" value="<?=$friendId?>">
        <button class="buttons">+</button>
        </form>
    </div>
    <?php
    }
}
}else{
?>
<div>
    <p class="error">
    Spieler nicht gefunden.
    <p>
</div>
<?php
}
if($isInputOnDb === false){
?>
<div>
    <p class="error">
    Spieler nicht gefunden.
    <p>
</div>
<?php
}
?>