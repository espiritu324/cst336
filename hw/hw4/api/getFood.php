<?php
    
    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("wedding");
    $sql = "SELECT price, foodType FROM food ORDER BY foodId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>