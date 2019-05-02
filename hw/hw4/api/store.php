<?php

//receives these parameters: action, url, keyword
 include '../../../inc/dbConnection.php';
 $conn = getDatabaseConnection("c9");

 $title = $_GET['title'];
 $url = $_GET['url'];


$sql = "INSERT INTO `savedMovies` (`title`, `imageURL`) VALUES ($title, $url)";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql2 = "SELECT imageURL FROM `savedMovies`";
$stmt = $conn->prepare($sqls);
$stmt->execute();
$resp = $stmt->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($resp);
?>