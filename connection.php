<?php

$servername = "emps-sql.ex.ac.uk";
$username = "pw354";
$password = "password";
$database = $username ;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
  //echo "Connected successfully <br />";
}


?>
