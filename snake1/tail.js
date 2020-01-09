function updateMainTailPart(){
    arrayPart = [xmovement, ymovement];
    tailArray[0] = arrayPart;
}

function makeTail(){

    if(parts != 0){
        for(var i = parts; i >= 1; --i){

            tailArray[i] = tailArray[i -1];

            if(i > 2){
                if (tailArray[i][0] === tailArray[0][0] && tailArray[i][1] === tailArray[0][1]){
                    finised = true;
                }
            }

        }
    }
}

function tailDraw(){
    
    for(var i = 1; i <= parts; ++i){
        fill(53, 115, 118);
        rect(tailArray[i][0], tailArray[i][1], sz, sz);
    }
    
}





