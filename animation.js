var load
var canvasSize = 600;
var move = 60;
var state = true; 
var snakeY = canvasSize / 3;
var ellipseY = canvasSize / 3 + 200;
var ellipseW = 150;
function preload(){
	load = loadImage('recources/logo2.png');
}


function setup() {
	frameRate(60)
	createCanvas(canvasSize,canvasSize);


}

function draw() {
	background(245,245,245);
	fill(0,0,0);
	ellipse(canvasSize / 2, ellipseY, ellipseW, 10);

	image(load, canvasSize / 3 , snakeY);

	if(state === true){
		snakeY = snakeY - move / 15;
		move = move - 1;
		if(move === 0){
			state = false;
		}
	}else{
		snakeY = snakeY + move / 15;
		move = move + 1;
		if(move === 60){
			ellipseW = 150;
			snakeY = canvasSize / 3;
			state = true;
		}
	}

	if(state === true){
		
		ellipseW = ellipseW - move / 15;
	}else{
		ellipseW = ellipseW + move / 15;
	}

	


	print(snakeY);

}




