<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login Page</title>
        <link href="css/styles.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <h1 class='center'> Admin Login </h1>
        <div class='position'>
            <form class='signIn' id='signIn' method="POST" action="loginProc.php">
            
                Username: <input class='form-control' type="text" name="username"/> <br />
            
                Password: <input class='form-control' type="password" name="password"/> <br />
            
                <input class='btn btn-primary'type="submit" name="login" value="Login"/>
            
            </form>
            <form class='center' action="home.php">
                <input class='btn btn-danger' type="submit" name="back" value="Back"/>
            </form>
            <?php
                    if($_SESSION['LogError']==true){
                        echo "<h3 id='logError'>Wrong Username and Password</h3>";
                    }
            ?>
        </div>
    </body>
</html>