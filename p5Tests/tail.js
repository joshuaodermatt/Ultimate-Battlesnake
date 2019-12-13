function updateMainTailPart(){
    arrayPart = [xmovement, ymovement];
    tailArray[0] = arrayPart;
}

function makeTail(){

    if(parts != 0){
        for(var i = parts; i >= 1; --i){

            tailArray[i] = tailArray[i -1];

        }
    }
}

function tailDraw(){
    
    for(var i = 1; i <= parts; ++i){
        fill(0,0 ,70 );
        rect(tailArray[i][0], tailArray[i][1], sz, sz);
    }
    
}

