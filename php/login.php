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

<<<<<<< HEAD
	$query_PHONE = mysqli_query($connect, "SELECT STUDENT_PHONE FROM students WHERE STUDENT_ID='$ID'");
	$row_PHONE = $query_PHONE->fetch_row();
	$phone = $row_PHONE[0];

	$query_EMAIL = mysqli_query($connect, "SELECT STUDENT_EMAIL FROM students WHERE STUDENT_ID='$ID'");
	$row_EMAIL = $query_EMAIL->fetch_row();
	$email = $row_EMAIL[0];

	$_SESSION['ID'] = $ID;
	$_SESSION['NAME'] = $name;
	$_SESSION['PHONE'] = $phone;
	$_SESSION['EMAIL'] = $email;
=======
	$_SESSION['ID'] = $ID;
	$_SESSION['NAME'] = $name;
>>>>>>> 879ce824aff1920e2e3d9836c65ced7cb0de51a6

	header("Location: ../index.php");
}

else
{
	echo("Username or password incorrect");
}

?>

