<?php


function displayDeviceData() {
    
    include '../dbConnection.php';
    $conn = getDatabaseConnection(final_project);
    
    $sql = "SELECT * 
            FROM devices d INNER JOIN img i ON
            d.id=i.id
            WHERE d.id = :deviceId";
    
    $namedParam = array(":deviceId"=>$_GET['id']);

    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $r) {
        echo "<div class='position'>
        <h2 class='center'> ".$r['dName'] ."</h2>
        <br/>
        <div class='center'>
        <img src='img/". $r['img'] . "' alt='" .$r['imgDesc'] ."'>
        </div>
        <br/> 
        <h4>Price: 
        $" . $r['price'] . "
        <br/> 
        Stock: 
        " . $r['stock'] . "
        <br/> 
        Description: 
        " . $r['description']. "
        <br/> 
        Company: 
        " . $r['company']. "
        <br/> 
        </h4>
        </div>";
    }
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Device Details </title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <h2 id='title'> Device Information </h2>


        <?=displayDeviceData()?>
        <div class='center'>
            <form action='home.php' style='display:inline'>
                    <input class="btn btn-danger" type='submit' value='Back'>
            </form>
        </div>

    </body>
</html>