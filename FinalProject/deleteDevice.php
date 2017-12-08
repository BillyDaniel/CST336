<?php

    include("../dbConnection.php");
    $conn = getDatabaseConnection(final_project);
    
    
    $sql = "DELETE FROM devices 
            WHERE id = :id";
            
            $namedParameters[':id']= $_GET['id'];

   $stmt = $conn->prepare($sql);
   $stmt->execute($namedParameters);
   
    $sql = "DELETE FROM img 
            WHERE id = :id";

   $stmt = $conn->prepare($sql);
   $stmt->execute($namedParameters);
   
   
   header("Location: admin.php");
?>