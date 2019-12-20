function isSnakeOnTail(){
    for(var i = 2; i < parts; ++i ){
        if(parts > 1){
            if(xmovement === tailArray[i][0] && ymovement === tailArray[i][1]){
            finished = true;
            }
        }
        
    }
}
