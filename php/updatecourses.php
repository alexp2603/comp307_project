<?php

session_start();

$ID = $_SESSION['ID'];

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$course1 = $_POST['course1'];
$course2 = $_POST['course2'];
$course3 = $_POST['course3'];
$course4 = $_POST['course4'];
$course5 = $_POST['course5'];

$query = mysqli_query($connect, "UPDATE students SET STUDENT_COURSE1='$course1' WHERE STUDENT_ID='$ID'");
$query = mysqli_query($connect, "UPDATE students SET STUDENT_COURSE2='$course2' WHERE STUDENT_ID='$ID'");
$query = mysqli_query($connect, "UPDATE students SET STUDENT_COURSE3='$course3' WHERE STUDENT_ID='$ID'");
$query = mysqli_query($connect, "UPDATE students SET STUDENT_COURSE4='$course4' WHERE STUDENT_ID='$ID'");
$query = mysqli_query($connect, "UPDATE students SET STUDENT_COURSE5='$course5' WHERE STUDENT_ID='$ID'");

header("Location: ../manageaccount.php");

?>
