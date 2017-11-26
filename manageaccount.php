<!DOCTYPE html>
<html>

<?php
	include("head.html");
	include("header.php");

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
</body>

</html>


