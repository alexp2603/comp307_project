<!DOCTYPE html>
<html>
<style type="text/css">
    table{
        border-collapse: separate;
        border-spacing: 10px; /* Apply cell spacing */
    }
    table, th, td{
        border: 1px solid #666;
    }
    table th, table td{
        padding: 5px; /* Apply cell padding */
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

                $course = $_POST['course'];
                echo("<h2>Available $course Tutors</h2>");

            	$connect = mysqli_connect("localhost", "root", "", "tutor");
            	if (!$connect) {
            		echo("Connection failed: " . mysqli_connect_error());
            	};

            	$query = mysqli_query($connect, "SELECT STUDENT_ID, STUDENT_NAME, STUDENT_EMAIL, STUDENT_YEAROFSTUDY, STUDENT_PHONE FROM students WHERE STUDENT_COURSE1 = '$course' OR STUDENT_COURSE2 = '$course' OR STUDENT_COURSE3 = '$course' OR STUDENT_COURSE4 = '$course' OR STUDENT_COURSE5 = '$course' ");

            	if(mysqli_num_rows($query)>0)
                {
                    echo("<table cellspacing='10'><tr><th>Tutor name</th><th>Year of Study</th><th>Tutor Phone</th><th>Tutor E-Mail</th><th>Book An Engagement!</th></tr>");

                    while($row = mysqli_fetch_array($query))
                    {
                    	$id = $row['STUDENT_ID'];
                        $tutorname = $row['STUDENT_NAME'];
                    	echo("<tr>");
                    	echo("<th>".$row['STUDENT_NAME']."</th>");
                    	echo("<th>".$row['STUDENT_YEAROFSTUDY']."</th>");
                    	echo("<th>".$row['STUDENT_PHONE']."</th>");
                    	echo("<th>".$row['STUDENT_EMAIL']."</th>");
                    	echo("<th><a href='book.php?id=$id&course=$course&tutorname=$tutorname'>Book an engagement with ".$row['STUDENT_NAME']."</a></th>");
                    	echo("</tr>");
                    }
                    echo("</table>");
                }
                else
                {
                    echo("Oops! It seems no one is tutoring for that course!");
                }
             ?>
</div>

<?php

include("includes/footer.php");
?>
</html>



