<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Admin Login Page </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div class='jumbotron'></div>
        
        <h1> Admin Login </h1>
        
            <form method="POST" action="loginProcess.php">
            
                Username: <input type="text" name="username"/> <br />
            
                Password: <input type="password" name="password"/> <br />
            
                <input type="submit" name="login" value="Login"/>
            
            
            </form>
        </div>
        <?php
            /*if($_SESSION['Logincheck']==false){
                echo "<h2> Wrong Username or Password</h2>";
            }*/
        ?>

    </body>
</html>