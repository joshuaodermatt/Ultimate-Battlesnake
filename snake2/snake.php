<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>p5Tests</title>
	<link rel="stylesheet" href="snake.css">
</head>
<body>

	<form method="POST" id="score-form" action="snake.php" >
		<input id="score" type="hidden" name="score" value="">
		<input id="score" type="hidden" name="bid" value="<?=$_POST['battleIdentity']?>">
		<input id="score" type="hidden" name="player" value="<?=$_POST['player']?>">
	</form>

	<?php
	
	require '../dbc.php';
	

	if(isset($_POST['score'])){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){

			$score = $_POST['score'];
			$battleid =$_POST['bid'];
			$player = $_POST['player'];

			$count = $pdo->exec("UPDATE `battles` SET oponent_score = $score WHERE id = $battleid");
			$count = $pdo->exec("UPDATE `battles` SET status = status +1 WHERE id = $battleid");

			$stmt = $pdo->query('SELECT * FROM `user`');
			foreach($stmt->fetchAll() as $row) {
				if($row['username'] === $player){
					if($score > $row['highscore']){
						$count = $pdo->exec("UPDATE user SET highscore = $score WHERE username = '$player'");	
					}
				}
			}

			$count = $pdo->exec("UPDATE user SET latest_score = $score WHERE username = '$player'");
			$count = $pdo->exec("UPDATE user SET games_played = games_played + 1 WHERE username = '$player'");

			header("Location:../battles.php");
			
		}

	}else{
	?>
		<div>
			<script src="libraries/p5.js"></script>
			<script src="libraries/p5.dom.js"></script>
			<script src="libraries/p5.sound.js"></script>
			<script src="sketch.js"></script>
			<script src="field.js"></script>
			<script src="apple.js"></script>
			<script src="move.js"></script>
			<script src="tail.js"></script>
			<script src="Snake_deth.js"></script>
		</div>
	<?php
	}
	?>
	
</body>
</html>
