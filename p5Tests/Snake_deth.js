function isSnakeOutOfField(){
    if(xmovement === 0 || xmovement === canvasSize -sz || ymovement === 0 || xmovement === canvasSize -sz){
        return true;
    }else{
        return false;
    }
}
