<?php

$host ='localhost'; //cloud9
$dbname = 'tcp';
$username = "root";
$password ="";
//create database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);

//displays database related errors
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function usersWithanA() {
    global $dbConn;
    $sql = "SELECT firstName, lastName, email FROM tc_user WHERE firstName LIKE 'A%'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH__ASSOC);
    
    
    //print_r($records);
    
    foreach($records as $records) {
        echo $record['firstName']. " " . $record['lastName'] . " " . $record ['email'] ."<br/>";
    }
}

function devicesBetween() {
    $sql = "SELECT deviceName FROM tc_device WHERE price BETWEEN 300 AND 1000 ORDER BY price DESC" ;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH__ASSOC);
    
    
    //print_r($records);
    
    foreach($records as $records) {
        echo $record['deviceName']."<br/>";
    }    
}











?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h3> Users whose first name starts with an A:</h3>
        <?=usersWithanA()?>
        <h3> Devices between $300 and $1000:</h3>
        <?=devicesBetween()?>
    </body>
</html>