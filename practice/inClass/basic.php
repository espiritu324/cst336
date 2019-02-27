<?php
    
    $otterId = "good9016";
    echo "My otter id is: " . $otterId;
    
    $newArray = array("one", "two", "three");
    $weekdays = array();
    
    $weekdays[]="Monday";
    $weekdays[]="Tuesday";
    
    array_push($weekdays, "Wednesday", "Thursday", "Friday");
    
    print_r($weekdays);
    echo "</br>";
    echo in_array("Tuesday", $weekdays);


?>