<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$product = $_GET['productKeyword'];

//This query works BUT it allows SQL INJECTION (because it's using single quotes)
//$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";

$sql = "SELECT * FROM `om_product` WHERE productName LIKE :product";

$namedParameters = array();
$namedParameters[":product"] = "%$product%";

$stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //debugging    

echo json_encode($records);

?>