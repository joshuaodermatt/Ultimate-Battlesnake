var canvasWidth = 500;
var canvasSize = 230;

var winnsWidthEnd;
var lossWidthEnd;

var w = document.getElementById("winns").value;
var l = document.getElementById("losses").value;

var winns = parseInt(w, 10);
var loss = parseInt(l, 10);


var maximal = loss + winns;

if(winns > loss){
	winnsWidthEnd = (winns * canvasWidth) / maximal;
	lossWidthEnd = (loss * canvasWidth) / maximal;
}else{
	lossWidthEnd = (loss * canvasWidth) / maximal;
	winnsWidthEnd = (winns * canvasWidth) / maximal;
}

var winnsToMove = winnsWidthEnd / 60;
var lossToMove = lossWidthEnd / 60;

var lossWidth = lossToMove;
var winnsWidth = winnsToMove;



function setup() {

	frameRate(100);
	
	createCanvas(canvasWidth, canvasSize);

}

function draw() {


	print(lossWidth);
	print(winnsWidth)


	fill(245,245,245);
	rect(0, 0, canvasWidth - 1 , canvasSize - 1);

	
	fill(241,97,97);
	rect(0, 10, lossWidth -10 ,98);

	fill(135,206,250);
	rect(0, 120, winnsWidth -10 ,98);

	if(lossWidth < lossWidthEnd){
		lossWidth = lossWidth + lossToMove;
	}

	if(winnsWidth < winnsWidthEnd){
		winnsWidth =  winnsWidth + winnsToMove;
	}

}