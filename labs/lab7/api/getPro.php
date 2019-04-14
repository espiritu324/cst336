<?php
    
    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    $sql = "SELECT productId, productName, productPrice, productImage FROM om_product ORDER BY catId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>