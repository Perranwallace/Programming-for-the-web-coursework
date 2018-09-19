<?php
  require('Check.php') ;
  require('connection.php') ;


  if ( isset ($_POST["shipname"])){
    $shipname = htmlentities($_POST["shipname"]) ;

    $sql = "SELECT * from ships where ship_name = '$shipname'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
          //echo($row["ship_name"]);
          $found = true;
          $resultString = "<a href='ship.php?id=".$row['id']."'><h3>".$row['ship_name']."</h3></a>";

        }
    }
    else{
      $resultString = "not found";
      //echo($resultString);
      $found = false;
    }
  }


    if ( isset ($_POST["lowerCapacity"]) && isset ($_POST["upperCapacity"])){
      $lowerCapacity = $_POST["lowerCapacity"];
      $upperCapacity = $_POST["upperCapacity"];
      echo($lowerCapacity);
      echo($upperCapacity);

      $sql = "SELECT * from ships where (capacity >= '$lowerCapacity') and (capacity <= '$upperCapacity')";
      $result = $conn->query($sql);

      if ($result->num_rows > 0)
      {
        // output data of each row
        while($row = $result->fetch_assoc())
        {
            //echo($row["ship_name"]);
            $resultString .= "<a href='ship.php?id=".$row['id']."'><h3>".$row['ship_name']."</h3></a>";
            //$found = true;
            //$resultString = $shipname;
          }
      }
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
     <div class="uni_logo">
       <img src="img/uoe_logo.png" width="120px" height="49px">
     </div>

      <ul class="topnav" id="myTopnav">
        <img class="uni_logo_mobile" id="uni_logo_mobile" src="img/uoe_mobile.gif" width="120px" height="49px">
        <li class="firstli"></li>
        <li><a href="index.php">Home</a></li>
        <li><a href="addShip.php">Add new ship</a></li>
        <li><a href="summary.php">Summary information</a></li>
        <li id="logged_in"><?php echo $loggedIn ?></li>
        <li class="icon">
          <a href="javascript:void(0);" onclick="showResponsiveMenu()">&#9776;</a>
       </li>
     </ul>




      <div class="content">
        <div class="introContainer"><p class="introText">Your search results.</p></div>


        <div class="panel-header"><h1>Results</h1></div>
        <div class="panel-body">
          <p><?php
        if($found) {echo("Found");}else{echo("not found");}
            //echo("test");
          ?></p>

          <p><?php           echo($resultString);        ?></p>

        </div>
        </div>


      <div id="footer"><p>Footer text</p>
      </div>

  </body>
</html>
