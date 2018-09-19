<?php
  require('Check.php') ;
  require('connection.php') ;

 //error_reporting(E_ALL);
 //ini_set('display_error', 1);

  if ( isset ($_POST["addShip"])){
    //echo("adding");

    $target_dir = "ShipPhotos/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    //echo $target_file;

    if(isset($_POST["fileToUpload"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //SQL to add ship:
    $sql = "INSERT INTO ships VALUES (NULL , '";
    $sql .= $_POST["ship_name"];
    $sql .= "', '";
    $sql .= $_POST["year_built"];
    $sql .= "', '";
    $sql .= $_POST["capacity"];
    $sql .= "', '";
    $sql .= $_POST["builder_name"];
    $sql .= "', '";
    $sql .= $_POST["operating_company"];
    $sql .= "', '";
    $sql .= basename($_FILES["fileToUpload"]["name"]);
    $sql .= "')";

    $result = $conn->query($sql);


    //Go to the new ship page:
    //$refreshUrl = "Location: ship.php?id=";
    //$refreshUrl .=  $_GET["id"];
    //header("Location: ship.php?id=2");//*/
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
        <div class="introContainer"><p class="introText">Add new ship</p></div>

        <img src=<?php echo($imageName);?>>

        <div class="panel-header"><h1>Ship details</h1></div>
        <div class="panel-body">
          <div class= "form">

            <form action="addShip.php" method="post" enctype="multipart/form-data">
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

              <p>Select an image:</p>
              <input type="file" name="fileToUpload" id="fileToUpload">

              <input type="submit" value="Add ship" name="addShip">
            </form>




        </div>


      </div>





      <div id="footer"><p>Footer text</p>
      </div>

  </body>
</html>
