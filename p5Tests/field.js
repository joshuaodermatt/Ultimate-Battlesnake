function grid(){
	var x = 0;
	var y = 0;
	while( x != canvasSize){
		line(x , 0, x, canvasSize)
		x = x + sz; 
	}

	while( y != canvasSize){
		line(0 , y, canvasSize, y);
		y = y + sz; 
	}

}
