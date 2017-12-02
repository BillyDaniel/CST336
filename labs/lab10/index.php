<?php

  //print_r($_FILES);
  //echo "File size " . $_FILES['myFile']['size'];
  if($_FILES["myFile"]["size"]>1000000){
      echo "<h2>Error File  Too Large</h2>";
  }
  else{
        move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );
        echo "<img id='focus' src='gallery/" .   $_FILES["myFile"]["name"] . "'>";
        
  }

  
  $files = scandir("gallery/", 1);
  
  //print_r($files);
  
     
  
  

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        
        <script>

           $(document).ready(function(){
                 $("img").click(function() {
                    $(this).toggleClass("bigger");
                });
            })
        </script>
        <title> Lab 10: Photo Gallery </title>
    </head>
    <body>

    <h1 id='title'> Photo Gallery </h1>
    <hr>
    <div class='center'>

    <form method="POST" enctype="multipart/form-data"> 


        <input type="file" name="myFile" class="upload"/> 
        
        <input type="submit" value="Upload File!" class="button"/>

    </form>
    
    <?php
     for ($i = 0;$i < count($files)-2;$i++){
      echo "<img id='focus' src='gallery/" .   $files[$i] . "' width='50' >";
     }
    ?>
    

</div>
    </body>
</html>