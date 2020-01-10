<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>p5Tests</title>
	<link rel="stylesheet" href="snake.css">
</head>
<body>
	<?php
	session_start();
	$player = $_SESSION['UsName'];
	
	require "../dbc.php";

	$randomScore = 0;

	$stmt = $pdo->query("SELECT * FROM `ranking` WHERE NOT username = '$player' ORDER BY RAND ( ) LIMIT 1");
	foreach($stmt->fetchAll() as $row) {
		$randomScore = $row['latest_score_ranked'];
	}
	if($randomScore === NULL || $randomScore < 10){
		$randomScore = 10;
	}

	$space = ' ';
	
	?>
		<h2 id="randomscore">To reach<?= $space,$randomScore?></h2>

		<form method="POST" id="score-form" action="snake.php" >
			<input id="score" type="hidden" name="score" value="">
		</form>
	<?php



	if(isset($_POST['score'])){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){

			$score = $_POST['score'];

			
			
			

			if($score > $randomScore || $score === $randomScore){
				$count = $pdo->exec("UPDATE ranking SET points = points + 30 WHERE username = '$player'");
			}else{
				$count = $pdo->exec("UPDATE ranking SET points = points - 20 WHERE username = '$player'");
			}



			$stmt = $pdo->query('SELECT * FROM `user`');
			foreach($stmt->fetchAll() as $row) {
				if($row['username'] === $player){
					if($score > $row['highscore']){
						$count = $pdo->exec("UPDATE user SET highscore = $score WHERE username = '$player'");	
					}
				}
			}

			$count = $pdo->exec("UPDATE user SET latest_score = $score WHERE username = '$player'");
			$count = $pdo->exec("UPDATE ranking SET latest_score_ranked = $score WHERE username = '$player'");
			$count = $pdo->exec("UPDATE user SET games_played = games_played + 1 WHERE username = '$player'");

			header("Location:../ranked.php");
			
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
