var sz = 30;
var xmovement = sz;
var ymovement = 9 * sz;
var appleY = 9; 
var appleX = 13;
var state = 0;
var canvasSize = 600;
var tail1D = [];
var parts = 0;
var tail2D = [];



function setup() {
	createCanvas(canvasSize, canvasSize);
	frameRate(8);
}

function draw() {

	background(200, 150,255 );

	grid();
	
	fill(255,0,0);
	rect(appleX * sz, appleY * sz, sz, sz);

	fill(0,255 ,50 );
	rect(xmovement, ymovement, sz, sz);

	checkIfOnApple();

	tailUpdate();
	
	move();

	

}