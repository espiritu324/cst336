<?php

//print_r($_POST); //for debugging purposes
include '../../inc/dbConnection.php';
$conn = getDatabaseConnection("ottermart");

$username = $_POST['username'];//gets values from form, key in '' must match name in form
$password = sha1($_POST['password']);

$sql = "SELECT * FROM `om_admin` WHERE username = '$username' AND password = '$password'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($record)){
    echo "Username or Password incorrect!";
} else{
    // echo $record['firstName'];
    header('location: admin.php');
    
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];

}

print_r($record);
?>