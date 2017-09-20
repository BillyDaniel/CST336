<?php

$decks = array();
$wheels = array();
$trucks = array();

function play() {
    populateArrays();
    createCompletes();
}

function populateArrays() {
    global $decks, $wheels, $trucks;
    
    for($i=0;$i<3;$i++) {
        switch($i){
            case 0:
                array_push($decks, "Black", "Blue", "Green", "Red");
                break;
            case 1:
                array_push($wheels, "Black", "Blue", "Green", "Red");
                break;
            case 2:
                array_push($trucks, "Black", "Blue", "Green", "Red");
                break;
        }
    }
    shuffle($decks);
    shuffle($wheels);
    shuffle($trucks);
}

function createCompletes() {
    global $decks, $wheels, $trucks;
    $deck = $wheel = $truck;
    for($i=0;$i<2;$i++) {
        if($i==0) {
            $deck=array_pop($decks);
            $wheel = array_pop($wheels);
            $truck = array_pop($trucks);
            echo "<h2 class=center> Complete Deck 1 </h2> <h2 class=center> Complete Deck 2 </h2>
                </ br> </br>
                <div id=comp class=center>
                <h3> Board </h3>
                <img class=deck src='img/Decks/$deck.jpg'/>
                <h3> Wheels </h3>
                <img class=wheel src='img/Wheels/$wheel.jpg'/>
                <h3> Trucks </h3>
                <img class=truck src='img/Trucks/$truck.jpg'/>
                </div>";
        }

        else {
            $deck=array_pop($decks);
            $wheel=array_pop($wheels);
            $truck=array_pop($trucks);
            echo "<div id=comp>
            <h3> Board </h3>
            <img class=deck src='img/Decks/$deck.jpg'/>
            <h3> Wheels </h3>
            <img class=wheel src='img/Wheels/$wheel.jpg'/>
            <h3> Trucks </h3>
            <img class=truck src='img/Trucks/$truck.jpg'/>
            </div>";
        }
    }
}

function getRandColor() {
       return "rgba(".rand(0,255).", ".rand(0,255).", ".rand(0,255).", ".(rand(0,100)/100).");";
    }

?>