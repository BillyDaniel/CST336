<?php

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Random Skateboard Generator </title>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <style>
            #one {
                <?php
                    echo "color: " .getRandColor();
                ?>
            }
            #two {
                 <?php
                    echo "color: " .getRandColor();
                ?>
            }
            #three {
                <?php
                    echo "color: " .getRandColor();
                ?>
            }
        </style>
    </head>


    <body>
         <header>
            <h1 id=one> Random </h1>  <h1 id=two> Skateboard </h1> <h1 id=three> Generator </h1>
        </header>
        
        <hr>
        <div class=center>
            </br> </br>
            <?php
                play();
            ?>
            
        
        </div>
        
        
    </body>
    <div>
    </br></br>
        
    <p> This Website creates two unique complete skateboard decks.</p>
    </div>
    
</html>