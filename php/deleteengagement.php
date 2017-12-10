<?php

$courseID = $_GET['course'];

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$query_COURSE = mysqli_query($connect, "DELETE FROM ENGAGEMENTS WHERE ENGAGEMENT_ID = $courseID");

header("Location: ../manageaccount.php");


?>