<?php

$correct_answer1="one";
$correct_answer2="two";
$correct_answer3="one";
$correct_answer4="three";
$correct_answer5="two";
$total = 0;
$class1="";
$class2="";
$class3="";
$class4="";

if(isset($_GET['q1'])) {
    if($_GET['q1']==$correct_answer1) {
        $class1="green";
        $total=$total + 1;
    }
    else{ 
        $class1="red";
    }
}

if(isset($_GET['q2'])) {
    if($_GET['q2']==$correct_answer2) {
        $total=$total+1;
    }
}

if(isset($_GET['q3'])) {
   
    if($_GET['q3']==$correct_answer3){
        $class2="green";
        $total=$total + 1;
    }
    else {
        $class2="red";
    }
}

if(isset($_GET['q4'])) {
    if($_GET['q4']==$correct_answer4) {
        $class3="green";
        $total=$total + 1;
    }
    else{ 
        $class3="red";
    }
}

if(isset($_GET['q5'])) {
    if($_GET['q5']==$correct_answer5) {
        $class4="green";
        $total=$total + 1;
    }
    else{ 
        $class4="red";
    }
}


function printScore() {
    global $total;
    if(isset($_GET['q3']) && isset($_GET['q2']) && isset($_GET['q1'])) {
        echo "<h2>Score: $total/5</h2>";
    }
    elseif(!isset($_GET['q3']) && !isset($_GET['q2']) && !isset($_GET['q1'])) {
    }
    else {
        echo "<h2>ERROR! ANSWER ALL QUESTIONS!</h2>";
    }
    $total=0;
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <div class="container">
        <header id="heading"><h1>Homework 5: Quiz!</h1></header>
        
        <body>
            <hr>
            <form class="questions" id="q1">
                <h2>1) Which tag should be used for the largest heading size?</h2>
                <ul>
                    <li><input type="radio" name="q1" value="one" <?= ($_GET['q1']=='one')? "checked":""?>/><label for="one" <?=($_GET['q1']=='one')?"class='".$class1."'":""?>><span>&lt;h1&gt;</span> </label></li>
                    <li><input type="radio" name="q1" value="two" class=<?="'.$class1.'"?> <?= ($_GET['q1']=='two')?"checked":""  ?>/><label for="two" <?=($_GET['q1']=='two')?"class='".$class1."'":""?>><span>&lt;h2&gt;</span></label></li>
                    <li><input type="radio" name="q1" value="three" class=<?="'.$class1.'"?> <?= ($_GET['q1']=='three')?"checked":""  ?>/><label for="three" <?=($_GET['q1']=='three')?"class='".$class1."'":""?>><span>&lt;h3&gt;</span></label></li>
                </ul>
   
                <h2>2) Which tag should be to create a break with a line?</h2>
                <select name="q2">
                    <option value="zero"/>-Choose An Answer-</option>
                    <option value="one"/>&lt;br&gt;</option>
                    <option value="two"/>&lt;hr&gt;</option>
                    <option value="three"/>&lt;footer&gt;</option>
                </select>
                <br> <br>

                <h2>3) What is html? (check all that apply)</h2>
                <ul>
                    <li><input type="checkbox" name="q3" value="one"/><label for="one" <?=($_GET['q3']=='one')?"class='".$class2."'":""?>>Hypertext Markup Language</label></li>
                    <li><input type="checkbox" name="q3" value="two"/><label for="two" <?=($_GET['q3']=='two')?"class='".$class2."'":""?>>Is dumb</label></li>
                    <li><input type="checkbox" name="q3" value="three"/><label for="three" <?=($_GET['q3']=='three')?"class='".$class2."'":""?>>Is not Hypertext Markup Language</label></li>
                </ul>
                
                <h2>4) What is the correct HTML for adding a background color?</h2>
                <ul>
                    <li><input type="radio" name="q4" value="one"/><label for="one" <?=($_GET['q4']=='one')?"class='".$class3."'":""?>>&lt;body bg="yellow"&gt;</label></li>
                    <li><input type="radio" name="q4" value="two"/><label for="two" <?=($_GET['q4']=='two')?"class='".$class3."'":""?>>&lt;background&gt;yellow&lt;/background&gt;</label></li>
                    <li><input type="radio" name="q4" value="three"/><label for="three" <?=($_GET['q4']=='three')?"class='".$class3."'":""?>>&lt;body style="background-color:yellow;"&gt;</label></li>
                </ul>
                
                <h2>5) Choose the correct HTML element to define important text</h2>
                <ul>
                    <li><input type="radio" name="q5" value="one"/><label for="one" <?=($_GET['q5']=='one')?"class='".$class4."'":""?>>&lt;i&gt;</label></li>
                    <li><input type="radio" name="q5" value="two"/><label for="two" <?=($_GET['q5']=='two')?"class='".$class4."'":""?>>&lt;strong&gt;</label></li>
                    <li><input type="radio" name="q5" value="three"/><label for="three" <?=($_GET['q5']=='three')?"class='".$class4."'":""?>>&lt;b&gt;</label></li>
                </ul>
                
                <input type="submit" name="submit" value="Submit">
            </form>
            <?php
                printScore();
            ?>
            <hr>
            <span> Made By This GUY :D</span>
        </body>
    </div>
</html>