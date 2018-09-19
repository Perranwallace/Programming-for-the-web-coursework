<?php
session_start();
if ( isset($_SESSION['appuser']))
{
 header('Location: index.php');
}
else if ( isset($_SESSION['apperror'] ))
{
 $error = $_SESSION['apperror'] ;
 //Remove session variables
 session_unset();
 // destroy the session
 session_destroy();
}
?>


<!DOCTYPE html>
<html>
  <head>
    <link href="style_sheet.css" rel='stylesheet' type='text/css'/>
    <link href="responsive_style.css" rel='stylesheet' type='text/css'/>
    <script src="js/helper.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>University events app</title>
  </head>

  <body>
    <!-- University logo -->
     <div class="uni_logo_login">
       <img src="img/uoe_logo.png" width="120px" height="49px">
     </div>


      <div class="loginContent">
        <div class="errorHolder"><?php echo $error ?></div>
        <div class="panel-header"><h1>Events app - login</h1></div>
        <div class="panel-body">
        <!-- Add your form here -->

        <div class= "form">
          <form name="loginForm" action="auth.php" method="post" onsubmit="return validateForm()">
            <p>Enter your username:</p>
            <input type="text" name="username" value="">
            <p>Enter your password:</p>
            <input type="password" name="password" value="">
            <input type="submit" value="Submit">
          </form>
        </div>

        </div>
      </div>


  </body>
</html>
