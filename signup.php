
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MUS Tutors</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/signupstyles.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="signupstyles.css">
    </head>

    <body>

      <body>
          <?php
            include("header.php");
          ?>

        <form action="php/index.php/api/registerstudent" method="POST">
          <div class="container-fluid">
            <div class="row">
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="border">
                        <div class="header">
                            <h2 style="padding-bottom: 20px">Create an account</h2>
                        </div>

                        <label><b>Student ID<span style="color:red">*</span></b></label>
                        <input type="text" placeholder="Student ID" name="STUDENT_ID" required>

                        <label><b>Full Name<span style="color:red">*</span></b></label>
                        <input type="text" placeholder="First Name" name="STUDENT_NAME" required>

                        <label><b>Password<span style="color:red">*</span></b></label>
                        <input type="password" placeholder="Enter Password" name="STUDENT_PASSWORD" required>

                        <label><b>Year</b></label>
                        </br>
                        <select name="STUDENT_YEAROFSTUDY" required>
                            <option value="U0">U0</option>
                            <option value="U1">U1</option>
                            <option value="U2">U2</option>
                            <option value="U3">U3</option>
                            <option value="U3+">U3+</option>
                        </select>
                        <br>
                        <label><b>McGill Email<span style="color:red">*</span></b></label>
                        <input type="text" placeholder="Enter Email" name="STUDENT_EMAIL" required>

                        <label><b>Phone Number</b></label>
                        <input type="text" placeholder="Phone Number" name="STUDENT_PHONE">

                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                        <button type="submit" class="signupbtn">Sign Up</button>

                    </div>
                </div>
              </div>
          </div>
        </form>

        <footer class="footer-distributed">

          <div class="footer-left">

            <h3>MUS Tutors</h3>

            <p class="footer-company-name">MUS Tutors &copy; 2017</p>
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

    </body>
</html>
