<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    header("Location: home.php");
}


include '../dbConnection.php';
$conn = getDatabaseConnection(final_project);


function getDeviceType(){
    global $conn;
    $sql = "SELECT DISTINCT(type)
            FROM `devices` 
            ORDER BY type";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        
        echo "<option> "  . $record['type'] . "</option>";
        
    }
}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class='container'>
        <h1 id='title'> Admin: Best Bizzle </h1>

        <hr>
        
        <div class='position'>
            <div class='center'>
                <h3 id="sear">Search:</h3><input type="text" id="search"/>
                <select id="filter">
                    <option>-Select One-</option>
                    <?=getDeviceType()?>
                </select>
            </div>

            <br /><br />
            
            <div id="displayStuff">
                
            </div>
        </div>
    </div>

        <footer>
            <div class='center'>
                <form class='inIt' action='addDevice.php' style='display:inline'>
                    <input  class="btn btn-default" type='submit' value='Add Device'>
                </form>
                <form class='inIt' action="logout.php">
                    <input class="btn btn-warning" type="submit" value="Logout" />
                </form>
                
                <br/><br/>
                    <button class="btn btn-primary" id='phone'>Average Phone Price</button>
                    <button class="btn btn-primary" id='tabs'>Average Tablet Price</button>
                    <button class="btn btn-primary" id='watches'>Average Watch Price</button>
    
 
            </div>
        </footer>
     
         
        <script>
            function getAvgPrice(action) {
                 $.ajax({
                type: "POST",
                url: "averages.php?action="+action,
                success: function(data) {
                    alert("Average Price: " + data);
                     }
            });
        }
        function getResult(action){
            $.ajax({
            type: "POST",
            url: "displayDevices.php?ad="+action,
            data:{'search':$("#search").val(),filter:$("#filter").val()},
            success: function(data) {
                $("#displayStuff").empty();
                $("#displayStuff").append(data);
             }
        });
    }
        
  
        $(document).ready(  function(){
            $("#phone").click(function(){
                getAvgPrice('1');
            })
            $("#tabs").click(function(){
                getAvgPrice('2');
            })
            $("#watches").click(function(){
                getAvgPrice('3');
            })
            
            getResult(1);
            $("#search").change( function(){
                getResult(1); 
            });
            $("#filter").change(function(){
                getResult(1);
            });

            
        });

        </script>
    </body>     
</html>