<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUS Tutors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>
 
<body>

  <?php
    include("includes/header.php");
  ?>

  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img/slide_2.jpg" style="width:100%">
      <div class="text">Classes Shouldn't Be This Hard.</div>
      <div class="captiontext">Having trouble in a class? We're here to help.</div>
      <p><a class="btn btn-primary btn-lg" href="signup.html" role="button">Sign Up »</a>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img/slide_3.jpg" style="width:100%">
      <div class="text">Learn With Confidence.</div>
      <div class="captiontext">Having trouble in a class? We're here to help.</div>
      <p><a class="btn btn-primary btn-lg" href="signup.html" role="button">Sign Up »</a> </p>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img/slide_1.jpg" style="width:100%">
      <div class="text">Discover Your Curiosity.</div>
      <div class="captiontext">Having trouble in a class? We're here to help.</div>
      <p><a class="btn btn-primary btn-lg" href="sighup.html" role="button">Sign Up »</a> </p>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
  			<i class="material-icons" style="font-size:80px;">computer</i>
  			<h3>Simple and Easy Interface</h3>
  			<p>Our interface is intuitive and a breeze to navigate, making finding the right tutor for you easier than ever!</p>
  		</div>
  		<div class="col-md-4">
  			<i class="material-icons" style="font-size:80px;">star</i>
  			<h3>Guarenteed Quality</h3>
  			<p>Our tutors are strictly vetted and chosen carefully to ensure the upmost quality and experience.</p>
  		</div>
  		<div class="col-md-4">
  			<i class="material-icons" style="font-size:80px;">group</i>
  			<h3>Peer-to-Peer Review System</h3>
  			<p>Find the right tutor for you through our detailed review system.</p>
  		</div>
  	</div>
  </section>
</div>


<footer class="footer-distributed">

  <div class="footer-left">

    <h3>MUS Tutors</h3>

    <p class="footer-company-name">Tutors &copy; 2017</p>
  </div>

  <div class="footer-center">

    <div>
      <i class="fa fa-map-marker"></i>
      <p><span>845 Sherbrooke St W</span> Montreal, Quebec</p>
    </div>

    <div>
      <i class="fa fa-phone"></i>
      <p>+1 514-123-4567</p>
    </div>

    <div>
      <i class="fa fa-envelope"></i>
      <p><a href="mailto:info@mustutors.com">info@mustutors.com</a></p>
    </div>

  </div>

  <div class="footer-right">

    <p class="footer-company-about">
      <span>About the company</span>
      MUS Tutors is a student-run initiative that aims to connect like-minded students.

    <div class="footer-icons">

      <a href="#"><i class="fa fa-facebook"></i></a>
      <a href="#"><i class="fa fa-twitter"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a>
      <a href="#"><i class="fa fa-github"></i></a>

    </div>

  </div>

</footer>

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
