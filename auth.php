<?php
session_start();

require('connection.php') ;

if ( isset ($_POST["username"]) && isset($_POST["password"]))
{
  $username = htmlentities($_POST["username"]) ;
  $password = htmlentities($_POST["password"]) ;
  //Add echo if the username and password are set here
  validateUser($conn, $username, $password);
  echo($username);
  echo($password);

  //call the validateUser function herepassword

}
else
{
  echo("bad");
  //Add echo if username and password not set here
  header('Location: login.php');
}



function validateUser($conn, $username, $password)
{
  //Basic SQL protection
  $username = $conn->real_escape_string($username);

  $sql = "SELECT * from users where username = '$username'";

  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        $hashed_password = $row["password"] ;
        //Check to see if our password is equal to the password the user has entered
        if ($hashed_password === crypt($password, $hashed_password))
        {
          $_SESSION["appuser"] = $username;
          echo "Passwords match, starting session: ". $_SESSION["appuser"] ;
          header('Location: login.php');
        }
        else
        {
          //Add code here if passwords do not match
          $error = "invalid password";
          $_SESSION["apperror"] = $error ;
          echo($error);
          header('Location: login.php');
        }
    }

  }
  else
  {
    //Add code here for if username and passwords do not match
    $error = "Username not found in the database" ;
    $_SESSION["apperror"] = $error ;
    echo($error);
    header('Location: login.php');
  }
  $conn->close();
}

?>
