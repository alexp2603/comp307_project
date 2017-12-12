<?php

include("includes/head.html");
include("includes/header.php");


$name = $_SESSION['NAME'];
$ID = $_SESSION['ID'];

$connect = mysqli_connect("localhost", "root", "", "tutor");
if (!$connect) {
	echo("Connection failed: " . mysqli_connect_error());
};

$query_TUTOR = mysqli_query($connect, "SELECT * FROM ENGAGEMENTS WHERE ENGAGEMENT_ACCEPTED = 1 AND ENGAGEMENT_TUTOR = $ID");
$encode = array();
while($r = mysqli_fetch_assoc($query_TUTOR))
{
	$rows[] = $r;
}
$json_TUTOR = json_encode($rows);



?>


<html>
	
	<script> printList(<?php echo($json_TUTOR);?>)


	function printList(list)
	{
		console.log(list);
	}

</script>
</html>


