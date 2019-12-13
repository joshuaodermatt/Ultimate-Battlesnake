var sz = 30;
var xmovement = 0
var ymovement = 0;
var appleY = 2; 
var appleX = 2;
var state = 0;
var canvasSize = 600;
var parts = 1;
var tailArray = [];
var arrayPart = [];
var finised = false;

function setup() {
	createCanvas(canvasSize, canvasSize);
	frameRate(10);
}

function draw() {
	background(200, 150,255 );
	grid();
	fill(255,0,0);
	rect(appleX * sz, appleY * sz, sz, sz);
	fill(0,255 ,50 );
	rect(xmovement, ymovement, sz, sz);

	checkIfOnApple();

	updateMainTailPart();

	makeTail();

	move();

	tailDraw();

	if(isSnakeOutOfField() || snakeOnItsTail()){
		print('dead');
		finised = true; 
	}


}