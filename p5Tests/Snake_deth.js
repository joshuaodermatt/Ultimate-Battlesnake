function isSnakeOutOfField(){
    if(xmovement === 0 - sz ||
        xmovement === canvasSize ||
        ymovement === 0 -sz ||
        ymovement >= canvasSize + sz ){
        return true;
    }else{
        return false;
    }
}
