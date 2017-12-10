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
while($r = mysqli_fetch_assoc($query_TUTOR))
{
	$rowsTUTOR[] = $r;
}

if(isset($rowsTUTOR)){
	$json_TUTOR = json_encode($rowsTUTOR);
}
else
{
	$json_TUTOR = '{}';
}


$query_STUDENT = mysqli_query($connect, "SELECT * FROM ENGAGEMENTS WHERE ENGAGEMENT_ACCEPTED = 1 AND ENGAGEMENT_STUDENT = $ID");
while($r = mysqli_fetch_assoc($query_STUDENT))
{
	$rowsSTUDENT[] = $r;
}
if(isset($rowsSTUDENT)){
	$json_STUDENT = json_encode($rowsSTUDENT);
}
else
{
	$json_STUDENT = '{}';
}

//END PHP
?>

<html>

<h1> Your engagements </h1>


  <body>

  	
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 45.5048, 
        	lng: -73.5772};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });

      generateMarkersTutor(<?php echo($json_TUTOR) ?>, map);
      generateMarkersStudent(<?php echo($json_STUDENT) ?> , map);

      }

      function generateMarkersTutor(json , map)
      {

      	for(var i = 0; i < json.length; i++)
      	{
      		var obj = json[i];
      		var address = obj.ENGAGEMENT_LOCATION;

      		getCoordinatesTutor(address, function(coordinates){placeMarkerTutor(coordinates, map, obj)});
	    }
	  }

	  function placeMarkerTutor(coords, map, obj)
	  {
	  	console.log(coords);
		var marker = new google.maps.Marker({
        	position: coords,
        	map: map,
        	animation: google.maps.Animation.DROP,
        	icon: 'img/bookicon.png'
       	});
       	marker.addListener('click', function() {
       		var courseID = obj.ENGAGEMENT_COURSEID;
       		var location = obj.ENGAGEMENT_LOCATION;
       		var duration = obj.ENGAGEMENT_DURATION;
       		var time = obj.ENGAGEMENT_DATETIME;
       		alert("You are tutoring " + courseID + " at " + location + " on " + time + " for " + duration + " minutes.");
        });
	  }


	  function getCoordinatesTutor(address,callback)
	  {
	  	var coordinates;

	  	var geocoder = new google.maps.Geocoder();
	  	geocoder.geocode({address: address}, function(results, status){
	  		coordinates = results[0].geometry.location;
	  		callback(coordinates);
	  	});
	  }


//***STUDENT MARKERS****///
	function generateMarkersStudent(json , map)
    {
      	for(var i = 0; i < json.length; i++)
      	{
      		var obj = json[i];
      		var address = obj.ENGAGEMENT_LOCATION;

      		getCoordinatesStudent(address, function(coordinates){placeMarkerStudent(coordinates, map, obj)});
	    }
	 
	}

	  function placeMarkerStudent(coords, map, obj)
	  {
	  	console.log(coords);
		var marker = new google.maps.Marker({
        	position: coords,
        	map: map,
        	animation: google.maps.Animation.DROP,
        	icon: 'img/tutoredicon.png'
       	});
       	marker.addListener('click', function() {
       		var courseID = obj.ENGAGEMENT_COURSEID;
       		var location = obj.ENGAGEMENT_LOCATION;
       		var duration = obj.ENGAGEMENT_DURATION;
       		var time = obj.ENGAGEMENT_DATETIME;
       		alert("You are being tutored in " + courseID + " at " + location + " on " + time + " for " + duration + " minutes.");
        });
	  }


	  function getCoordinatesStudent(address,callback)
	  {
	  	var coordinates;

	  	var geocoder = new google.maps.Geocoder();
	  	geocoder.geocode({address: address}, function(results, status){
	  		coordinates = results[0].geometry.location;
	  		callback(coordinates);
	  	});
	  }












	//API KEY - AIzaSyCX3OwJuR9h0g7f4vx-_a02Gh_xGqtPnzo

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCX3OwJuR9h0g7f4vx-_a02Gh_xGqtPnzo&callback=initMap">
    </script>
 



  </body>



    <style>
      #map {
        width: 100%;
        height: 60%;
        background-color: grey;
      }
    </style>

</html>

<?php
include("includes/footer.php");
?>