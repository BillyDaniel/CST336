<?php
function displayHistory() {
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection();
    
    $sql = "SELECT * 
            FROM tc_seach";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
            if($record["Zipcode"]==NULL){
                echo "".$record["City"]." was searched at " . $record["time"] .". <br>";
            }
            else{
                echo "".$record["Zipcode"]." was searched at " . $record["time"] .". <br>";
            }
    }
}
?>

<html>
    <head>
        <title> Search History </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
    </head>
    <body class='jumbotron'>
        <div class='container text-center'>
            <h2> Search History </h2>
    
            <div class="div1">
            <?=displayHistory()?>
            </div>
            <br><br>
            <a href="index.html">Back</a>
        </div>
    </body>
</html>