function move(){

	if(keyCode === LEFT_ARROW){
		if(state === 2){
			xmovement = xmovement + sz;
		}else{
			state = 1;
			
			xmovement = xmovement - sz;
		}

	}

	if(keyCode === RIGHT_ARROW){
		if(state === 1){
			xmovement = xmovement - sz;
		}else{
			state = 2;
			
			xmovement = xmovement + sz;
		}
		
	}

	if(keyCode === UP_ARROW){
		if( state === 4){
			ymovement = ymovement + sz;
		}else{
			state = 3;
			
			ymovement = ymovement - sz;
		}

	}

	if(keyCode === DOWN_ARROW){
		if(state === 3){
			ymovement = ymovement - sz;
		}else{
			state = 4;
			
			ymovement = ymovement + sz;
		}
		
	}
	
}