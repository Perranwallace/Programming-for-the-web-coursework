<?php
  require('Check.php') ;
  require('connection.php') ;


  if ( isset ($_POST["updateShip"])){
    echo("update");

    //SQL to update name:
    $sql = "UPDATE ships SET ship_name = '";
    $sql .= $_POST["ship_name"];
    $sql .= "' WHERE id = ";
    $sql .= $_GET["id"];
    echo($sql);
    $conn->query($sql);

    //SQL to update year_built:
    $sql = "UPDATE ships SET year_built = '";
    $sql .= $_POST["year_built"];
    $sql .= "' WHERE id = ";
    $sql .= $_GET["id"];
    echo($sql);
    $conn->query($sql);

    //SQL to update capacity:
    $sql = "UPDATE ships SET capacity = '";
    $sql .= $_POST["capacity"];
    $sql .= "' WHERE id = ";
    $sql .= $_GET["id"];
    echo($sql);
    $conn->query($sql);

    //SQL to update builder_name:
    $sql = "UPDATE ships SET builder_name = '";
    $sql .= $_POST["builder_name"];
    $sql .= "' WHERE id = ";
    $sql .= $_GET["id"];
    echo($sql);
    $conn->query($sql);

    //SQL to update operating_company:
    $sql = "UPDATE ships SET operating_company = '";
    $sql .= $_POST["operating_company"];
    $sql .= "' WHERE id = ";
    $sql .= $_GET["id"];
    echo($sql);
    $conn->query($sql);


    //Go back to the ship page with no get:
    $refreshUrl = "Location: ship.php?id=";
    $refreshUrl .=  $_GET["id"];
    header($refreshUrl);//*/
  }


  if ( isset ($_POST["deleteShip"])){
    //echo("bleep");
    $sql = "Delete from ships where id = ";
    $sql .= $_GET["id"];
    $conn->query($sql);
    header('Location: index.php');
  }

  if ( isset ($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * from ships where id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      // output data of each row
      while($row = $result->fetch_assoc())
      {
          $imageName = "ShipPhotos/";
          $imageName .= $row["imageName"];
          $shipName = $row["ship_name"];
          $url = "ship.php?id=";
          $url .= $row["id"];

          $capacity = $row["capacity"];
          $yearBuilt = $row["year_built"];
          $builderName = $row["builder_name"];
          $operatingCompany = $row["operating_company"];
          //echo($imageName);
      }
    }
  }
  else{
    header('Location: index.php');
    //echo("naha");
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
        <div class="introContainer"><p class="introText"><?php echo($shipName);?></p></div>

        <img src=<?php echo($imageName);?>>

        <div class="panel-header"><h1>Ship details</h1></div>
        <div class="panel-body">
          <div class= "form">

            <form action="<?php echo($url);?>" method="post">
              <p>Ship's name:</p>
              <input type="text" name="ship_name" value="<?php echo($shipName);?>">

              <p>Year built:</p>
              <input type="text" name="year_built" value="<?php echo($yearBuilt);?>">

              <p>Ship's capacity:</p>
              <input type="text" name="capacity" value="<?php echo($capacity);?>">

              <p>Builder's name:</p>
              <input type="text" name="builder_name" value="<?php echo($builderName);?>">

              <p>Operating company's name:</p>
              <input type="text" name="operating_company" value="<?php echo($operatingCompany);?>">

              <input type="submit" value="Update details" name="updateShip">
            </form>



        </div>

        <div class="panel-body">
          <div class= "form">
          <form action="<?php echo($url);?>" method="post">
            <input type="submit" value="Delete ship" name="deleteShip">
          </form>
        </div>
        </div>
      </div>





      <div id="footer"><p>Footer text</p>
      </div>

  </body>
</html>
