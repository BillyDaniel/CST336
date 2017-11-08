<?php

$host = 'localhost';//cloud 9
$dbname = 'tcp';
$username = 'root';
$password = '';
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

function getUsersAndDepartments() {
    global $dbConn;
    
    //$sql = "SELECT firstName, lastName, deptName FROM `tc_user`
    //        INNER JOIN tc_department
    //        ON tc_user.deptId = tc_department.departmentId";
    
    $sql = 'SELECT deviceName, firstName, lastName
            FROM tc_device d INNER JOIN
            (SELECT firstName, lastName, deptId
            FROM tc_user u
            LEFT JOIN tc_checkout c 
            ON u.userId=c.userId) as wf
            ON d.deviceId = wf.deviceId AND deviceType="Tablet"';
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //print_r($records);
    foreach ($records as $record) {
        
        echo $record['firstName'] . '  ' . $record['lastName'] .  '  ' . $record['deptName'] . "<br />";
        
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>SQL Joins </title>
    </head>
    <body>

        <h2> Users and their corresponding departments (order by last name) </h2>

        <?=getUsersAndDepartments()?>


    </body>
</html>