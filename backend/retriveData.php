<?php

require 'databaseConnection.php';

// inital counting for upper limit random number

$sql = "Select * from questions";

$result= mysqli_query($conn,$sql);

$upperLimit = mysqli_num_rows($result);

$randomNumber = rand(1, $upperLimit);

// create a new number if the question already has been given

while(in_array($randomNumber, $_POST['usedAnswers'])) {

	$randomNumber = rand(1, $upperLimit);
}

// initally select a random question

$sqlRandomQuestion = "Select * from Questions WHERE id= $randomNumber";

$resultQuery=mysqli_query($conn,$sqlRandomQuestion);

$datas[] = array();


while( $row = mysqli_fetch_assoc($resultQuery)) {
	     $datas = $row;
	}


echo json_encode($datas);


?>