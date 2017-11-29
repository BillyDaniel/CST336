 <?php
 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

 if(isset($_GET('city'))){
   $sql = "INSERT INTO tc_seach
            (City)
            VALUES
            (:city)";
            $namedParameters[':city'] =  $_GET['city'];
            printf("Bye1");

 }
 
 else{
   $sql = "INSERT INTO tc_seach
   (Zip)
   VALUES
   (:zip)";
   $namedParameters[':zip'] =  $_GET['zip'];
 }
 
 $stmt = $conn->prepare($sql);
 $stmt->execute($namedParameters);

 ?>