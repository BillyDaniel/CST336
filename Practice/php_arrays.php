<?php

function displaySymbol($symbol) {
    
    echo "<img src= '../labs/lab2/img/$symbol.png' width= '70' />";
}

function displayAll($input) {
    for($i=0;$i<count($input);$i++)
    {
         echo "<img src= '../labs/lab2/img/$input[$i].png' width= '70' />";
    }
}

$symbols = array("lemon", "orange", "cherry");

//print_r($symbols); //displays array contents; only for debugging purposes

//echo $symbols[0]; //displays first element in array
//displaySymbol($symbols[0]); 

$symbols[]="grapes"; //adds element at the end of the array

//$symbols[2] = "seven"; //replaces value

array_push($symbols, "seven"); //adds elements at the end of the array

//displaySymbol($symbols[4]);

for($i=0;$i<count($symbols);$i++) //count() returns the array size
{
    displaySymbol($symbols[$i]);
}

sort($symbols); //Order elements in ascending order

echo "<br /> <br />";

displayAll($symbols);

//shuffle($symbols);

//echo "<br /> <br />";

//displayAll($symbols);

echo "<br /> <br />";

$lastSymbol = array_pop($symbols);
displaySymbol($lastSymbol);

echo "<br /> <br />";

displayAll($symbols);

unset($symbols[2]); //doesnt reindex the array and creates errors when running through a for-loop
$symbols = array_values($symbols); //re-indexes the array and allows the use of a for-loop

echo "<br /> <br />";

displayAll($symbols);



?>

<!DOCTYPE html>
<html> 
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>
        
        
        
        
    </body>
</html>