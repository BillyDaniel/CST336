<?php

    function getRandColor() {
       return "rgba(".rand(0,255).", ".rand(0,255).", ".rand(0,255).", ".(rand(0,100)/100).");";
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Random Background Color </title>
        
        
        <style>
            
            body {
            /*    background-color: rgba(19, 118, 124, 0.69) */ 
            <?php
            echo "background-color: ".getRandColor();
            ?>
            }
            
            h1 {
            <?php
            echo "color: " .getRandColor();
            ?>
            }
            
            h2 {
                
                background-color: <?=getRandColor()?>
            }
            
  
            
        </style>
        
    </head>
    
    <body>
        <h1> Welcome! </h1>
        
        <h2> Hola</h2>
    </body>
 
 </html>