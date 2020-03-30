<?php

require 'databaseConnection.php';

$keys = array_keys($_POST);

$sql ="SELECT * FROM questions WHERE correctAnswer = '$keys[0]'";

$queryResult1 = mysqli_query($conn,$sql);

$amountOfCorrectQuestions = mysqli_num_rows($queryResult1); 

$array = Array();

$sql ="SELECT * FROM questions";

$queryResult2 = mysqli_query($conn,$sql);

$amountOfQuestions = mysqli_num_rows($queryResult2); 

array_push($array,$amountOfQuestions,$amountOfCorrectQuestions);

echo json_encode($array);


?>