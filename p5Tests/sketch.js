function setup() {
	createCanvas(600, 600);

	xpos = 0;

	frameRate(10);
}

function draw() {


	background(255,20,255);
	
	rect(xpos,50,10,10);

	xpos = xpos + 5;
}