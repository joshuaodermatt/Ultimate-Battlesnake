function isSnakeOutOfField(){
    if(xmovement < 0 || xmovement > canvasSize|| ymovement < 0 || ymovement > canvasSize){
        return true;
    }else{
        return false;
    }
}
function snakeOnItsTail(){
    var t = false;
    if(parts != 1){

    
    if(t === false){
        for(var i = 0; i <= tailArray.length; i++){
            if(tailArray[i][0] === xmovement && tailArray[i][1] === ymovement){
                t = true;
                parts = 0;
                
            }
            print(tailArray[i][0]);
            print(xmovement);
        }        
    }

    if(t === true){
        return true;
    }else{
        return false;
    }

}

    

}