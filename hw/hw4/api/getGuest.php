<?php
    
    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("wedding");
    $sql = "SELECT firstName, lastName, gender FROM guests ORDER BY guestId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>