<?php
session_start();

if (!isset($_SESSION['username'])) { //validates that admin has indeed logged in
    
    header("Location: index.php");
    
}

 include("../../dbConnection.php");
 $conn = getDatabaseConnection();

function getDepartmentInfo(){
    global $conn;        
    $sql = "SELECT deptName, departmentId 
            FROM tc_department 
            ORDER BY deptName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll();
    
    return $records;
    
}

function getUserInfo($userId) {
    global $conn;    
    $sql = "SELECT * 
            FROM tc_user
            WHERE userId = $userId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();
    //print_r($record);
    return $record;
}

if (isset($_GET['updateUserForm'])) { //admin has submitted form to update user
    global $conn;
    $sql = "UPDATE tc_user
            SET firstName = :fName,
                lastName = :lName,
                userId= :userId,
                email = :e,
                gender = :g,
                role = :rol,
                deptId = :dpt,
                phone = :pho
			WHERE userId = :userId";
			
	$namedParameters = array();
	$namedParameters[":fName"] = $_GET['firstName'];
	$namedParameters[":lName"] = $_GET['lastName'];
	$namedParameters[":userId"] = $_GET['userId'];
	$namedParameters[":e"] = $_GET['email'];
	$namedParameters[":g"] = $_GET['gender'];
	$namedParameters[":rol"] = $_GET['role'];
	$namedParameters[":uniId"] = $_GET['universityId'];
	$namedParameters[":dpt"] = $_GET['deptId'];
	$namedParameters[":pho"] = $_GET['phone'];

    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    header("Location: admin.php");
}



if (isset($_GET['userId'])) {
    
    $userInfo = getUserInfo($_GET['userId']);
    
    
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin: Updating User </title>
    </head>
    <body>

    <h1> Admin Section </h1>
    <h2> Updating User Info </h2>

    <fieldset>
        
        <legend> Update User </legend>
        
        <form>
            
            <input type="hidden" name="userId" value="<?=$userInfo['userId']?>" />
            First Name: <input type="text" name="firstName" required value="<?=$userInfo['firstName']?>" /> <br>
            Last Name: <input type="text" name="lastName" required value="<?=$userInfo['lastName']?>"/> <br>
            Email: <input type="text" name="email" value="<?=$userInfo['email']?>"/> <br>
            University Id: <input type="text" name="universityId" value="<?=$userInfo['universityId']?>"/> <br>
            Phone: <input type="text" name="phone"value="<?=$userInfo['phone']?>"/> <br>
            Gender: <input type="radio" name="gender" value="F" id="genderF"  <?=($userInfo['gender']=='F')?"checked":"" ?> required/> 
                    <label for="genderF">Female</label>
                    <input type="radio" name="gender" value="M" id="genderM"  <?=($userInfo['gender']=='M')?"checked":"" ?> required/> 
                    <label for="genderM">Male</label><br>
            Role:   <select name="role">
                        <option value=""> Select One </option>
                        <option <?php if ($userInfo['role']=='Faculty') echo 'selected="selected"'?>>Faculty</option>
                        <option <?php if ($userInfo['role']=='Student') echo 'selected="selected"'?>>Student</option>
                        <option <?php if ($userInfo['role']=='Staff') echo 'selected="selected"'?>>Staff</option>
                    </select>
            <br />
            Department: <select name="deptId">
                            <option value=""> Select One </option>
                            <?php
                            
                                $departments = getDepartmentInfo();
                                foreach ($departments as $record) {
                                    echo "<option value='$record[departmentId]' ".(($userInfo['deptId'] == $record['departmentId'])?"selected":"").">$record[deptName]</option>";
                                }
                            
                            ?>
                            
                        </select>
                        <br />
                <input type="submit" name="updateUserForm" value="Update User!"/>
        </form>
        
    </fieldset>


    </body>
</html>