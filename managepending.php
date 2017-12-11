<?php

include("includes/head.html");
include("includes/header.php");

$name = $_SESSION['NAME'];
$ID = $_SESSION['ID'];

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$query_COUNTPENDING = mysqli_query($connect, "SELECT * FROM ENGAGEMENTS WHERE ENGAGEMENT_ACCEPTED = 0 AND ENGAGEMENT_TUTOR = $ID");

if(mysqli_num_rows($query_COUNTPENDING) > 0)
{

	//FIND A WAY TO FIX THIS OMG
	//Basically tries to find the student name by cycling through a bunch of tables - not the best way
    while($row = mysqli_fetch_array($query_COUNTPENDING))
    {
	    $student_name = 'an unknown person';
	    $result_findname = mysqli_query($connect, "SELECT ENGAGEMENT_STUDENT FROM engagements WHERE ENGAGEMENT_TUTOR = $ID ");
	    if(mysqli_num_rows($result_findname) > 0)
	    {
	        while($row_student = mysqli_fetch_array($result_findname))
	        {
	            $result_findid = $row_student['ENGAGEMENT_STUDENT'];
	            $query_studentname = "SELECT STUDENT_NAME from STUDENTS where STUDENT_ID =".$result_findid;

	            $result_studentname = mysqli_query($connect, $query_studentname);
	            if(mysqli_num_rows($result_studentname) > 0){
	                while($row_studentname = mysqli_fetch_array($result_studentname))
	                {
	                    $student_name = $row_studentname['STUDENT_NAME'];
	                }
	            }
	        }
	    }

    	echo("<div class='pendingEngagement'>");
    	echo($student_name." wants to be tutored in ".$row['ENGAGEMENT_COURSEID']." at ".$row['ENGAGEMENT_LOCATION']." on ".$row['ENGAGEMENT_DATETIME']." for a duration of ".$row['ENGAGEMENT_DURATION']." minutes for ".$row["ENGAGEMENT_FEE"]."$");
    	echo('</br>');
    	$course = $row['ENGAGEMENT_ID'];
    	echo("<a class='acceptengagement' href='php/acceptengagement.php?course=$course'>Accept</a></br>");
    	echo("<a class='declineengagement' href='php/deleteengagement.php?course=$course'>Decline</a></br>");
    	echo("</div>");
    }
}
else
{
	echo("You have no tutor engagements.");
}