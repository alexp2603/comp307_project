<html>
  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="css/signinstyles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>
    <body>

      <?php
        include("includes/header.php");
      ?>
         <br></br>
         <br></br>
         <br></br>

        <form action="php/login.php" method="POST">
          <div class="container-fluid">
            <div class="row">
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="border">
                        <div class="header">
                            <font size="5"><b>Sign In</b></font>
                            <br></br>
                        </div>
                        <label><b>Student ID<span style="color:red">*</span></b></label>
                        <input type="text" placeholder="Student ID" name="login_ID" required>
                        <br></br>
                        <label><b>Password<span style="color:red">*</span></b></label>
                        <input type="password" placeholder="Enter Password" name="login_password" required>
                        <br></br>
                        <button type="submit">Login</button>
                        <input type="checkbox" checked="checked"> Remember me
                        <br></br>
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
