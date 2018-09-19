<?php
  require('Check.php') ;
  require('connection.php') ;

?>

<script>
  function updateSliderValLow() {
    document.getElementById("valLabelLow").innerHTML = document.getElementById("lowerCapacity").value;
  }
  function updateSliderValUp() {
    document.getElementById("valLabelUp").innerHTML = document.getElementById("upperCapacity").value;
  }
</script>

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
        <div class="introContainer"><p class="introText">Intro text</p></div>
          <div class="panel-header"><h1>Search for ship by name</h1></div>
          <div class="panel-body">
            <div class= "form">
            <form action="results.php" method="post">
              <p>Enter the ship's name:</p>
              <input type="text" name="shipname" value="">
              <input type="submit" value="Search">

            </form>
          </div>
          </div>



          <div class="panel-header"><h1>Search for by ship capacity</h1></div>
          <div class="panel-body">
              <div class= "form">
                <form action="results.php" method="post">

                  <label for="lowerCapacity">Lower Capacity</label>
                  <input type="range" id="lowerCapacity" name="lowerCapacity" min="0" value="0" max="20000" step="100" oninput= "updateSliderValLow()">

                  <label id ="valLabelLow">0</label>


                  <label for="upperCapacity">Upper Capacity</label>
                  <input type="range" id="upperCapacity" name="upperCapacity" min="0" value="20000" max="20000" step="100" oninput= "updateSliderValUp()">

                  <label id ="valLabelUp">200000</label>

                  <input type="submit" value="Search">
                </form>
              </div>
          </div>
          </div>

          <div class="panel-header"><h1>Search for by </h1></div>
          <div class="panel-body">
              <div class= "form">
                <form action="results.php" method="post">

                  <p>Select event type:</p>
                   <select name="type">
                     <option value="Academic">Academic</option>
                     <option value="Sport">Sport</option>
                     <option value="Social">Social</option>
                     <option value="All">All</option>
                   </select>

                  <input type="submit" value="Search">
                </form>
              </div>


          </div>
          </div>


      <div id="footer"><p>© 640022156</p>
      </div>

  </body>
</html>
