
<html>


      <body>
          <?php
            include("includes/header.php");
            include("includes/head.html");
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

        <?php
            include("includes/footer.php");
        ?>
     

        </body>
        </html>

    </body>
</html>
