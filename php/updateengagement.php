<?php
	session_start();

	$course = $_GET['course'];
	$tutor_id = $_GET['id'];
	$tutor_name = $_GET['tutor_name'];
	$student_id = $_SESSION['ID'];
	$datetime = $_POST['datetime'];
	$location = $_POST['location'];
	$duration = $_POST['duration'];
	$fee = $_POST['fee'];

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$query = "INSERT INTO engagements(ENGAGEMENT_STUDENT, ENGAGEMENT_TUTOR, ENGAGEMENT_DATETIME, ENGAGEMENT_LOCATION, ENGAGEMENT_DURATION, ENGAGEMENT_FEE, ENGAGEMENT_COURSEID, ENGAGEMENT_TUTORNAME,ENGAGEMENT_ACCEPTED) VALUES ('$student_id', '$tutor_id', '$datetime', '$location', '$duration', '$fee', '$course', '$tutor_name',0)";

mysqli_query($connect, $query);

header("Location: ../index.php");

?>