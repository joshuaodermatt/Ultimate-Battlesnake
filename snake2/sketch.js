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
var keyCodeToMove;
var frameR = 8;



function setup() {
	createCanvas(canvasSize, canvasSize + 100);
	frameRate(frameR);
	textSize(40);
}

function draw() {
	background(107, 168, 169);
	background(255,255,255);
	fill(127,205,145);
	rect(0,0, canvasSize, canvasSize);
	grid();
	line(canvasSize - 1, 0, canvasSize -1, canvasSize);
	fill(255,0,0);
	rect(appleX * sz, appleY * sz, sz, sz);

	isSnakeOnTail();
	
	
	if(xmovement <= 0 - sz || xmovement >= canvasSize || ymovement <= 0 -sz ||ymovement >= canvasSize ){
		finised = true;
	}
	if(finised === false){

	checkIfOnApple();

	updateMainTailPart();

	makeTail();

	move();

	}

	if(finised === true){

		document.getElementById("score").value = parts;

		document.getElementById("score-form").submit();
		
	}

	
	
	tailDraw();

	fill(29, 77, 79);
	rect(xmovement, ymovement, sz, sz);

	print("bsdbf");

	text(parts, canvasSize / 2, canvasSize + 50);

}

function isSnakeOnTail(){
    for(var i = 2; i < parts; ++i ){
        if(parts > 1){
            if(xmovement === tailArray[i][0] && ymovement === tailArray[i][1]){
            finished = true;
            }
        }
        
    }
}
