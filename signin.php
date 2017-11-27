<html>

    <body>

      <?php
        include("includes/header.php");
        include("includes/head.html");
      ?>


        <form action="php/login.php" method="POST">
          <div class="container-fluid">
            <div class="row">
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="border">
                        <div class="header">
                            <h2 style="padding-bottom: 20px">Sign In</h2>
                        </div>
                        <label><b>Student ID<span style="color:red">*</span></b></label>
                        <input type="text" placeholder="Student ID" name="login_ID" required>

                        <label><b>Password<span style="color:red">*</span></b></label>
                        <input type="password" placeholder="Enter Password" name="login_password" required>

                        <button type="submit">Login</button>
                        <input type="checkbox" checked="checked"> Remember me

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
