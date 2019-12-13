function checkIfOnApple(){
	if(xmovement === appleX * sz && ymovement === appleY * sz){
		print('on Apple detected');
		parts = parts + 1;
		generateAppleLocation();
	}
}

function generateAppleLocation(){
	while(true){
		appleX = floor(random(canvasSize/sz));
		appleY = floor(random(canvasSize/sz));

		if(!appleOnSnake()){
			break;
		}


	}
	

}


function appleOnSnake(){
	for(var i = 0; i < tailArray.length; ++i){
		if(tailArray[i][0] === appleX && tailArray[i][1] === appleY){
			return true;
		}else{
            return false
        }
	}


}