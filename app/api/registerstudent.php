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


	$query_STUDENTID = mysqli_query($connect, "SELECT count(*) FROM STUDENTS WHERE STUDENT_ID = $id");
    $row_STUDENTID = $query_STUDENTID->fetch_row();
    $numberID = $row_STUDENTID[0];


    // Encrypt password in database
    $string_to_encrypt=$password;
    $key="key123";
    $encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$key);
    // $decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$key);


	if($numberID>0)
	{
		echo("Student ID already registered. Please register with a unique Student ID");
		echo("</br>");
		echo("<a href='../../../index.php'>Go back to main page</a>");

	}
	else
	{
	/*
	    // Insert and prevent against SQL injections
        $stmt = $connect->prepare("INSERT INTO students(STUDENT_ID, STUDENT_NAME, STUDENT_PASSWORD, STUDENT_EMAIL, STUDENT_YEAROFSTUDY, STUDENT_PHONE) VALUES ('$id', '$name', '$password', '$email', '$year', '$phone')");
        $stmt->bind_param("isssss", $id, $name, $password, $email, $year, $phone);
        $stmt->execute();
        header("Location: ../../../index.php");
		$stmt->close();
		exit();
		*/
        mysqli_query($connect, "INSERT INTO students(STUDENT_ID, STUDENT_NAME, STUDENT_PASSWORD, STUDENT_EMAIL, STUDENT_YEAROFSTUDY, STUDENT_PHONE) VALUES ('$id', '$name', '$encrypted_string', '$email', '$year', '$phone')");
        header("Location: ../../../index.php");
        exit();
	}	

});



?>
