<!DOCTYPE html>
<html>
 
<style>
label {
	padding-bottom: 12px;
	padding-right: 10px;
}
</style>

<?php

include("includes/head.html");
include("includes/header.php");

?>
<br>
<br>
<br>
<div class="container">
	<?php

	$id_tutor = $_GET['id'];
	$course = $_GET['course'];
	$tutorname = $_GET['tutorname'];

	$connect = mysqli_connect("localhost", "root", "", "tutor");
	if (!$connect) {
		echo("Connection failed: " . mysqli_connect_error());
	};

	$query = "SELECT STUDENT_NAME from students WHERE STUDENT_ID = $id_tutor";

	$result_TUTORNAME = mysqli_query($connect, $query);

	while($row = mysqli_fetch_array($result_TUTORNAME))
	{
		$tutorname = $row['STUDENT_NAME'];
	}


	echo("<h2>Book a session of ".$course." course tutoring with ".$tutorname."!</h2>");

	echo("<form action='php/updateengagement.php?course=$course&id=$id_tutor&tutor_name=$tutorname' method='post'>");
	?>

	<html>
			<label>Date and time: </label><input type="datetime-local" name="datetime">
			</br>
			<label>Location: </label><input type="text" name="location">
			</br>
			<label>Duration: </label><input type="text" name="duration">
			</br>
			<label>Fee: </label><input type="text" name="fee">
			</br>
			<input type="submit" value="Book!">
		</form>

	</html>
</div>


<?php
	include("includes/footer.php");
?> 

</html>