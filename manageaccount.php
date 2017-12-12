<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
       <link href="css/manageaccountstyles.css" rel="stylesheet">
    </head>

      <br></br>
                        <br></br>
<?php

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
    <div class="container">
   <font size= "6"><b>Manage Account</b></font>
      <br></br>
            <?php
                echo("<p>Welcome to your account, $name.</p>");
            ?>
      <br></br>

        <font size = "5">Courses You Can Tutor</font>
        <form action="php/updatecourses.php" method="POST">
        <div class="table-responsive">          
          <table class="table">
              <thead>
                <tr>
                    <th>Current Course</th>
                    <th>  </th>
                    <th>New Course</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Course 1</td>
                    <td><?php echo($course1); ?></td>
                    <td><?php echo($select_C1); ?></td>
                </tr>
                <tr>
                    <td>Course 2</td>
                    <td><?php echo($course2); ?></td>
                    <td><?php echo($select_C2); ?></td>
                </tr>
                <tr>
                    <td>Course 3</td>
                    <td><?php echo($course3); ?></td>
                    <td><?php echo($select_C3); ?></td>
                </tr>
                <tr>
                    <td>Course 4</td>
                    <td><?php echo($course4); ?></td>
                    <td><?php echo($select_C4); ?></td>
                </tr>
                <tr>
                    <td>Course 5</td>
                    <td><?php echo($course5); ?></td>
                    <td><?php echo($select_C5); ?></td>
                </tr>
              </tbody>
            </table>	
        </div>
            <input type="submit" class="btn btn-default" value="Submit Changes">
        </form>


        <br><font size = "5">Student Information</font></br>

        <?php echo("Student e-mail: ".$_SESSION['EMAIL']."</br>");
        echo("Student phone: ".$_SESSION['PHONE']); ?>

        <br></br>
        <br><font size = "6"><b>Engagements</b></font></br>


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

                        $row_engagementID = $row['ENGAGEMENT_ID'];
                        echo("<a class='delete-btn' href='php/deleteengagement.php?course=$row_engagementID'>Delete Engagement</a>");

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
    </div>




</body>


</html>

<?php
    include("map.php");
	include("includes/footer.php");
?>


