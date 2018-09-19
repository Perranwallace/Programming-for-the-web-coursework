<?php
  require('Check.php') ;
  require('connection.php') ;

  $sql = "SELECT * from ships";
  $result = $conn->query($sql);

  $capacityArray = array();
  array_push($capacityArray, 13);

  if ($result->num_rows > 0)
  {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        array_push($capacityArray, $row['capacity']);
    }
  }//*/

  //echo $capacityArray;

  for ($i = 0; $i < count($capacityArray); $i++) {
    echo $capacityArray[$i] . "\n";
  }



  header('Access-Control-Allow-Origin: *');

  if (isset($_REQUEST["type"]))
  {
    $output = htmlentities($_REQUEST["type"]) ;

    if ($output === "json")
    {
      getEventsJson($conn) ;
    }
    else if ($output === "xml")
    {
      getEventsXML($conn);
    }
  }
  else
  {
    $error = "Paramaters not set" ;
    showError($error) ;
  }

  function getEventsJson($conn)
    {
      $stmt = $conn->prepare("SELECT event_name, event_type, event_location, event_date, event_num_attended FROM events_attended ORDER BY event_date ASC ") ;
      /*
      if ($all === null)
      {
        $stmt = $conn->prepare("SELECT event_name, event_type, event_location, event_date FROM events WHERE event_type = ? AND event_location = ? ORDER BY event_date ASC ") ;
        $stmt->bind_param("ss", $eventType, $eventLocation);
      }*/
      $stmt->bind_result($dbEventName, $dbEventType, $dbEventLocation, $dbEventDate, $eventNum);
      $stmt->execute() ;
      $stmt->store_result();

      if ($stmt->num_rows > 0)
      {
        while ( $stmt->fetch() )
        {
          $eventsArray[] = array ('name' => $dbEventName, 'type' => $dbEventType, 'location' => $dbEventLocation, 'date' => $dbEventDate, 'num' => $eventNum );
        }
      }
      else
      {
        $eventsArray[] = array('error' =>"No events available") ;
      }

      $dataArray["data"] = array ('events' => $eventsArray) ;

      echo json_encode($dataArray) ;
  }

  function getEventsXML($conn)
    {
      $stmt = $conn->prepare("SELECT event_name, event_type, event_location, event_date, event_num_attended FROM events_attended ORDER BY event_date ASC ") ;

      $stmt->bind_result($dbEventName, $dbEventType, $dbEventLocation, $dbEventDate, $eventNum);
      $stmt->execute() ;
      $stmt->store_result();

      $eventsArray = array() ;
      if ($stmt->num_rows > 0)
      {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><data/>') ;
        while ( $stmt->fetch() )
        {
          $events = $xml->addChild('events') ;
          $events->addChild('name', $dbEventName) ;
          $events->addChild('type', $dbEventType) ;
          $events->addChild('location', $dbEventLocation) ;
          $events->addChild('date', $dbEventDate) ;
          $events->addChild('num', $eventNum) ;
        }
      }
      else
      {
        $eventsArray[] = array('error' =>"No events available") ;
      }

    Header('Content-type: text/xml');
    $dom = new DOMDocument();
    $dom->loadXML($xml->asXML());
    $dom->formatOutput = true;
    $formattedXML = $dom->saveXML();
    //output xml
    print $formattedXML;


  }

  function showError($error)
  {
    $eventsArray[] = array('error' => $error) ;
    echo json_encode($eventsArray) ;
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <link href="style_sheet.css" rel='stylesheet' type='text/css'/>
    <link href="responsive_style.css" rel='stylesheet' type='text/css'/>
    <link href="chart_sheet.css" rel='stylesheet' type='text/css'/>
    <script src="js/helper.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <title>University events app</title>



    <script type="text/javascript" src="https://d3js.org/d3.v3.min.js"></script>
    <meta charset="utf-8">
    <style>
      .chart div {
         font: 10px sans-serif;
         background-color: steelblue;
         text-align: right;
         padding: 3px;
         margin: 1px;
         color: white;
       }
    </style>


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

          <div class="chart"> </div>

          <script>

            //var data = [4, 8, 15, 16, 23, 42];


            var data = [];
            for (i = 0; i < 10; i++) {
              data.push(i);
            }

            var x = d3.scale.linear()
             .domain([0, d3.max(data)])
             .range([0, 420]);

            d3.select(".chart")
             .selectAll("div")
             .data(data)
             .enter().append("div")
             .style("width", function(d) { return x(d) + "px"; })
             .text(function(d) { return d; });

          </script>


        </div>


      </div>





      <div id="footer"><p>Footer text</p>
      </div>

  </body>
</html>
