<!DOCTYPE html>
<html>

<?php
	include("includes/head.html");
	include("includes/header.php");

	$connect = mysqli_connect("localhost", "root", "", "tutor");
	if (!$connect) {
		echo("Connection failed: " . mysqli_connect_error());
	};

	$name = $_SESSION['NAME'];
	$ID = $_SESSION['ID'];

	$query_COURSE1 = mysqli_query($connect, "SELECT STUDENT_COURSE1 FROM students WHERE STUDENT_ID='$ID'");
	$row_COURSE1 = $query_COURSE1->fetch_row();
	$course1 = $row_COURSE1[0];

	$query_COURSE2 = mysqli_query($connect, "SELECT STUDENT_COURSE2 FROM students WHERE STUDENT_ID='$ID'");
	$row_COURSE2 = $query_COURSE2->fetch_row();
	$course2 = $row_COURSE2[0];

	$query_COURSE3 = mysqli_query($connect, "SELECT STUDENT_COURSE3 FROM students WHERE STUDENT_ID='$ID'");
	$row_COURSE3 = $query_COURSE3->fetch_row();
	$course3 = $row_COURSE3[0];

	$query_COURSE4 = mysqli_query($connect, "SELECT STUDENT_COURSE4 FROM students WHERE STUDENT_ID='$ID'");
	$row_COURSE4 = $query_COURSE4->fetch_row();
	$course4 = $row_COURSE4[0];

	$query_COURSE5 = mysqli_query($connect, "SELECT STUDENT_COURSE5 FROM students WHERE STUDENT_ID='$ID'");
	$row_COURSE5 = $query_COURSE5->fetch_row();
	$course5 = $row_COURSE5[0];



	//Creates select table for php
	$query_COURSEOPTIONS = mysqli_query($connect, "SELECT * FROM courses");
	$options = '';

	while($row = mysqli_fetch_array($query_COURSEOPTIONS))
	{
		$course_ID = $row['COURSE_ID'];
		$options.="<option value='$course_ID'>".$course_ID."</option>";
	}

	$select_C1 = "<select name='course1'>".$options."</select>";
	$select_C2 = "<select name='course2'>".$options."</select>";
	$select_C3 = "<select name='course3'>".$options."</select>";
	$select_C4 = "<select name='course4'>".$options."</select>";
	$select_C5 = "<select name='course5'>".$options."</select>";


	$query_studentengagements = "SELECT * FROM engagements WHERE engagement_student = $ID";
	$results_student = mysqli_query($connect, $query_studentengagements );


	$query_tutorengagements = "SELECT * FROM engagements WHERE engagement_tutor = $ID";
	$results_tutor = mysqli_query($connect, $query_tutorengagements);











?>

<body>

<h1>Manage Account</h1>
	<?php
		echo("<p>Welcome to your accout, $name</p>");
	?>



<h2>Courses you can tutor</h2>

<form action="php/updatecourses.php" method="POST">
	<table style="width:50;">
		
			<tr>
				<th></th>
				<th>Current Course</th>
				<th>New Course</th>
			</tr>
			<tr>
				<th>Course 1</th>
				<th><?php echo($course1); ?></th>
				<th><?php echo($select_C1); ?></th>
			</tr>
			<tr>
				<th>Course 2</th>
				<th><?php echo($course2); ?></th>
				<th><?php echo($select_C2); ?></th>
			</tr>
			<tr>
				<th>Course 3</th>
				<th><?php echo($course3); ?></th>
				<th><?php echo($select_C3); ?></th>
			</tr>
			<tr>
				<th>Course 4</th>
				<th><?php echo($course4); ?></th>
				<th><?php echo($select_C4); ?></th>
			</tr>
			<tr>
				<th>Course 5</th>
				<th><?php echo($course5); ?></th>
				<th><?php echo($select_C5); ?></th>
			</tr>
	</table>	
	<input type="submit" value="Submit Changes">
</form>


<h2>Student Information</h2>	
<?php echo("Student e-mail: ".$_SESSION['EMAIL']."</br>");
echo("Student phone: ".$_SESSION['PHONE']); ?>


<h2>Engagements</h2>	


<?php


	if(mysqli_num_rows($results_tutor) <= 0 && mysqli_num_rows($results_student) <= 0)
	{
		echo("You have no engagements");
	}
	else
	{
		echo("<h3>Student Engagements</h3>");
		if(mysqli_num_rows($results_student) > 0)
		{
			 while($row = mysqli_fetch_array($results_student))
			 {
			 	$message = "You are being tutored by ".$row['ENGAGEMENT_TUTORNAME']." on ".$row['ENGAGEMENT_DATETIME']." at ".$row['ENGAGEMENT_LOCATION']." for a total of ".$row['ENGAGEMENT_FEE']."$ over the course of ".$row['ENGAGEMENT_DURATION']." minutes";
			 	echo($message);
			 	echo("</br>");
			 	echo("</br>");
			 }
		}
		else
		{
		echo("You have no student engagements.");
		}
		echo("<h3>Tutoring Engagements</h3>");
		if(mysqli_num_rows($results_tutor) > 0)
		{
			while($row = mysqli_fetch_array($results_tutor))
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

				$message = "You are tutoring ".$student_name." on ".$row['ENGAGEMENT_DATETIME']." at ".$row['ENGAGEMENT_LOCATION']." for a total of ".$row['ENGAGEMENT_FEE']."$ over the course of ".$row['ENGAGEMENT_DURATION']." minutes";
			 	echo($message);
			 	echo("</br>");
			 	echo("</br>");
			}
		}
		else
		{
			echo("You have no tutor engagements.");
		}
	}




?>



</body>


</html>

<?php

	include("includes/footer.php");
?>


