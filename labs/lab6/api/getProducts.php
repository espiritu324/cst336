<?php

//header('Access-Control-Allow-Origin: *');

$host = "localhost";
$dbname = "ottermart";
$username = "root";
$password = "";

// Establishing a connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "SELECT * FROM om_product ORDER BY productPrice";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

// print_r($records); //displays array content
$temp = "creation";
// echo json_encode($records);
echo json_encode($records);
// echo $records[0]['productName'];
?>