<?php
	
/**
	PHP Script to input to database and print content
**/

//Accepts input, creates new record using put method
$app->post('/api/registerstudent', function($request) {

	//require_once('dbconnect.php');

	$connect = mysqli_connect("localhost", "root", "", "tutor");
	if (!$connect) {
    	echo("Connection failed: " . mysqli_connect_error());
	};

	$id = $_POST['STUDENT_ID'];	
	$name = $_POST['STUDENT_NAME'];	
	$password = $_POST['STUDENT_PASSWORD'];	
	$email = $_POST['STUDENT_EMAIL'];
	$year = $_POST['STUDENT_YEAROFSTUDY'];	
	$phone = $_POST['STUDENT_PHONE'];	
			

	mysqli_query($connect, "INSERT INTO students(STUDENT_ID, STUDENT_NAME, STUDENT_PASSWORD, STUDENT_EMAIL, STUDENT_YEAROFSTUDY, STUDENT_PHONE) VALUES ('$id', '$name', '$password', '$email', '$year', '$phone')");

	header("Location: http://localhost/comp307_project");
	exit();

});

?>