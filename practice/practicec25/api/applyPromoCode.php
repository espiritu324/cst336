<?php

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("midterm");


$promoCode1 = array();
$promoCode1["getFifty"] = ".5";
$promoCode2 = array();
$promoCode2["halfPrice"] = ".5";
$promoCode3 = array();
$promoCode3["sand30"] = ".3";
$promoCode4 = array();
$promoCode4["spring30"] = ".3";
$promoCode5 = array();
$promoCode5["beach"] = ".2";
$promoCode6 = array();
$promoCode6["sunny"] = ".2";

$promoCodes = array($promoCode1, $promoCode2, $promoCode3, $promoCode4, $promoCode5, $promoCode6);
echo json_encode($promoCodes);


//secho array_search(promoCode, $promoCodes);
?>