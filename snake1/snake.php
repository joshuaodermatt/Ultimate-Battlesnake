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
		<?php if(isset($_POST['player'])){?>
		<input id="score" type="hidden" name="player" value="<?=$_POST['player']?>">
		<input id="score" type="hidden" name="battleId" value="<?=$_POST['battleId']?>">
		<?php
		}
		?>
	</form>

	<?php

	session_start();

	
	require '../dbc.php';
	
	
	if(isset($_POST['score'])){
		if($_SESSION['gameDone'] === 0){
			if($_SERVER['REQUEST_METHOD'] === 'POST'){

				$_SESSION['gameDone'] = 1;

				

				$score = $_POST['score'];
				$battleId = $_POST['battleId'];
				$player = $_POST['player'];

				$count = $pdo->exec("UPDATE battles SET player_score = $score WHERE id = $battleId");
				$count = $pdo->exec("UPDATE battles SET status = status +1 WHERE id = $battleId");

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
