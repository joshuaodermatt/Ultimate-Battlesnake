var canvasWidth = 500;
var canvasSize = 340;

var winnsWidthEnd;
var lossWidthEnd;
var drawwWidthEnd;

var w = document.getElementById("winns").value;
var l = document.getElementById("losses").value;
var d = document.getElementById("draw").value;

var winns = parseInt(w);
var loss = parseInt(l);
var draww = parseInt(d);


var maximal = loss + winns + draww;


lossWidthEnd = (loss * canvasWidth) / maximal;
winnsWidthEnd = (winns * canvasWidth) / maximal;
drawwWidthEnd = (draww * canvasWidth) / maximal;


var winnsToMove = winnsWidthEnd / 60;
var lossToMove = lossWidthEnd / 60;
var drawwToMove = drawwWidthEnd / 60;

var lossWidth = lossToMove;
var winnsWidth = winnsToMove;
var drawwWidth = drawwToMove;



function setup() {

	frameRate(100);
	
	createCanvas(canvasWidth, canvasSize);

}

function draw() {

	print(draww);

	


	fill(245,245,245);
	rect(0, 0, canvasWidth - 1 , canvasSize - 1);

	
	fill(241,97,97);
	rect(0, 10, lossWidth -10 ,99);

	fill(135,206,250);
	rect(0, 120, winnsWidth -10 ,99);

	fill(0,0,0);
	rect(0, 230, drawwWidth -10 ,99);



	if(lossWidth < lossWidthEnd){
		lossWidth = lossWidth + lossToMove;
	}

	if(winnsWidth < winnsWidthEnd){
		winnsWidth =  winnsWidth + winnsToMove;
	}

	if(drawwWidth < drawwWidthEnd){
		drawwWidth =  drawwWidth + drawwToMove;
	}


}