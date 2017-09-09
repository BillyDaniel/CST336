<?php
function play (){
    for($i=1;$i<3;$i++) {
    ${"suit" . $i} = rand(0,3);
    ${"card". $i} = rand(0,4);
    }
    displaySymbol($suit1, $card1, 1);
    displaySymbol($suit2, $card2, 2);
    if($card1>$card2) {
        echo "<h1 id='winner'> Human Wins! </h1>";
    }
    
    else if($card1<$card2) {
        echo "<h1 id='winner'> Computer Wins! </h1>";
    }

    else if ($card1==$card2) {
        echo "<h1 id='winner'> Issa Tie! </h1>";

    }

}

function displaySymbol($suit, $card, $pos){

switch($suit) {
    case 0: $symbol = "clubs";
            switch($card)
            {
                case 0: $number = "ten";
                    break;
                case 1: $number = "jack";
                    break;
                case 2: $number = "queen";
                    break;
                case 3: $number = "queen";
                    break;
                case 4: $number = "ace";
                    break;
            }
            break;
    case 1: $symbol = "diamonds";
            switch($card)
            {
                case 0: $number = "ten";
                    break;
                case 1: $number = "jack";
                    break;
                case 2: $number = "queen";
                    break;
                case 3: $number = "queen";
                    break;
                case 4: $number = "ace";
                    break;
            }
        break;
    case 2: $symbol = "hearts";
                switch($card)
            {
                case 0: $number = "ten";
                    break;
                case 1: $number = "jack";
                    break;
                case 2: $number = "queen";
                    break;
                case 3: $number = "queen";
                    break;
                case 4: $number = "ace";
                    break;
            }
        break;
    case 3: $symbol = "spades";
                switch($card)
            {
                case 0: $number = "ten";
                    break;
                case 1: $number = "jack";
                    break;
                case 2: $number = "queen";
                    break;
                case 3: $number = "queen";
                    break;
                case 4: $number = "ace";
                    break;
            }
        break;
    }
        echo "<img id='reel$pos' src = 'img/cards/$symbol/$number.png' alt ='$symbol' title='". ucfirst($symbol) ."' width='70' />";

    }

?>