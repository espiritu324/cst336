<?php

//receives these parameters: action, url, keyword
 include '../../../inc/dbConnection.php';
 $conn = getDatabaseConnection("c9");

 $action = $_GET['action'];

 $np = array();
 
  switch ($action) {
        
        case "add":    $sql = "INSERT INTO favoritepix (imageURL, keyword) VALUES (:favorite, :keyword)";
                       $np[':keyword'] = $_GET['keyword'];
                       $np[':favorite'] = $_GET['favorite'];
                       break;
        case "delete":  $sql = "DELETE FROM favoritepix WHERE imageURL = :favorite";
                        $np[':favorite'] = $_GET['favorite'];
                        break;
        case "keyword": $sql = "SELECT DISTINCT(keyword) FROM favoritepix";
                        break;
        case "favorites": $sql = "SELECT imageURL FROM `favoritepix` WHERE keyword=:keyword"; 
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