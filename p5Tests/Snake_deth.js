function isSnakeOutOfField(){
    if(xmovement < 0 || xmovement > canvasSize|| ymovement < 0 || ymovement > canvasSize){
        return true;
    }else{
        return false;
    }
}
