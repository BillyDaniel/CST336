<?php

include 'functions.php';

?>


<html>
    <head>
        <title> Chinese Zodiac </title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        <h1>Chinese Zodiac List</h1>
        
        <ul>
            <?php
                 echo "<h1>".yearList(1900,2000)."</h1>";
            ?>
        </ul>
    </body>
        