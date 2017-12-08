<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: home.php");
}

 include("../dbConnection.php");
 $conn = getDatabaseConnection(final_project);

function getImg($devId){
    global $conn;        
    $sql = "SELECT * 
            FROM img 
            WHERE id=$devId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetch();
    
    return $records;
    
}

function getDeviceInfo($devId) {
    global $conn;    
    $sql = "SELECT * 
            FROM devices
            WHERE id = $devId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

if (isset($_POST['updateDeviceForm'])) { //admin has submitted form to update user
    global $conn;
    $sql = "UPDATE devices
            SET dName = :dName,
                price = :price,
                stock = :stock,
                description = :descript,
                company = :comp,
                type = :type
                WHERE id = :deviceId";
			
	$namedParameters = array();
	$namedParameters[":dName"] = $_POST['deviceName'];
	$namedParameters[":price"] = $_POST['price'];
	$namedParameters[":stock"] = $_POST['stock'];
	$namedParameters[":descript"] = $_POST['deviceDescription'];
	$namedParameters[":comp"] = $_POST['company'];
	$namedParameters[":type"] = $_POST['type'];
	$namedParameters[":deviceId"] = $_POST['deviceId'];


    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    
    
    $sql = "UPDATE img 
            SET ";
    $namedParameters = array();

    if(strlen($_FILES['myFile']['name'])!=0){
            $sql.=" img = :img, ";
        	$namedParameters[':img'] = $_FILES['myFile']['name'];
        	move_uploaded_file($_FILES['myFile']['tmp_name'], 'img/' . $_FILES['myFile']['name'] );
    }
            $sql.=" imgDesc = :imgDes
            WHERE id = :deviceId";
            $namedParameters[':imgDes'] = $_POST['imgDes'];
	        $namedParameters[':deviceId'] = $_POST['deviceId'];
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);

        header("Location: admin.php");
}



if (isset($_GET['id'])) {
    $deviceInfo = getDeviceInfo($_GET['id']);
    $imgInfo = getImg($_GET['id']);
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating Device </title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            #desc{
                width:100%;
            }
        </style>
    </head>
    <body>

    <h1 id='title'> Admin Section </h1>
    <h2 class='center'> Updating Device Information </h2>

    <fieldset>
        <div class='position'>
        <legend class='center'> Update Device </legend>
        
        <form  method ='POST' enctype="multipart/form-data">            
            <input type="hidden" name="deviceId" value="<?=$deviceInfo['id']?>" />
                Device Name: <input type="text" name="deviceName" required value="<?=$deviceInfo['dName']?>" /> <br>
                Price: <input type="number" name="price" required value="<?=$deviceInfo['price']?>"/> <br>
                Stock: <input type="number" name="stock" required value="<?=$deviceInfo['stock']?>"/> <br>
                Description: <input type="text" id="desc" name="deviceDescription" required value="<?=$deviceInfo['description']?>"/> <br>
                Company: <input type="text" name="company" required value="<?=$deviceInfo['company']?>"/> <br>
                Type:   <select name="type">
                            <option value=""> Select One </option>
                            <option <?php if ($deviceInfo['type']=='Phone') echo 'selected="selected"'?>>Phone</option>
                            <option <?php if ($deviceInfo['type']=='Tablet') echo 'selected="selected"'?>>Tablet</option>
                            <option <?php if ($deviceInfo['type']=='Watch') echo 'selected="selected"'?>>Smart Watch</option>
                        </select>
                <br />
                
                Picture:<input type="file" name="myFile" accept="image/*" class="upload"/> 
                Picture Description: <input type="text" name="imgDes" required value="<?=$imgInfo['imgDesc']?>"/> 
                <br/><br/>
            <div class='center'>
            <input class="btn btn-success" type="submit" name="updateDeviceForm" value="Update Device!"/>
        </form>
        <br/>
        <br/>

        <form action='admin.php' style='display:inline'>
                <input class="btn btn-danger" type='submit' value='Back'>
        </form>
        </div>
    </div>
        
        


        
    </fieldset>


    </body>
</html>