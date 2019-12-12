function checkIfOnApple(){
	if(xmovement === appleX * sz && ymovement === appleY * sz){
		print('on Apple detected');
		parts = parts + 1;
		generateAppleLocation();	
	}
}

function generateAppleLocation(){
	appleX = floor(random(600/sz));
	appleY = floor(random(600/sz));

}