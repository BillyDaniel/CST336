<?php 
include '../dbConnection.php';
$conn = getDatabaseConnection(final_project);

if(isset($_GET['action'])){
    if($_GET['action']=='1'){
        getPhoneAvg();
    }
    else if($_GET['action']=='2'){
        getTabletAvg();
    }
    else{
        getSmartWatchAvg();
    }
    
}
function getPhoneAvg() {
    global $conn;
    $sql = "SELECT AVG(price)
            FROM devices
            WHERE type = 'Phone'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $devices = $statement->fetch(PDO::FETCH_ASSOC);
    echo $devices['AVG(price)'];
    }
    
function getTabletAvg() {
    global $conn;
    $sql = "SELECT AVG(price) 
            FROM devices
            WHERE type = 'Tablet'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $devices = $statement->fetch(PDO::FETCH_ASSOC);
    echo $devices['AVG(price)'];
    }

function getSmartWatchAvg() {
    global $conn;
    $sql = "SELECT AVG(price) 
            FROM devices
            WHERE type = 'Smart Watch'";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $devices = $statement->fetch(PDO::FETCH_ASSOC);
    echo $devices['AVG(price)'];
    }
?>