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

	<?php
	$Bid = $_POST['battleIdentity'];
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$Bid = $_POST['battleIdentity'];
	}
	?>

	
	<form method="POST" id="score-form" action="snake.php" >
		<input id="score" type="hidden" name="score" value="<?=$Bid?>">
	</form>

	<?php
	$user = 'snake';
	$password = 's1n2a3k4e5';

	$pdo = new PDO('mysql:host=localhost;dbname=snake_v2', $user, $password, [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	]);
	
	


	
	if(isset($_POST['score'])){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){

			$score = $_POST['score'];

			$count = $pdo->exec("UPDATE `battles` SET oponent_score = $score WHERE id = $Bid");
			$count = $pdo->exec("UPDATE `battles` SET status = status +1 WHERE id = $Bid");

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
