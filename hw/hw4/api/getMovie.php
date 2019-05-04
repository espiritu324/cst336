<?php

//https://pixabay.com/api/?key=5589438-47a0bca778bf23fc2e8c5bf3e&image_type=photo&orientation=horizontal&safesearch=true&per_page=100
 include '../../../inc/dbConnection.php';
 $conn = getDatabaseConnection("c9");
 
$keyword = $_GET['keyword'];
// $keyword = shazam;

$curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://www.omdbapi.com/?i=tt3896198&apikey=472d5f97&t=$keyword",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
      ),
   ));

$jsonData = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);


$data = json_decode($jsonData, true);  //from JSON format to an Array
$title = strval($data["Title"]);
$image = strval($data["Poster"]);
// echo($title);


$sqlTemp = "SELECT * FROM savedMovies WHERE title LIKE '%$title%'";
$stmt = $conn->prepare($sqlTemp);
$stmt->execute();
$resp = $stmt->fetch(PDO::FETCH_ASSOC);
if($resp==null){
      $sql = "INSERT INTO `savedMovies` (`title`, `imageURL`) VALUES ('$title', '$image')";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
}




echo json_encode($data);




// //print_r($data);

// $imageURLs = array();

// for ($i = 0; $i < 50; $i++) {

//   $imageURLs[] = $data["hits"][$i]["webformatURL"];
  
// }

// shuffle($imageURLs);

// echo json_encode(array_slice($imageURLs, 0, 9)); 

//print_r($imageURLs);

?>