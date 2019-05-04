<?php

//receives these parameters: action, url, keyword
 include '../../../inc/dbConnection.php';
 $conn = getDatabaseConnection("c9");

 
$sql2 = "SELECT * FROM `savedMovies`";
$stmt = $conn->prepare($sql2);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($resp);
?>