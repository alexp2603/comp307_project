<?php

session_start();

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$ID = $_POST["login_ID"];
$password = $_POST["login_password"];

if($ID=='' || $password =='')
{
	echo("Empty field");
	die();
}

$query_ID = mysqli_query($connect, "SELECT STUDENT_ID FROM students WHERE STUDENT_ID='$ID'");
$query_PASSWORD = mysqli_query($connect, "SELECT STUDENT_PASSWORD FROM students WHERE STUDENT_ID='$ID'");


$row_ID = $query_ID->fetch_row();
$row_PASSWORD = $query_PASSWORD->fetch_row();


if($row_ID[0] == '0' || $row_PASSWORD[0] =='0')
{
	echo("Please submit both your ID and password");
}

elseif($row_PASSWORD[0] == $password)
{

	$query_NAME = mysqli_query($connect, "SELECT STUDENT_NAME FROM students WHERE STUDENT_ID='$ID'");
	$row_NAME = $query_NAME->fetch_row();
	$name = $row_NAME[0];

	$_SESSION['ID'] = $ID;
	$_SESSION['NAME'] = $name;

	header("Location: ../index.php");
}

else
{
	echo("Username or password incorrect");
}

?>

