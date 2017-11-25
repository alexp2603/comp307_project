<html>
<<<<<<< HEAD

<?php
        session_start();
?>

=======
>>>>>>> 388efc0adb58d79da9cf3a6c5bcf3a0a5871d94e
  <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" style="font-size: 35px;padding-top: 20px" href="#">MUS Tutors</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<<<<<<< HEAD
                <ul class="nav navbar-nav navbar-right">
                        <li style="padding-top: 8px"><a href="index.php">Home</a></li>
                        <li style="padding-top: 8px"><a href="courses.php">Courses Covered</a></li>
                        <?php
                        if(isset($_SESSION["NAME"]))
                        {
                        $name = $_SESSION["NAME"];
                        echo("<li class='signin' style='padding-top: 8px'><a href='manageaccount.php'>Hello! $name</a></li>");
                        echo("<li class='signin' style='padding-top: 8px'><a href='php/logout.php'>Logout</a></li>");
                        }
                        else
                        {
                        echo("<li class='signin' style='padding-top: 8px'><a href='signin.php'>Sign In</a></li>");
                        echo("<li class='signUp' style='padding-top: 8px'><a href='signup.php'>Sign Up</a></li>");
                        }
                        ?>
                </ul>
                </div>
               

        </div>

  </nav>
</html>

=======
                        <ul class="nav navbar-nav navbar-right">
          <li style="padding-top: 8px"><a href="index.php">Home</a></li>
          <li style="padding-top: 8px"><a href="courses.php">Courses Covered</a></li>
          <li class="signin" style="padding-top: 8px"><a href="signin.php">Sign In</a></li>
          <li class="signUp" style="padding-top: 8px"><a href="signup.php">Sign Up</a></li>
                        </ul>
                </div>
        </div>
  </nav>
</html>
>>>>>>> 388efc0adb58d79da9cf3a6c5bcf3a0a5871d94e
