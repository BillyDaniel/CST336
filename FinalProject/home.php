<?php
session_start();
$_SESSION['LogError']=false;
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
        <title>Home Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    
    </head>
    <body>
        <div class='container'>
            <div>
                <h1 id='title'> Best Bizzle </h1>
            </div>
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
            
            
            <div id="displayStuff"class="table">
                
            </div>
        </div>

        <footer>
            <div class ='center'>
                <form action="login.php">
                    <input class='btn btn-lg btn-primary' type="submit" value="Login" />
                </form>
            </div>
        </footer>


        </div>
    </body>     
    
    <script>
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
            getResult(0);
            $("#search").change( function(){
                getResult(0); 
            });
            $("#filter").change(function(){
                getResult(0);
            });
        });
        
    </script>
    
    
    
</html>