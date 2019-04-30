<?php

//receives these parameters: action, url, keyword
 include '../../../inc/dbConnection.php';
 $conn = getDatabaseConnection("c9");

 $action = $_GET['action'];

 $np = array();
 
  switch ($action) {
        
        case "add":    $sql = "INSERT INTO lab8_pixabay (imageURL, keyword) VALUES (:favorite, :keyword)";
                       $np[':keyword'] = $_GET['keyword'];
                       $np[':favorite'] = $_GET['favorite'];
                       break;
        case "delete":  $sql = "DELETE FROM lab8_pixabay WHERE imageURL = :favorite";
                        $np[':favorite'] = $_GET['favorite'];
                        break;
        case "keyword": $sql = "SELECT DISTINCT(keyword) FROM lab8_pixabay";
                        break;
        case "favorites": $sql = "SELECT imageURL FROM `lab8_pixabay` WHERE keyword=:keyword"; 
                        $np[':keyword'] = $_GET['keyword'];
                        break;
                        
    }//switch

    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    
    //fetching records when using select
    if($action == "keyword" || $action == "favorites"){
        
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($records);
    }

?>