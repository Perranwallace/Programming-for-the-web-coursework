<?php
require('connection.php') ;

$user = "pw354" ;
$pass = "password" ;

$dbConn = new mysqli($servername, $username, $password, $database);


//Add code to call the functions here

addUser($dbConn, "test", "pass");
getUsers($dbConn);
exit;


function addUser($conn, $user, $pass)
{
  //Generate our random Salt
  $rand = openssl_random_pseudo_bytes(48);
  $salt = '$2a$%13$' . strtr(base64_encode($rand), array('_' => '.', '~' => '/'));

  //This is the hashed password which would be stored in our db
  $hashed_password = crypt($pass, $salt);


  $sql = "INSERT INTO users (id, username, password)
  VALUES (NULL , '$user' , '$hashed_password')" ;


  if ($conn->query($sql) === TRUE)
  {
      echo "New record created successfully <br />";
  }
  else
  {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br />";
  }
}


function getUsers($conn)
{
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
          echo $row["username"]. "<br>".
          $row["password"] ;
      }
  }
  else
  {
      echo "0 results";
  }

}


function deleteUsers($conn)
{
  // sql to delete a record
    $sql = "DELETE FROM users WHERE id=1";

    if ($conn->query($sql) === TRUE)
    {
      echo "Record deleted successfully";
    }
    else
    {
      echo "Error deleting record: " . $conn->error;
    }
}


function deleteTable($conn)
{
   // sql to delete the table
    $sql ="drop table users" ;
    if ($conn->query($sql) === TRUE)
    {
      echo "Table deleted successfully";
    }
    else
    {
      echo "Error deleting Table: " . $conn->error;
    }
}
  //Close SQL connection
  $conn->close();

?>
