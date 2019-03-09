<?php

//validates that username is NOT contained in the password

$username = $_GET['username'];
$password = $_GET['pwd'];

// echo $username . "<br>";
// echo $password . "<br>";

if(stripos($password, $username) !==false){
    //echo "Username is included in password!";
    $data["validPwd"] = false;
    
}else{
    //echo "Usernmae is NOT included in password!";
    $dat["validPwd"]= true;
}

echo json_encode($data);

?>