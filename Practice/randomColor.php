<?php

    function getRandColor() {
       return "rgba(".rand(0,255).", ".rand(0,255).", ".rand(0,255).", ".(rand(0,100)/100).");";
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Random Background Color </title>
        
        
        <style>
            
            body {
            /*    background-color: rgba(19, 118, 124, 0.69) */ 
            <?php
            echo "background-color: ".getRandColor();
            ?>
            }
            
            h1 {
            <?php
            echo "color: " .getRandColor();
            ?>
            }
            
            h2 {
                
                background-color: <?=getRandColor()?>
            }
            
  
            
        </style>
        
    </head>
    
    <body>
        <h1> Welcome! </h1>
        
        <h2> Hola</h2>
    </body>
 
 </html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <?php
session_start();

//---------THIS IS BROKEN!!!!!!!
function displayCart() {
    include 'dbConnections.php';
    $conn = getDatabaseConnection();

    $sql = "SELECT * FROM gp2_game a JOIN gp2_published name = :name";
    
    $namedParam = array(":name"=>$_SESSION['cart']);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "Name: ". $record['name'];
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Shopping Cart </title>
    </head>
    <body>
        <h2> Shopping Cart </h2>
        <?=displayCart()?>
    </body>
</html>


<?php 
session_start();
include 'dbConnections.php';
$conn = getDatabaseConnection();
$sql = "SELECT * FROM gp2_game WHERE vgID = :vgId";
    
$namedParam = array(":vgId"=>$_GET['vgID']);
    
$stmt = $conn->prepare($sql);
$stmt->execute($namedParam);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
foreach ($records as $record) {
    array_push($_SESSION['cart'],$record['name']);
}
print_r($_SESSION['cart']);
header("Location: index.php");
?>

<?php 
session_start();
include 'dbConnections.php';
$conn = getDatabaseConnection();
$sql = "SELECT * FROM gp2_game WHERE vgID = :vgId";
    
$namedParam = array(":vgId"=>$_GET['vgID']);
    
$stmt = $conn->prepare($sql);
$stmt->execute($namedParam);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
foreach ($records as $record) {
    array_push($_SESSION['cart'],$record['name']);
}
print_r($_SESSION['cart']);
header("Location: index.php");
?>



<?php
session_start();
    if (!isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    include 'dbConnections.php';
    $conn = getDatabaseConnection();
    
    function displayGames() {
        global $conn;
        $sql = "SELECT * 
                FROM `gp2_game` 
                ORDER BY name";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $games = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $games;
    }
    
?>

<html>
    <head>
        <title>Team Project</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <h1>Game Store</h1>
        
 
 
        <?php
        
        $games = displayGames();
        
        foreach($games as $g) {
            echo  "<a href='gameInfo.php?vgID=".$g['vgID']."'> ".$g['name']." </a>";
            echo "<form action='addToCart.php' style='display:inline'>
                    <input type='hidden' name='vgID' value='".$g['vgID']."'/>
                    <input type='submit' value='Add to Cart'>
                  </form>";
            echo "<br />";
        }
        
        //print_r($_SESSION['cart']);
        ?>
        
        <form action='shoppingCart.php'>
                <input type='submit' value='Shopping Cart'>
        </form>
        
    </body>
</html>