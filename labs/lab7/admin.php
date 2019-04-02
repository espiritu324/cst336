<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Ottermart - Admin Section </title>
    </head>
    <body>

        <h1> Ottermart - Admin Section </h1>

        Welcome <?=$_SESSION['adminName']?>
        
                 <?php 
                   echo $_SESSION['adminName'];
                 ?>


    </body>
</html>