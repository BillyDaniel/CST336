<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    header("Location: home.php");
}

if (isset($_POST['addDeviceForm'])){
    include("../dbConnection.php");
    $conn = getDatabaseConnection(final_project);	
    $sql = "INSERT INTO devices
            SET dName = :dName,
            price = :price,
            stock = :stock,
            description = :descript,
            company = :comp,
            type = :type";
    
    $namedParameters = array();
    $namedParameters[":dName"] = $_POST['deviceName'];
	$namedParameters[":price"] = $_POST['price'];
    $namedParameters[":stock"] = $_POST['stock'];
	$namedParameters[":descript"] = $_POST['deviceDescription'];
	$namedParameters[":comp"] = $_POST['company'];
    $namedParameters[":type"] = $_POST['type'];

    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
   
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "img/" . $_FILES["myFile"]["name"] );
         $sql = "INSERT INTO img
            SET img = :img,
            imgDesc = :imgDes";

	$namedParameters = array();
	$namedParameters[":img"] = $_FILES['myFile']["name"];
	$namedParameters[":imgDes"] = $_POST['imgDes'];
	
	$stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    header("Location: admin.php");
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Adding Device </title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            #desc{
                width:100%;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>

    <h1 id='title'> Admin Section </h1>
    <h2 class='center'> Add Device Information </h2>

    <fieldset>
        <div class='position'>
        <legend class='center'> Add Device </legend>
        <form  method ='POST' enctype="multipart/form-data">
            Device Name: <input type="text" name="deviceName" required value="" /> <br>
            Price: <input type="number" step="any" name="price" required value=""/> <br>
            Stock: <input type="number" name="stock" required value=""/> <br>
            Description: <input type="text" id="desc" name="deviceDescription" required value=""/> <br>
            Company: <input type="text" name="company" required value=""/> <br>
            Type:   <select name="type">
                        <option value=""> Select One </option>
                        <option>Phone</option>
                        <option>Tablet</option>
                        <option>Smart Watch</option>
                    </select>
                <br />
                
            Picture:<input type="file" name="myFile" accept="image/*" class="upload"/> 
            Picture Description: <input type="text" name="imgDes" required value=""/> 
            <br/><br/>    
            <div class='center'>
            <input class="btn btn-success" type="submit" name="addDeviceForm" value="Add Device!"/>
        </form>
        
        <br/><br/>
        
        <form action='admin.php' style='display:inline'>
                <input class="btn btn-danger" type='submit' value='Back'>
        </form>
                </div>
        </div>

        
    </fieldset>

    </div>
    </body>
</html>