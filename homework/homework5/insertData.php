 <?php
 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

 if(isset($_GET['city'])){
   $sql = "INSERT INTO tc_seach
            (City)
            VALUES
            (:city)";
            $namedParameters[':city'] =  $_GET['city'];

 }
 else{
   $sql = "INSERT INTO tc_seach
   (Zipcode)
   VALUES
   (:zip)";
   $namedParameters[':zip'] =  $_GET['zip'];
 }
 
 $stmt = $conn->prepare($sql);
 $stmt->execute($namedParameters);

 ?>