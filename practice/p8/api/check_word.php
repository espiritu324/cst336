<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
include '../dbConnection.php';
$conn = getDatabaseConnection("hangman");

//word id
$id = intval($_GET['wordId']);

$sql = "SELECT word_id, length(word) length FROM words WHERE word_id = " . $id;
$stmt = $conn -> prepare($sql);  
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC);

echo($record);

?>