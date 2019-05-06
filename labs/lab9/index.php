<?php

 if (!empty($_FILES)) {

    // print_r($_FILES);
    
    // echo "Image size: " . $_FILES['myFile']['size'];
    $size = intval($_FILES['myFile']['size']);
    if($size==0){
        print_r("File larger than 1 MB. Try another image.");
    }else{
    move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
    }

}


    function displayImagesUploaded() {

        $images = scandir("gallery"); //returns all file names within a folder
        for ($i = 2; $i < count($images); $i++) {
            echo "<div class='col-sm-4'><img src='gallery/$images[$i]' width='150' class='img-thumbnail'= /></div>";
        }//for
    
    }//function


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 9: File Upload </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style>
            img { padding: 10px; }
            img:hover { width: 250px; }
        </style>

        
    </head>
    <body>
        <h1 style="text-align:center" class="font-italic"> Upload Images </h1>
        </br></br></br></br></br></br>
        <div style="text-align:center" >
        <form  id="file_form" method="POST" enctype="multipart/form-data">
        
            <input id="upload" class="btn btn-secondary" type="file" name="myFile" />
            <button id="uploadButton" class="btn btn-secondary"> Upload File! </button>
            <p id="hidden"></p>
            
        </form>
        </div>
        <hr>
        <h4 style="text-align:center"class="font-italic"> Images uploaded: </h4>
        <div id="test" name="test" class="row mt-2" style="text-align:center"><?= displayImagesUploaded() ?></div>
        
    </body>
</html>