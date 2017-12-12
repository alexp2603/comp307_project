<!DOCTYPE html>
<html lang="en">
  <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
       <link href="css/style.css" rel="stylesheet">
  </head>
 
<body>

  <?php

    include("includes/header.php");
  ?>

  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img/image_1.jpg" style="width:100%;">
      <div class="text" style="padding-bottom: 200px">Classes Shouldn't Be This Hard.</div>
      <div class="captiontext" style="padding-bottom: 200px">Having trouble in a class? We're here to help.</div>
      <p><a class="btn btn-primary btn-lg" href="signup.php" role="button">Sign Up »</a>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img/image_2.jpg" style="width:100%">
      <div class="text" style="padding-bottom: 200px">Learn With Confidence.</div>
      <div class="captiontext" style="padding-bottom: 200px">Helping students achieve success.</div>
      <p><a class="btn btn-primary btn-lg" href="signup.php" role="button">Sign Up »</a> </p>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img/image_3.jpg" style="width:100%">
      <div class="text" style="padding-bottom: 200px">Discover Your Curiosity.</div>
      <div class="captiontext" style="padding-bottom: 200px">Learning has never been so easy.</div>
      <p><a class="btn btn-primary btn-lg" href="sighup.php" role="button">Sign Up »</a> </p>
    </div>

  </div>
  <br>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
</div>


</div>

<div class="container">
  <section class="call-to-action">
  	<div class="row">
  		<div class="col-md-4">
  			<i class="material-icons" style="padding-top: 100px; font-size:100px;">computer</i>
  			<h3>Simple and Easy Interface</h3>
  			<p>Our interface is intuitive and a breeze to navigate, making finding the right tutor for you easier than ever!</p>
  		</div>
  		<div class="col-md-4">
  			<i class="material-icons" style="padding-top: 100px; font-size:100px;">star</i>
  			<h3>Guarenteed Quality</h3>
  			<p>Our tutors are strictly vetted and chosen carefully to ensure the upmost quality and experience.</p>
  		</div>
  		<div class="col-md-4">
  			<i class="material-icons" style="padding-top: 100px; font-size:100px;">group</i>
  			<h3>Peer-to-Peer Review System</h3>
  			<p>Find the right tutor for you through our detailed review system.</p>
  		</div>
  	</div>
  </section>
</div>

<div class="container">
  <section class="call-to-action">
    <div class="row">
      <div class="col-md-4">
        <i class="material-icons" style="padding-top: 80px; font-size:100px;">group_add</i>
        <h3>Over 20 Qualified Tutors</h3>
        <p>We have a large team of tutors, ready to assist you with any course you have in mind.</p>
      </div>
      <div class="col-md-4">
        <i class="material-icons" style="padding-top: 80px; font-size:100px;">attach_money</i>
        <h3>Affordable Rates</h3>
        <p>Get the most out of your money with our low prices.</p>
      </div>
      <div class="col-md-4">
        <i class="material-icons" style="padding-top: 80px; font-size:100px;">beenhere</i>
        <h3>Improved Grades</h3>
        <p>We guarentee that you will see the difference in your grade.</p>
      </div>
    </div>
  </section>
</div>


<?php
  include("includes/footer.php");
  ?>

</body>
</html>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 10000); // Change image every 2 seconds
}
</script>
