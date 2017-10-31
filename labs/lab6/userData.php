<?php


function displayUserData() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM `tc_user` 
            WHERE userId = :userId";
    
    $namedParam = array(":userId"=>$_GET['userId']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo $record['firstName'] ." ".  $record['lastName'] . "<br/> " . $record['gender'] . "<br/> " . $record['email'] . "<br/> " . $record['phone']. "<br/> " . $record['universityId']. "<br/> " . $record['role'] . "<br />";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> User Data </title>
    </head>
    <body>
        
        <h2> User Information </h2>


        <?=displayUserData()?>

    </body>
</html>