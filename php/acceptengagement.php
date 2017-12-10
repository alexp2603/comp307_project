<?php

$courseID = $_GET['course'];

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$query_COURSE = mysqli_query($connect, "UPDATE engagements SET ENGAGEMENT_ACCEPTED = 1 WHERE ENGAGEMENT_ID = $courseID");

header("Location: ../manageaccount.php");

?>