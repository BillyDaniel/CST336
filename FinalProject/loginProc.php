<?php
session_start();

include '../dbConnection.php';
$conn = getDatabaseConnection(final_project);

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT *
        FROM admins
        WHERE user = :username 
        AND   pass = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;        
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record

if (empty($record)) {
    $_SESSION['LogError']=true;
    header("Location: login.php");
} else {
    
    $_SESSION['username'] = $record['user'];
    $_SESSION['LogError']=false;
    header("Location: admin.php");
}
?>