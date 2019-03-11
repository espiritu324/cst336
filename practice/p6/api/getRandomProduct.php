<?php
    $product1 = array();
    $product1["product"] = "Microfiber Beach Towel";
    $product1["price"] = "40";
    $product1["qty"] ="2";
    $product2 = array();
    $product2["product"] = "Flip-flop Sandals";
    $product2["price"] = "30";
    $product2["qty"] ="5";
    $product3 = array();
    $product3["product"] = "Sunscreen 80SPF";
    $product3["price"] = "25";
    $product3["qty"] ="3";
    $product4 = array();
    $product4["product"] = "Plastic Flying Disc";
    $product4["price"] = "15";
    $product4["qty"] ="4";
    $product5 = array();
    $product5["product"] = "Beach Umbrella";
    $product5["price"] = "75";
    $product5["qty"] ="1";
    
    $products = array($product1, $product2, $product3, $product4, $product5);
    
    echo json_encode($products[rand(0, 4)]);
?>
