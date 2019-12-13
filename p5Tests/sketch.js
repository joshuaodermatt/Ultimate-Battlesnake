var sz = 32;
var xmovement = 0
var ymovement = 0;
var appleY = 2; 
var appleX = 2;
var state = 0;
var canvasSize = 512;
var parts = 0;
var tailArray = [];
var arrayPart = [];
var finised = false;
var discoR = 150;
var discoG = 75;
var discoB = 0;
var haha = true;






function setup() {
	createCanvas(canvasSize, canvasSize);
	frameRate(5);
}

function draw() {
	background(200, 150,255 );
	grid();
	fill(255,0,0);
	rect(appleX * sz, appleY * sz, sz, sz);
	
	

	checkIfOnApple();

	updateMainTailPart();

	makeTail();

	move();

	tailDraw();

	if(isSnakeOutOfField()){
		finised = true; 
	}

	if(finised === true){
		parts = 0;
		finised = false;
	}

	fill(	3, 125, 80);
	rect(xmovement, ymovement, sz, sz);



}